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

Route::get('/', 'PageController@pageIndex')->name('f-index');
Route::get('/news', 'NewsController@news')->name('f-news-index');
Route::get('/products', 'PageController@productList')->name('f-product-list');
Route::get('/products/detail/{id}', 'PageController@productDetail')->name('f-product-detail');
