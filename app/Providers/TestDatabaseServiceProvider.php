<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

final class TestDatabaseServiceProvider extends ServiceProvider
{
    public const string TEST_MYSQL_CONNECTION = 'test_database_connection';

    /**
     * @return void
     *
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    #[\Override]
    public function register(): void
    {
        if (config('app.env') === 'testing') {
            app('config')->set(['database.connections.' . self::TEST_MYSQL_CONNECTION => array_replace(app('config')->get('database.connections.mysql'), [
                'database' => \Tests\Database::getInstance()->getRandomDbName(strval(env('DB_DATABASE', 'rightcapital')), strval(env('DB_HOST', '127.0.0.1')), strval(env('DB_USERNAME', 'root')), strval(env('DB_PASSWORD', ''))),
                'username' => \Tests\Database::getMysqlDbInfo()['username'],
                'password' => \Tests\Database::getMysqlDbInfo()['password'],
            ])]);
            app('db')->reconnect(self::TEST_MYSQL_CONNECTION);
            app('db')->setDefaultConnection(self::TEST_MYSQL_CONNECTION);

            app('config')->set('passport.storage.database.connection', self::TEST_MYSQL_CONNECTION);
            app('config')->set('database.redis.default.database', \Tests\Database::getAvailableRedisDbNumber());
            app('config')->set('database.redis.cache.database', \Tests\Database::getAvailableRedisDbNumber());
        }
    }
}
