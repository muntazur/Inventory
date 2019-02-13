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


//home
Route::get('/','UserController@home');

//For sign up 
Route::post('signup','UserController@storeUser');

//For Log in
Route::post('login','UserController@checkUser');


// main page
Route::get('/main',function(){
	return view('main');
});


//Route::get('ajaxRequest', 'HomeController@ajaxRequest');
//Route::post('ajaxRequest', 'HomeController@ajaxRequestPost');
