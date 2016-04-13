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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/dashboard', 'DashboardController@index');

Route::get(     '/dashboard/users',       'UserController@index');
Route::get(     '/dashboard/user',        'UserController@create');
Route::post(    '/dashboard/user',        'UserController@store');
Route::get(     '/dashboard/user/{user}', 'UserController@edit');
Route::patch(   '/dashboard/user/{user}', 'UserController@update');
Route::delete(  '/dashboard/user/{user}', 'UserController@destroy');
