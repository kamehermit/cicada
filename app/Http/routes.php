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

Route::get('/',['as' => 'index','uses' => 'PageController@index']);
Route::get('auth/facebook', 'AuthController@redirect');
Route::get('auth/facebook/callback', 'AuthController@callback');
Route::get('dashboard',['as' => 'dashboard','uses' => 'PageController@dashboard']);