<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ClienteController@index');

Route::get('client', 'ClienteController@index');
Route::post('client', 'ClienteController@store');
Route::get('client/{id}', 'ClienteController@show');
Route::delete('client/{id}', 'ClienteController@destroy');
Route::put('client/{id}', 'ClienteController@update');

Route::get('project/{id}/note', 'ProjectNoteController@index');
Route::post('project/{id}/note', 'ProjectNoteController@store');
Route::get('project/{id}/note/{nodeId}', 'ProjectNoteController@show');
Route::put('project/{id}/note/{nodeId}', 'ProjectNoteController@update');
Route::delete('project/{id}/note/{nodeId}', 'ProjectNoteController@delete');


Route::get('project', 'ProjectController@index');
Route::post('project', 'ProjectController@store');
Route::get('project/{id}', 'ProjectController@show');
Route::put('project/{id}', 'ProjectController@update');
Route::delete('project/{id}', 'ProjectController@destroy');
