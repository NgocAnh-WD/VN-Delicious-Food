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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products', 'HomeController@index1')->name('products');
Route::get('/product_details', 'HomeController@index2')->name('product_details');
Route::get('/cart', 'HomeController@index3')->name('cart');
Route::get('/admin', 'HomeController@index4')->name('admin');
Route::resource('admin/products', 'AdminProductsController', array('as' => 'admin'));
Route::resource('admin/categories', 'AdminCategoriesController', array('as' => 'admin'));
Route::resource('admin/users', 'AdminUserController', array('as' => 'admin'));