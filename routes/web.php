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

// Add Brand
Route::post('brand','InventoryController@saveBrand');


// Add category
Route::post('category','InventoryController@saveCategory');

// Add Brand
Route::post('product','InventoryController@saveProduct');

//getAllCategory
Route::get('allcategory','InventoryController@getAllCategoryName');

//get categories table
Route::get('get_categories','InventoryController@getCategories');

// get brands table
Route::get('get_brands','InventoryController@getBrands');


//get products table
Route::get('get_products','InventoryController@getProducts');




