<?php

namespace App\Http\Controllers;

use App\Events\ReportDownloaded;
use App\Models\Cast;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ReportDownloadController extends Controller
{
    public function index(): StreamedResponse
    {
        $casts = Cast::query()
            ->select(['id', 'is_admin', 'json', 'created_at', 'updated_at'])
            ->orderBy('id')
            ->get()
        ;

        $fileName = sprintf('casts-%s.csv', now()->format('Ymd_His'));

        $response = response()->streamDownload(function () use ($casts) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Is Admin', 'JSON', 'Created At', 'Updated At']);

            foreach ($casts as $cast) {
                fputcsv($handle, [
                    $cast->id,
                    $cast->is_admin ? 'yes' : 'no',
                    $cast->json,
                    optional($cast->created_at)->toDateTimeString(),
                    optional($cast->updated_at)->toDateTimeString(),
                ]);
            }

            fclose($handle);
        }, $fileName, [
            'Content-Type' => 'text/csv',
        ]);

        ReportDownloaded::dispatch(
            Auth::id(),
            $fileName,
            $casts->count(),
            now()->toIso8601String(),
        );

        return $response;
    }
}
