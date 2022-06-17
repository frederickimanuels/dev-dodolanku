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
Route::get('/address','UserController@address')->name('user.address');
Route::post('/address','UserController@storeAddress')->name('user.address.store');
Route::get('/orders','UserController@orders')->name('user.order');


// Store Dashboard
Route::get('/store', 'StoreController@index')->name('store.index');
Route::get('/store/dashboard','StoreController@dashboard')->name('store.dashboard');
Route::get('/create-store','StoreController@create')->name('store.create');
Route::post('/create-store','StoreController@store')->name('store.store');

Route::get('/store/manage-product','ProductController@index')->name('store.product.manage');
Route::get('/store/add-product','ProductController@create')->name('store.product.add');
Route::post('/store/add-product','ProductController@store')->name('store.product.store');

Route::get('/list-order','StoreController@listOrder')->name('store.order');

Route::get('/chats','StoreController@chats')->name('store.chats');

Route::get('/create-product','StoreController@createProduct')->name('store.createProduct');
Route::get('/store-home','StoreController@storeHomepage')->name('store.home');
Route::get('/detail-product','StoreController@detailProduct')->name('store.detailProduct');

Route::get('/template','StoreController@StoreTemplates')->name('store.templates');
Route::get('/edittemplate','StoreController@editTemplate')->name('store.edittemplate');


Route::get('/location/getCities/{province}','LocationController@getCities');

Route::get('/seed-template','TemplateController@store');

// Route::get('/seed-address','UserController@seed_address');
Route::get('/cart','CartController@index')->name('cart');
ROute::post('/buy-now','CartController@buyNow')->name('cart.buynow');
Route::get('/{storeSlug}','StoreController@show')->name('store.show');
Route::get('/{storeSlug}/product','ProductController@list')->name('store.product.list');
Route::get('/{storeSlug}/cart','CartController@show')->name('cart.show');
Route::get('/{storeSlug}/{productSlug}','ProductController@show')->name('store.product.show');
// Route::get('/category','FrontendController@category')->name('category');

