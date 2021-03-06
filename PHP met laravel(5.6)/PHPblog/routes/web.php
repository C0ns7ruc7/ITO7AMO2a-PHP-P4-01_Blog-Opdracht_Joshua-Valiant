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
Route::resource('lijst', 'LijstController')->except([
    'update'
]);
Route::post('/lijst/{id}/update', 'LijstController@update');