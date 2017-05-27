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

Route::post('jobs', 'JobsController@store')
    ->name('store-job');
Route::get('/', 'JobsController@index')
    ->name('index');
Route::get('jobs/create', 'JobsController@create')
    ->name('create-job');
Route::delete('jobs/{job}', 'JobsController@destroy')
    ->name('delete-job');
Route::patch('jobs/{job}', 'JobsController@update')
    ->name('update-job');
Route::get('jobs/{job}', 'JobsController@show')
    ->name('show-job');
Route::get('jobs/{job}/edit', 'JobsController@edit')
    ->name('edit-job');

Route::get('u/{user}/profile', 'UsersController@employer_profile')
    ->name('employer-profile');
Route::get('u/{user}/jobs', 'UsersController@employer_jobs')
    ->name('employer_jobs');
Route::get('u/{user}/profile/edit', 'UsersController@employer_edit_profile')
    ->name('employer-edit-profile');
Route::post('u/{user}/profile/update', 'UsersController@employer_update_profile')
    ->name('employer-update-profile');

// ajax routes
Route::group(['prefix' => 'ajax'], function () {
    Route::get('jobs', 'JobsController@all');
    Route::get('categories', 'CategoriesController@all');
    Route::get('types', 'TypesController@all');
    Route::get('get-auth-user', 'UsersController@get_auth_user');
    Route::get('search', 'SearchController@search')->name('job-search');
});

// static routes
Route::get('about', 'StaticPagesController@about')
    ->name('about');

