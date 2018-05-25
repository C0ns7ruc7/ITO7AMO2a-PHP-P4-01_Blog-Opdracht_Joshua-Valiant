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

Route::get('/', 'GenericController@index');

Route::group(['prefix' => '/lijst'], function() {
    Route::get('/', 'LijstController@index');
    Route::post('/create', 'LijstController@create');
    Route::post('/store/{request}', 'LijstController@store');
    Route::get('/show/{id}', 'LijstController@show');
    Route::post('/edit/{id}', 'LijstController@edit');
    Route::post('/update/{id}/{request}', 'LijstController@update');
    Route::post('/destroy/{id}', 'LijstController@destroy');
});