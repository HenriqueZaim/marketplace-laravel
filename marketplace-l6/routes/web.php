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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@show')->name('product.show');

Route::prefix('cart')->name('cart.')->group(function(){
    Route::post('add', 'CartController@add')->name('add');
    Route::get('/', 'CartController@index')->name('index');
    Route::get('/remove/{slug}', 'CartController@remove')->name('remove');
    Route::get('/cancel', 'CartController@cancel')->name('cancel');
});

Route::prefix('checkout')->name('checkout.')->group(function(){
    Route::get('/', 'CheckoutController@index')->name('index');
    Route::post('/proccess', 'CheckoutController@proccess')->name('proccess');
});

Route::group(['middleware' => ['auth']], function(){
    Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function(){

        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');
        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
    });

});

Auth::routes();

