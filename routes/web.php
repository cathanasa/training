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

Route::get('filter', 'ProjectController@filter');

Route::get('index', 'ProjectController@index');

Route::get('new', 'ProjectController@new');

Route::post('store', 'ProjectController@store');

Route::get('view/{id}', ['uses'=>'ProjectController@view', 'as'=>'view']);

Route::get('edit/{id}', ['uses'=>'ProjectController@edit', 'as'=>'edit']);

Route::put('update/{id}', ['uses'=>'ProjectController@update', 'as'=>'update']);

Route::delete('delete/{id}', ['uses'=>'ProjectController@delete', 'as'=>'delete']);

Route::get('confirm/{id}', ['uses'=>'ProjectController@confirm', 'as'=>'confirm']);
