<?php

namespace Tests;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Support\ReseedsTestDatabase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use ReseedsTestDatabase;

    // Tables whose preparing to be seeded, when null no reseed, when empty array reseed all tables.
    protected static array|null $tables_to_reseed = null;

    protected function setUp(): void
    {
        parent::setUp();

        // You can configure something in advance here

        echo "You can configure something in advance here";

        if (boolval(env('CI'))) {
            echo "It's running in CI";
        }

        $this->setTestDate();

        $this->clearCache();

        $this->reseed();
    }

    private function setTestDate(): void
    {
        $test_date = env('TEST_DATE');

        if ($test_date !== null && $test_date !== '') {
            if (class_exists(Carbon::class)) {
                Carbon::setTestNow($test_date);
            }

            if (class_exists(CarbonImmutable::class)) {
                CarbonImmutable::setTestNow($test_date);
            }
        }
    }

    private function clearCache(): void
    {
        app('cache')->store('array')->getStore()->flush();
        app('cache')->store('redis')->getStore()->flush();
    }
}
