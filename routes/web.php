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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::post('password/email', 'Auth\LoginController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset', 'Auth\LoginController@showLinkRequestForm')->name('password.request');
Route::post('password/reset', 'Auth\LoginController@reset');
Route::get('password/reset{token}', 'Auth\LoginController@showResetForm')->name('password.reset');

Route::get('/', 'JobOffersController@list')->name('home');
Route::get('/create', 'JobOffersController@create')->name('new-job-offer');
Route::get('/{id}', 'JobOffersController@show');
Route::get('/{id}/{status}', 'JobOffersController@updateStatus');
Route::post('/create', 'JobOffersController@save');
