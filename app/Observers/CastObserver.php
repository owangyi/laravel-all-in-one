<?php

namespace App\Observers;

use App\Models\Cast;

class CastObserver
{
    /**
     * Executing before [a new record] is created or [an existing record] is updated.
     *
     * @param Cast $cast
     * @return void
     */
    public function saving(Cast $cast): void
    {
        echo __FUNCTION__ . PHP_EOL;

        print_r($cast->toArray());
    }
    public function creating(Cast $cast): void
    {
        echo __FUNCTION__ . PHP_EOL;

        print_r($cast->toArray());
    }

    /**
     * Handle the Cast "created" event.
     */
    public function created(Cast $cast): void
    {
        echo <<<EOF
            A new cast record with ID: {$cast->id} has been [created].
        EOF;

    }

    public function updating(Cast $cast): void
    {
        echo <<<EOF
            Before update:

            {$cast->toJson()}
        EOF;
    }

    /**
     * Handle the Cast "updated" event.
     */
    public function updated(Cast $cast): void
    {
        echo <<<EOF
            After update:

            {$cast->toJson()}
        EOF;
    }

    public function saved(Cast $cast): void
    {
        if ($cast->exists) {
            echo <<<EOF
                An existing cast record with ID: {$cast->id} has been [changed by saving].
            EOF;
        } else {
            echo <<<EOF
                A new cast record with ID: {$cast->id} has been [saved].
            EOF;
        }
    }

    /**
     * Handle the Cast "deleted" event.
     */
    public function deleted(Cast $cast): void
    {
        //
    }

    /**
     * Handle the Cast "restored" event.
     */
    public function restored(Cast $cast): void
    {
        //
    }

    /**
     * Handle the Cast "force deleted" event.
     */
    public function forceDeleted(Cast $cast): void
    {
        //
    }
}
