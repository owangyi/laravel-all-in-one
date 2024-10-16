<?php

namespace App\Http\Controllers;

use App\Jobs\RecordModelModification;
use App\Models\Cast;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        return response()->json(
            Cast::create([
                'is_admin' => $request->get('is_admin'),
                'json' => $request->get('json'),
            ])
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cast $cast)
    {
        $cast->update($request->all());

        /**
         * The `$cast` has already been refreshed.
         *
         * print_r($cast->toArray());
         */

        /**
         * No queue
         *
         * RecordModelModification::dispatchSync($cast);
         */

        RecordModelModification::dispatch($cast);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
