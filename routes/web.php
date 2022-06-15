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

Route::get('/', 'HomepageController@index')->name('base');
Route::get('/about', 'HomepageController@about')->name('about');
Route::get('/feature','HomepageController@feature')->name('feature');

Auth::routes();

// Middleware Auth
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile','UserController@profile')->name('user.profile');


Route::get('/cart','FrontendController@cart')->name('cart');

// Store Dashboard
Route::get('/store', 'StoreController@index')->name('store.index');
Route::get('/store/dashboard','StoreController@dashboard')->name('store.dashboard');
Route::get('/create-store','StoreController@create')->name('store.create');
Route::post('/create-store','StoreController@store')->name('store.store');

Route::get('/store/manage-product','ProductController@index')->name('store.product.manage');
Route::get('/store/add-product','ProductController@create')->name('store.product.add');

Route::get('/list-order','StoreController@listOrder')->name('store.order');

Route::get('/chats','StoreController@chats')->name('store.chats');

Route::get('/create-product','StoreController@createProduct')->name('store.createProduct');
Route::get('/store-home','StoreController@storeHomepage')->name('store.home');
Route::get('/detail-product','StoreController@detailProduct')->name('store.detailProduct');

Route::get('/template','StoreController@StoreTemplates')->name('store.templates');


Route::get('/location/getCities/{province}','LocationController@getCities');



Route::get('/{slug}','StoreController@show')->name('store.show');
// Route::get('/category','FrontendController@category')->name('category');
