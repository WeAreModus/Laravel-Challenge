<?php

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

Route::name('api.')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::resource('products', 'Api\\ProductController', ['only' => ['store', 'update', 'destroy']]);
    });

    Route::resource('products', 'Api\\ProductController', ['only' => ['index', 'show']]);
});
