<?php

declare(strict_types=1);

namespace App\Extensions;

use Illuminate\Database\Console\Seeds\SeedCommand as BaseSeedCommand;
use RightCapital\LaravelYamlSeeder\YamlSeeder;
use Symfony\Component\Console\Input\InputOption;

/**
 * Add 'tables' option which allows seeding only specific tables.
 *
 * Registered by @see \RightCapital\Illuminate\Database\ArtisanServiceProvider::register()
 */
class SeedCommand extends BaseSeedCommand
{
    /**
     * Get a seeder instance from the container.
     *
     * @return YamlSeeder
     *
     * @see \Illuminate\Database\Console\Seeds\SeedCommand::getSeeder()
     */
    #[\Override]
    protected function getSeeder()
    {
        $seeder = parent::getSeeder();

        $seeder instanceof YamlSeeder
            ? $seeder->setTables($this->getTables())
            : throw new \TypeError();
    }

    /**
     * Get the name of the tables to use.
     *
     * @return null|array<string>
     */
    protected function getTables(): ?array
    {
        $tables = $this->input->getOption('tables');

        return explode(',', strval($tables));
    }

    /**
     * Get the console command options.
     *
     * @return array<null|int|string>
     *
     * @see \Illuminate\Database\Console\Seeds\SeedCommand::getOptions()
     */
    #[\Override]
    protected function getOptions()
    {
        $options = parent::getOptions();

        $options[] = ['tables', null, InputOption::VALUE_OPTIONAL, 'A comma-separated list of tables to seed, all if left empty', null];

        return $options;
    }
}
