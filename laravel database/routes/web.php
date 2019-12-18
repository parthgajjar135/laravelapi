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

//Category

Route::resource('category', 'CategoryController');

//SubCategory

Route::resource('subcategory', 'SubCategoryController');

//Product

Route::resource('product', 'ProductController');

//Order

Route::resource('order', 'OrderController');

//OrderDetail

Route::resource('orderdetail', 'OrderDetailController');

//Form Table

Route::resource('form', 'FormController');

// Auth

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


