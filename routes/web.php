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
Route::get('/products', 'ProductsController@index');
Route::get('/products/create', 'ProductsController@create');
Route::get('/products/show/{id}', 'ProductsController@show');
Route::get('/products/edit/{id}', 'ProductsController@edit');
Route::get('/products/delete/{id}', 'ProductsController@remove');
Route::post('/products/create', 'ProductsController@store');
Route::post('/products/images/upload', 'ProductsController@upload');
