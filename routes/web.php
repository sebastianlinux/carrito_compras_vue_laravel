<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::group(['middleware' => ['auth']], function(){

});*/
	Route::get('/','MainController@mainView');
	Route::get('/orders','MainController@orders');
 	Route::get('/listProduct','MainController@listProduct');
 	Route::get('/listCategories','MainController@listCategories'); 	
 	Route::post('/pay','MainController@pay'); 