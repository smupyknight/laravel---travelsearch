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

Route::get('/', 'MainController@index');
Route::post('routes', 'MainController@routes');
Route::get('routes', 'MainController@routes');
Route::post('detail', 'MainController@detail');
Route::get('detail', 'MainController@detail');