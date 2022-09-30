<?php

use App\Models\User;
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

Route::post('/tokens/create', [\App\Http\Controllers\ApiTokenController::class, 'createToken']);

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::apiResource('/car', \App\Http\Controllers\CarController::class);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/tokens/clear', [\App\Http\Controllers\ApiTokenController::class, 'revokeTokens']);
});



