<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/feed/{feed}', 'FeedController@show');
Route::post('/parse', 'FeedController@parse');

Auth::routes();

Route::get('/home', 'HomeController@index');

/* Accounts */
Route::get('/accounts/register', 'AccountsController@create');
Route::post('/accounts/', 'AccountsController@store');

/* Pods */
Route::get('/pods/favorite',    'PodsController@favorite');

Route::post('/pods/status',     'PodsController@status');
Route::post('/pods/register',   'PodsController@store');

Route::get('/pods',             'PodsController@index');
Route::get('/servers',          'ServersController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/pods/refreshAll',  'PodsController@refreshAll');

    Route::get('/pods/{id}',        'PodsController@show');
    Route::get('/pods/{id}/edit',   'PodsController@edit');
    Route::put('/pods/{id}',        'PodsController@update')->name('pods.update');
    Route::get('/pods/{id}/refresh','PodsController@refresh');
    Route::delete('/pods/{id}',     'PodsController@destroy');

    Route::get('/servers/{id}/edit','ServersController@edit');
    Route::put('/servers/{id}',     'ServersController@update')->name('servers.update');
    Route::get('/servers/create',   'ServersController@create');
    Route::post('/servers',         'ServersController@store')->name('servers.store');
    Route::delete('/servers/{id}',  'ServersController@destroy');
});
