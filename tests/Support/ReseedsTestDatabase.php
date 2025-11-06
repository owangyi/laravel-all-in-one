<?php


declare(strict_types=1);

namespace Tests\Support;

use App\Providers\TestDatabaseServiceProvider;
use Illuminate\Database\Connection;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Reseed tables specified by $tables_to_reseed in the test databases
 *
 * Using seeders specified by TEST_SEEDERS environment variable
 */
trait ReseedsTestDatabase
{
    /** @var array<string> */
    protected static array $dirty_tables = [];

    protected static bool $force_skip_reseed_in_next_test = false;

    private static Connection|null $root_connection = null;

    /**
     * Seeds database using test-suite-specific seeder.
     *
     * @see phpunit.xml
     */
    protected function reseed(): void
    {
        $seeders = array_filter(explode(',', env('TEST_SEEDERS', '')));

        /** @var array|null $tables_to_reseed */
        $tables_to_reseed = static::$tables_to_reseed();

        if (empty($seeders) || $tables_to_reseed === null) {  // blacklist
            return;
        }

        // Executes all seeders if it not in blacklist
        foreach ($seeders as $seeder) {
            $this->seed($seeder, $tables_to_reseed);
        }

        static::$tables_to_reseed = null;
    }

    /**
     * @param array<string>|string $class
     * @param array<string>|null $tables all when null, none when empty array
     *
     * @return $this
     */
    #[\Override]
    public function seed(mixed $class = 'DatabaseSeeder', array|null $tables = null): static
    {
        /** @see \RightCapital\Illuminate\Database\Console\Seeds\SeedCommand::getTables() */
        $this->artisan('db:seed', [
                '--class' => $class,
                /**
                 * @see \App\Providers\TestDatabaseServiceProvider
                 */
                '--database' => app('db')->getDefaultConnection()->getName(),
            ] + ($tables === null ? [] : [
                '--tables' => implode(',', $tables),
            ]));

        return $this;
    }



    /**
     * Mark the current test as polluting the test database, and the db will be reseeded during the next test
     *
     * @param array<string>|null $tables tables to reseed, all when null, none when empty array
     *
     * @see \Tests\TestCase::setUp()
     *
     * This must be done at the beginning of the test so that whether or not the current test fails, the next test would always perform the reseed.
     * If a test does not make any change to DB, do not call this function at all.
     */
    protected static function markTablesForReseedInNextTest(array|null $tables = null): void
    {
        static::$tables_to_reseed = $tables;
    }

    /**
     * Automatically detect DB write operations
     */
    protected static function automaticallyDetectsDirtyTables(): void
    {
        DB::listen(function (QueryExecuted $query): void {
            if (\Safe\preg_match('/^(?:insert|update|delete).*?`(\w+)`/', $query->sql, $matches) === 1) {
                $table_name = strtolower($matches[1]);

                if (!in_array($table_name, static::$dirty_tables, true)) {
                    static::$dirty_tables[] = $table_name;
                }
            }
        });
    }

    protected static function automaticallyReseedInNextTest(): void
    {
        if (static::$force_skip_reseed_in_next_test === false && static::$dirty_tables !== []) {
            /** Automatically resolve @see \RightCapital\LaravelTestSupport\TestCase::$tables_to_reseed */
            static::markTablesForReseedInNextTest(array_unique(array_reduce(static::$dirty_tables, fn(array $carry, string $unique_dirty_table): array => array_merge($carry, [$unique_dirty_table], static::getDeleteCascadeTablesByTable()[$unique_dirty_table] ?? []), [])));
            static::$dirty_tables = [];
        }

        static::$force_skip_reseed_in_next_test = false;
    }

    /**
     * @return array<string,array<int,string>> [table => [delete_cascaded_table]]
     */
    protected static function getDeleteCascadeTablesByTable(): array
    {
        /** @var array<string,array<int,string>>|null $relations */
        static $relations = null;

        if ($relations === null) {
            /** @var array<string,array<int,string>> $relations */
            $relations = [];

            /** @var \Illuminate\Support\Collection<string, \Illuminate\Support\Collection<int, array<string,string>>> $tables_by_referenced_table */
            $tables_by_referenced_table = DB::table('information_schema.REFERENTIAL_CONSTRAINTS')
                ->select('TABLE_NAME', 'REFERENCED_TABLE_NAME')
                ->where('CONSTRAINT_SCHEMA', DB::connection()->getDatabaseName())
                ->whereIn('DELETE_RULE', ['CASCADE', 'SET NULL'])
                ->get()
                ->groupBy('REFERENCED_TABLE_NAME');

            foreach ($tables_by_referenced_table as $referenced_table => $tables) {
                /** @var array<int,string> $related_tables */
                $related_tables = [];

                static::getDeleteCascadeTablesGivenTable($tables_by_referenced_table, $referenced_table, $related_tables);

                $relations[$referenced_table] = $related_tables;
            }
        }

        return $relations;
    }

    /**
     * Get child tables that have ON DELETE CASCADE foreign-key relation to the parent (referenced table)
     *
     * @param \Illuminate\Support\Collection<string,\Illuminate\Support\Collection<int,array<string,string>>> $tables_by_referenced_table
     * @param string $referenced_table parent
     * @param array<int,string> $accumulated_delete_cascaded_tables children
     */
    protected static function getDeleteCascadeTablesGivenTable(Collection $tables_by_referenced_table, string $referenced_table, array &$accumulated_delete_cascaded_tables): void
    {
        $tables = $tables_by_referenced_table[$referenced_table] ?? [];

        foreach ($tables as $table) {
            if (!in_array($table['TABLE_NAME'], $accumulated_delete_cascaded_tables, true)) {
                $accumulated_delete_cascaded_tables[] = $table['TABLE_NAME'];

                static::getDeleteCascadeTablesGivenTable($tables_by_referenced_table, $table['TABLE_NAME'], $accumulated_delete_cascaded_tables);
            }
        }
    }

    /**
     * Get a separate DB connection (with higher privileges, such as INSERT and DELETE) to seed and truncate all tables
     *
     * @return \Illuminate\Database\Connection
     */
    protected static function getRandomDbConnection(): Connection
    {
        // Single instance
        if (self::$root_connection !== null) {
            return self::$root_connection;
        }

        $connection_name = 'mysql_root';

        if (!app('config')->has('database.connections.' . $connection_name)) {
            app('config')->set('database.connections.' . $connection_name, array_merge(app('config')->get('database.connections.' . app('config')->get('database.default')), [
                'database' => Database::getMysqlDbInfo()['database'],
                'username' => env('DB_USERNAME', 'root'),
                'password' => env('DB_PASSWORD', ''),
            ]));
        }

        self::$root_connection = app('db')->connection($connection_name);

        return self::$root_connection;
    }

    /**
     * @param string[]|null $tables tables to truncate, all when null, none when empty array
     */
    private static function truncate(array|null $tables): void
    {
        if ($tables === []) {
            return;
        }

        $db = self::getDbRootConnection();

        $db->statement('SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;');
        $db->statement('SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;');

        try {
            $existing_tables = $db->select('SHOW TABLES');

            foreach ($existing_tables as $existing_table) {
                $existing_table = reset($existing_table);

                if (is_array($tables) && !in_array($existing_table, $tables, true)) {
                    continue;
                } else {
                    $db->table($existing_table)->truncate();
                }
            }
        } finally {
            $db->statement('SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS');
            $db->statement('SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;');
        }
    }
}
