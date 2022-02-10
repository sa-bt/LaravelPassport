<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:api'])->get('/todos', function (Request $request) {
    if ($request->user()->tokenCan('read-tasks')) {
        return $request->user()->tasks;
    } else {
        return response()->json(['error' => 'Unauthenticated']);
    }
});
