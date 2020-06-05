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
})->name('home');
Route::group(['prefix'=> 'admin'], function(){
	Route::get('/login','LoginController@getLogin')->name('admin-login');
	Route::post('/login','LoginController@postLogin')->name('admin-post-login');
	Route::get('/register','LoginController@getRegister')->name('admin-register');
	Route::post('/p-register','LoginController@postRegister')->name('admin-post-register');
	Route::get('/logout','LoginController@logout')->name('admin-logout');
	Route::get('/','AdminController@index')->name('admin-index');
	Route::get('/dash-board','DashBoardController@index')->name('dash-board');
	// User
	Route::group(['prefix' => 'users'], function(){
		Route::get('/','UserController@userList')->name('user-list');
		Route::get('/user-new','UserController@userCreate')->name('user-create');
		Route::get('/user-edit/{id}','UserController@userCreate')->name('user-update');
		Route::post('/p-user/{id?}','UserController@postUserCreate')->name('post-user-create');
		Route::get('/user-delete/{id}','UserController@userDelete')->name('user-delete');
	});
	// Role
	Route::group(['prefix' => 'roles'], function(){
		Route::get('/', 'ACLController@roleList')->name('role-list');
		Route::get('/role-create', 'ACLController@roleCreate')->name('role-create');
		Route::get('/role-edit/{id}', 'ACLController@roleCreate')->name('role-update');
		Route::post('/p-role-create/{id?}', 'ACLController@postRoleCreate')->name('post-role-create');
		Route::get('/delete-role/{id}', 'ACLController@roleDelete')->name('role-delete');
	});
	Route::group(['prefix' => 'ACL'], function(){
		Route::get('/detail/{id}', 'ACLController@ACLCreate')->name('ACL-detail');
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

		//Product classes
		Route::get('/product-class-list','ProductAllsController@productClassList')->name('product-class-list');
		Route::get('/product-class-new','ProductAllsController@productClassCreate')->name('product-class-create');
		Route::get('/product-class-edit/{id}','ProductAllsController@productClassCreate')->name('product-class-update');
		Route::post('/p-product-class/{id?}','ProductAllsController@postProductClassCreate')->name('post-product-class-create');
		Route::get('/product-class-delete/{id}','ProductAllsController@productClassDelete')->name('product-class-delete');

		//Product
		Route::get('/','ProductController@productList')->name('product-list');
		Route::get('/product-new','ProductController@productCreate')->name('product-create');
		Route::get('/product-edit/{id}','ProductController@productCreate')->name('product-update');
		Route::post('/p-product/{id?}','ProductController@postProductCreate')->name('post-product-create');
		Route::get('/product-delete/{id}','ProductController@productDelete')->name('product-delete');
	});
});
Route::post('/add-image', 'CommonController@addImage')->name('add-image');
