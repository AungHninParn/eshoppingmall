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

Route::get('/', function () {
    return view('welcome');
});



//Route::resource('products','backend\SellerController');

Auth::routes();


//middleware
Route::middleware('role:admin')->group(function(){
	
	Route::resource('categories','backend\CategoryController');

	Route::resource('products','backend\ProductController');

});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','frontend\FrontendController@index');




