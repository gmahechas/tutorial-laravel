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

Route::get('/', 'MainController@index');

Route::get('product', 'ProductController@index')->name('product.index');
Route::get('product/create', 'ProductController@create')->name('product.create');
Route::post('product', 'ProductController@store')->name('product.store');
Route::get('product/{product}', 'ProductController@show')->name('product.show');
Route::get('product/{product}/edit', 'ProductController@edit')->name('product.edit');
Route::match(['put', 'patch'], 'product/{product}', 'ProductController@update')->name('product.update');
Route::delete('product/{product}', 'ProductController@destroy')->name('product.destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
