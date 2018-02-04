<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/', 'JobOffersController@list');
Route::get('/create', 'JobOffersController@create');
Route::get('/{id}', 'JobOffersController@show');
Route::post('/create', 'JobOffersController@save');
