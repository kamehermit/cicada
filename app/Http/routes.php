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

Route::group(['middleware' => ['auth']],function(){
	Route::get('dashboard',['as' => 'dashboard','uses' => 'PageController@dashboard']);
	Route::get('notlevel2',['as'=>'notlevel2','uses' => 'PageController@notlevel2']);	
});

Route::group(['prefix'=>'quest/{page_id}','middleware' => ['auth','time','track']], function(){
	Route::get('terminal',['as' => 'terminal','uses' => 'PageController@terminal']);
	Route::get('redirect/{flag}/{level}',['uses' => 'PageController@level2']);
	Route::get('cmail',['as' => 'cmail','uses' => 'PageController@cmail']);
	Route::get('cmail/inbox',['as'=>'inbox','uses'=>'PageController@inbox']);

});

Route::group(['prefix'=>'api','middleware' => ['auth','time']],function(){
	Route::post('term-login','AjaxController@term_login');
	Route::post('cmail-auth','AjaxController@cmail_auth');
});