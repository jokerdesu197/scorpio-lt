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
Route::group(['prefix'=> 'admin'], function(){
	Route::get('/','AdminController@index')->name('admin-index');
	Route::get('/dash-board','DashboardController@index')->name('dash-board');
	// User
	Route::group(['prefix' => 'users'], function(){
		Route::get('/user-list','UsersController@userList')->name('user-list');
		Route::get('/user-new','UsersController@userCreate')->name('user-create');
		Route::get('/user-edit/{id}','UsersController@userCreate')->name('user-update');
		Route::post('/p-user/{id?}','UsersController@postUserCreate')->name('post-user-create');
		Route::get('/user-delete/{id}','UsersController@userDelete')->name('user-delete');
	});
	Route::group(['prefix' => 'ACL'], function(){
		Route::get('/ACL-create', 'ACLController@ACLCreate')->name('ACL-create');
		Route::post('/p-ACL-create/{id?}', 'ACLController@postACLCreate')->name('post-ACL-create');
	});

	//Product groups
	Route::group(['prefix' => 'products'], function(){
		Route::get('/product-group-list','ProductAllsController@productGroupList')->name('product-gr-list');
		Route::get('/product-group-new','ProductAllsController@productGroupCreate')->name('product-gr-create');
		Route::get('/product-group-edit/{id}','ProductAllsController@productGroupCreate')->name('product-gr-update');
		Route::post('/p-product-group/{id?}','ProductAllsController@postProductGroupCreate')->name('post-product-gr-create');
		Route::get('/product-group-delete/{id}','ProductAllsController@productGroupDelete')->name('product-gr-delete');

		//Product types
		Route::get('/product-type-list','ProductAllsController@productTypeList')->name('product-type-list');
		Route::get('/product-type-new','ProductAllsController@productTypeCreate')->name('product-type-create');
		Route::get('/product-type-edit/{id}','ProductAllsController@productTypeCreate')->name('product-type-update');
		Route::post('/p-product-type/{id?}','ProductAllsController@postProductTypeCreate')->name('post-product-type-create');
		Route::get('/product-type-delete/{id}','ProductAllsController@productTypeDelete')->name('product-type-delete');

		//Product
		Route::get('/product-list','ProductsController@productList')->name('product-list');
		Route::get('/product-new','ProductsController@productCreate')->name('product-create');
		Route::get('/product-edit/{id}','ProductsController@productCreate')->name('product-update');
		Route::post('/p-product/{id?}','ProductsController@postProductCreate')->name('post-product-create');
		Route::get('/product-delete/{id}','ProductAllsController@productDelete')->name('product-delete');
	});
});
Route::post('/add-image', 'CommonController@addImage')->name('add-image');
