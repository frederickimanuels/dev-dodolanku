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

Auth::routes();

// Middleware Auth
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/feature','HomepageController@feature')->name('feature');
Route::get('/aboutstore','HomepageController@aboutStore')->name('aboutus');

// Route::get('/login','FrontendController@login')->name('login');
// Route::get('/register','FrontendController@register')->name('register');

Route::get('/create-store','StoreController@create')->name('store.create');
Route::post('/create-store','StoreController@store')->name('store.store');
Route::get('/list-product','StoreController@list')->name('store.list');
Route::get('/list-order','StoreController@listOrder')->name('store.order');
Route::get('/chats','StoreController@chats')->name('store.chats');
Route::get('/create-product','StoreController@createProduct')->name('store.createProduct');
Route::get('/store-home','StoreController@storeHomepage')->name('store.home');
Route::get('/detail-product','StoreController@detailProduct')->name('store.detailProduct');

Route::get('/dashboard','StoreController@index')->name('store.dashboard');
Route::get('/template','StoreController@StoreTemplates')->name('store.templates');


Route::get('/location/getCities/{province}','LocationController@getCities');


Route::get('/profile','FrontendController@profile')->name('profile');
Route::get('/cart','FrontendController@cart')->name('cart');

Route::get('/{slug}','StoreController@show')->name('store.show');
// Route::get('/category','FrontendController@category')->name('category');
