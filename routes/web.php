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
Route::get('/admin','AdminController@index')->name('admin-index');
Route::get('/dash-board','DashboardController@index')->name('admin-home');
Route::get('/user','UsersController@userList')->name('user-list');
Route::get('/user-new','UsersController@userCreate')->name('user-create');