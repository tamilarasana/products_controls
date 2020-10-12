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

Route::get('/register', function () {
    return view('register');
});

Route::get('/success', function () {
    return view('success');
});

Route::get('/login', function () {
    return view('login');
});


Route::get('/category', function () {
    return view('category');
});

Route::get('/units', function () {
    return view('units');
});

Route::get('/products', function () {
    return view('products');
});

Route::post('/store',"UserController@store");
Route::post('/logs',"UserController@logs");
Route::get('/logout',"UserController@logout");

Route::post('/cate',"CategoryController@cate");
Route::post('/units',"UnitsController@units");
Route::post('/products',"ProductController@products");

Route::get('/products',"ProductController@getData");
Route::get('/category',"CategoryController@getData");
Route::get('/units',"UnitsController@getData");

Route::get('/category/{id}',"CategoryController@edit");
Route::post('/category_update/{id}',"CategoryController@update");
Route::get('/category_destroy/{id}',"CategoryController@destroy");

Route::get('/units/{id}',"UnitsController@edit");
Route::post('/units_update/{id}',"UnitsController@update");
Route::get('/unit_destroy/{id}',"UnitsController@destroy");

Route::get('/products/{id}',"ProductController@edit");
Route::post('/products_update/{id}',"ProductController@update");
Route::get('/product_destroy/{id}',"ProductController@destroy");

Route::get('/jointable',"JoinTableController@index");

