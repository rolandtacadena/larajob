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

Auth::routes();

Route::get('/', 'JobsController@index')->name('index');
Route::get('jobs/create', 'JobsController@create')->name('create-job');
Route::get('jobs/{job}', 'JobsController@show')->name('show-job');
Route::post('jobs', 'JobsController@store')->name('store-job');