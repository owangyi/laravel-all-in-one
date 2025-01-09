<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Sentry\Laravel\Integration as Sentry;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        // Send exception to Sentry if SENTRY_DSN is set
        if (null !== config('sentry.dsn')) {
            $this->reportable(function (\Throwable $exception): void {
                try {
                    Sentry::captureUnhandledException($exception);
                } catch (\Throwable $e) {
                    Log::error($e->getMessage());
                }
            });
        }
    }

    public function report(\Throwable $e): void
    {
        if ($this->shouldntReport($e)) {
            return;
        }

        parent::report($e);
    }

    public function render($request, \Throwable $e)
    {
        return parent::render($request, $e); // TODO: Change the autogenerated stub
    }
}
