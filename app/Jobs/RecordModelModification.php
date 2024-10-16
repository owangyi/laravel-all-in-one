<?php

namespace App\Jobs;

use App\Models\Cast;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RecordModelModification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(Public Cast $cast)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        echo <<<EOF
            'The table ' . $this->cast->getTable() . ' modification has been listened via queue.'
        EOF;
    }
}
