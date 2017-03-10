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
Route::get('test','PageController@test');

Route::group(['middleware' => ['web','auth']],function(){
	Route::get('dashboard',['as' => 'dashboard','uses' => 'PageController@dashboard']);	
});

Route::group(['prefix'=>'quest','middleware' => ['web','auth','time']], function(){
	Route::get('terminal',['as' => 'terminal','uses' => 'PageController@terminal']);
	Route::get('redirect/{flag}/{level}',['as'=>'level1','uses' => 'PageController@level1']);
});