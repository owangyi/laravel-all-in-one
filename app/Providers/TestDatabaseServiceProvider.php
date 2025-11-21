<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Tests\Support\Database;

final class TestDatabaseServiceProvider extends ServiceProvider
{
    public const TEST_MYSQL_CONNECTION = 'test_database_connection';

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[\Override]
    public function register(): void
    {
        if ('testing' === config('app.env')) {
            app('config')->set(['database.connections.'.self::TEST_MYSQL_CONNECTION => array_replace(app('config')->get('database.connections.mysql'), [
                'database' => Database::getInstance()->getRandomDatabase(
                    strval(env('DB_DATABASE', 'rightcapital')),
                    strval(env('DB_HOST', '127.0.0.1')),
                    strval(env('DB_USERNAME', 'root')),
                    strval(env('DB_PASSWORD', ''))
                )['name'],
                'username' => Database::getMysqlDbInfo()['username'],
                'password' => Database::getMysqlDbInfo()['password'],
            ])]);

            app('db')->reconnect(self::TEST_MYSQL_CONNECTION);
            app('db')->setDefaultConnection(self::TEST_MYSQL_CONNECTION);

            app('config')->set('passport.storage.database.connection', self::TEST_MYSQL_CONNECTION);
        }
    }
}
