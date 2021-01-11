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


Route::get('Category/view','CategoryController@view')->name("category.view");
Route::get('Category/add','CategoryController@add')->name("category.add");
Route::post('Category/store','CategoryController@store')->name("category.store");
Route::get('Category/edit/{id}','CategoryController@edit')->name("category.edit");
Route::post('Category/update/{id}','CategoryController@update')->name("category.update");
Route::post('Category/delete','CategoryController@delete')->name("category.delete");

Route::get('Product/view','ProductController@view')->name("product.view");
Route::get('Product/add','ProductController@add')->name("product.add");
Route::post('Product/store','ProductController@store')->name("product.store");
Route::get('Product/edit/{id}','ProductController@edit')->name("product.edit");
Route::post('Product/update/{id}','ProductController@update')->name("product.update");
Route::post('Product/delete','ProductController@delete')->name("product.delete");