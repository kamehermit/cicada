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

Route::group(['prefix' =>'promo/{page_id}'], function(){
	Route::get('start',['as'=>'start','uses'=>'PageController@start']);
	Route::get('text',['as'=>'text','uses'=>'PageController@text']);
});

Route::get('/',['as' => 'index','uses' => 'PageController@index']);
Route::get('auth/facebook', 'AuthController@redirect');
Route::get('auth/facebook/callback', 'AuthController@callback');

Route::group(['middleware' => ['auth']],function(){
	Route::get('dashboard',['as' => 'dashboard','uses' => 'PageController@dashboard']);	
});

Route::group(['middleware' => ['auth','time']], function(){
	Route::get('notlevel3',['as'=>'notlevel3','uses' => 'PageController@notlevel3']);
	Route::get('hotel-reservation-efr92h48e',['as'=>'hotel-reservation-efr92h48e','uses' => 'AjaxController@hotel_reservation']);
	Route::get('banned',['as'=>'banned','uses'=>'PageController@banned']);
	//Route::get('')
});

Route::group(['prefix'=>'quest/{page_id}','middleware' => ['auth','time','track','ban']], function(){
	Route::get('terminal',['as' => 'terminal','uses' => 'PageController@terminal']);
	Route::get('redirect/{flag}/{level}',['uses' => 'PageController@level2']);
	Route::get('cmail',['as' => 'cmail','uses' => 'PageController@cmail']);
	Route::get('cmail/inbox',['as'=>'inbox','uses'=>'PageController@inbox']);
	Route::get('hotel-reservation',['as'=>'hotel-reservation','uses'=>'PageController@hotel_reservation']);
	Route::get('navigation',['as'=>'navigation','uses'=>'PageController@navigation']);
	Route::get('doors',['as'=>'doors','uses'=>'PageController@doors']);
	Route::get('usb',['as'=>'usb','uses'=>'PageController@usb']);
});

Route::group(['prefix'=>'api','middleware' => ['auth','time']],function(){
	Route::post('term-login','AjaxController@term_login');
	Route::post('cmail-auth','AjaxController@cmail_auth');
	Route::post('confirm-reservation','AjaxController@confirm_reservation');
	Route::post('pattern-auth','AjaxController@pattern_auth');
	Route::post('door-auth','AjaxController@door_auth');
});