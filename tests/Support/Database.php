<?php

declare(strict_types=1);

namespace Tests\Support;

use http\Exception\RuntimeException;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

abstract class Database
{
    protected \mysqli $mysql_db;

    /** @var null|array{name: string, host: string, username: string, password: string} */
    protected ?array $database_info = null;

    private static $database_connection;
    private static Database $database_instance;

    final public static function getInstance(): Database
    {
        if (!isset(static::$database_instance)) {
            static::$database_instance = new static();
        }

        return static::$database_instance;
    }

    public function getConnection(): Connection
    {
        $default_connection_name = config('database.default');

        $test_connection_name = 'mysql_test';

        if (!app('config')->has('database.connections.'.$test_connection_name)) {
            // Here, build a new database connection configuration to avoid to confuse default db.
            app('config')->set('database.connections.'.$test_connection_name, array_merge(
                app('config')->get('database.connections.'.$default_connection_name),
                [
                    'database' => $this->getRandomDatabase(),
                    'username' => env('DB_USERNAME', 'root'),
                    'password' => env('DB_PASSWORD', ''),
                ]
            ));
        }

        if (null !== self::$database_connection) {
            return self::$database_connection;
        }

        self::$database_connection = app('db')->connection($test_connection_name);

        return self::$database_connection;
    }

    public function getRandomDatabase(
        string $database_prefix_name,
        string $host,
        string $username,
        string $password,
        string $charset = 'utf8mb4',
        string $collation = 'utf8mb4_unicode_ci'
    ): array {
        if (null === $this->database_info) {
            $this->setRandomDatabase(
                $database_prefix_name,
                $host,
                $username,
                $password,
                $charset,
                $collation,
            );
        }

        return $this->database_info;
    }

    public function setRandomDatabase(
        string $database_prefix_name,
        string $host,
        string $username,
        string $password,
        string $charset = 'utf8mb4',
        string $collation = 'utf8mb4_unicode_ci'
    ): void {
        // 1. Build mysql connection
        $this->mysql_db = new \mysqli($host, $username, $password);

        if ($this->mysql_db->connect_error) {
            throw new RuntimeException('Connect error ('.$this->mysql_db->connect_errno.') '.$this->mysql_db->connect_error.'.');
        }

        // 2. Delete the orphan test databases were created before
        $this->deleteOrphanDatabases($database_prefix_name);

        // 3. 生成随机数名称
        $random_database_name = $database_prefix_name.'_'.Str::random(8);

        // 4. create the database
        $result = $this->mysql_db->query(
            "
            CREATE DATABASE `{$random_database_name}`
            DEFAULT CHARACTER SET {$charset}
            COLLATE {$collation}"
        );

        if (!$result) {
            throw new RuntimeException('Error creating database ('.$database_prefix_name.')');
        }

        // 保存数据库信息
        $this->database_info = [
            'name' => $random_database_name,
            'host' => $host,
            'username' => $username,
            'password' => $password,
        ];

        $this->mysql_db->close();
    }

    /**
     * 获取 MySQL 数据库信息（静态方法）.
     *
     * @return array{name: string, host: string, username: string, password: string, database: string}
     */
    public static function getMysqlDbInfo(): array
    {
        $instance = static::getInstance();
        // 确保数据库信息已初始化
        $instance->getRandomDatabase();

        return [
            'name' => $instance->database_info['name'],
            'host' => $instance->database_info['host'],
            'username' => $instance->database_info['username'],
            'password' => $instance->database_info['password'],
        ];
    }

    protected function deleteOrphanDatabases(string $database_prefix_name): void
    {
        $query_sql = 'SHOW DATABASES LIKE "'.$this->mysql_db->real_escape_string($database_prefix_name).'%"';

        $results = $this->mysql_db->query($query_sql);

        if ($results->num_rows > 0) {
            foreach ($results->fetch_array(MYSQLI_ASSOC) as $row) {
                $this->mysql_db->query('DROP DATABASE '.$row['Database']);
            }
        }
    }

    protected function setDatabasePrivilege(): void {}
}
