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

Route::group(['middleware' => ['web','auth']],function(){
	Route::get('dashboard',['as' => 'dashboard','uses' => 'PageController@dashboard']);
	Route::get('notlevel2',['as'=>'notlevel2','uses' => 'PageController@notlevel2']);	
});

Route::group(['prefix'=>'quest/{page_id}','middleware' => ['web','auth','time','track']], function(){
	Route::get('terminal',['as' => 'terminal','uses' => 'PageController@terminal']);
	Route::get('redirect/{flag}/{level}',['uses' => 'PageController@level2']);
	Route::get('cmail',['as' => 'cmail','uses' => 'PageController@cmail']);

});

Route::group(['prefix'=>'api','middleware' => ['web','auth','time']],function(){
	Route::get('term-login',['uses'=>'AjaxController@term_login']);
	Route::get('cmail-auth',['uses'=>'AjaxController@cmail_auth']);
});