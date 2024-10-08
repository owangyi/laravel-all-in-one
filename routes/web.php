<?php

use App\Models\Cast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
 * Error Handling
 */
Route::get('/errors', function () {
    throw_if(true, new Exception('Trigger errors manually.'));
});

/*
 * Model Cast
 */
Route::get('/casts', function () {
    $cast = Cast::query()->find(1);

    return response()->json($cast);
});

Route::post('/casts', function (Request $request) {
    $cast = Cast::query()->find(1);

    $cast = $cast->update([
       'is_admin' => $request->input('is_admin'),
       'json' => $request->json('json'),
    ]);

    return $cast;
});
