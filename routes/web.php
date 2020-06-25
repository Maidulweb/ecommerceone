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

Route::get('/', 'PageController@index')->name('page.index');
Route::get('/product/{slug}', 'ProductController@show')->name('product.show');

Route::get('/cart', 'CartController@showcart')->name('cart.show');
Route::post('/cart/add', 'CartController@addcart')->name('cart.add');
Route::post('/cart/remove', 'CartController@removecart')->name('cart.remove');
Route::get('/cart/clear', 'CartController@clearcart')->name('cart.clear');

