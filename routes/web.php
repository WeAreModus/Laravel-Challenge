<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect('/products');
});
Route::get('/home', function () {
    return redirect('/products');
});

Route::get('/products', 'ProductsController@index');
Route::get('/products/{product}', 'ProductsController@show');

Route::get('/products/{product}/edit', 'ProductsController@edit')->middleware('auth');;
Route::post('/products/{product}/edit', 'ProductsController@update')->middleware('auth');;


Auth::routes();
//
