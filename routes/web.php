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

Auth::routes();

//middleware
Route::middleware('role:admin')->group(function(){
	
	Route::resource('categories','backend\CategoryController');

	Route::resource('products','backend\ProductController');

	Route::resource('customers','backend\CustomerController');

	Route::resource('sellers','backend\SellerController');

});
Route::get('/search','SearchController@search')->name('backendsearch');

Route::resource('orders','backend\OrderController');
Route::resource('users','backend\UserController');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','frontend\FrontendController@index')->name('index');

Route::get('detail/{id}','frontend\FrontendController@detail')->name('detail');

Route::get('product','frontend\FrontendController@product')->name('product');

Route::get('cart','frontend\FrontendController@cart')->name('cart')->middleware('auth');


Route::post('create','frontend\FrontendController@store');
Route::get('edit/{id}','frontend\FrontendController@edit')->name('edit');
Route::post('edit/{id}','frontend\FrontendController@update')->name('update');
Route::delete('delete','frontend\FrontendController@destroy')->name('delete');


Route::get('contact','frontend\FrontendController@contact')->name('contact');
Route::get('about','frontend\FrontendController@about')->name('about');
Route::get('orderlist/{id}','frontend\FrontendController@orderlist')->name('orderlist');
Route::get('shop/{id}','frontend\FrontendController@shop')->name('shop')->middleware('role:seller');

Route::get('/markasRead', function(){
	auth()->user()->unreadNotifications->markAsRead();
	//return redirect()->back();
})->name('mark');

Route::post('/search','frontend\FrontendController@search')->name('search');







