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

Route::group([ 'middleware' => '\App\Http\Middleware\AdminMiddleware'], function(){
    Route::get('/admin', 'admin\AdminController@index')->name('admin.dashboard');
    Route::get('/admin/store-list', 'admin\AdminController@storeList')->name('admin.store.list');
    Route::get('/admin/store/edit/{store_slug}', 'admin\AdminController@storeEdit')->name('admin.store.edit');
    Route::get('/admin/store/delete/{store_slug}', 'admin\AdminController@storeDelete')->name('admin.store.delete');
});

Route::get('/about', 'HomepageController@about')->name('about');
Route::get('/feature','HomepageController@feature')->name('feature');
Route::get('/not-found','HomepageController@null')->name('null');

Auth::routes();

// Ajax
Route::get('/location/getCities/{province}','LocationController@getCities');
Route::post('/cart/update-couriertracking','CartController@postTracking')->name('cart.update.couriertracking');


// Middleware Auth
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile','UserController@profile')->name('user.profile');
Route::post('/profile','UserController@storeProfile')->name('user.profile');
Route::get('/address','UserController@address')->name('user.address');
Route::post('/address','UserController@storeAddress')->name('user.address.store');
Route::get('/orders','UserController@orders')->name('user.order');
Route::get('/orders/{reference_no}','UserController@detailOrder')->name('user.order.detail');
Route::get('/orders/finish/{reference_no}','UserController@finishOrder')->name('user.order.finish');

Route::get('/change-password','ChangePasswordController@index')->name('change.password');
Route::post('/change-password','ChangePasswordController@store')->name('change.password.store');

// Store
Route::get('/store', 'StoreController@index')->name('store.index');
Route::get('/store/dashboard','StoreController@dashboard')->name('store.dashboard');
Route::get('/create-store','StoreController@create')->name('store.create');
Route::post('/create-store','StoreController@store')->name('store.store');

Route::get('/store/manage','StoreController@edit')->name('store.manage');
Route::post('/store/update','StoreController@update')->name('store.update');

Route::get('/store/list-order','CartController@listOrder')->name('store.order');

// Product
Route::get('/store/manage-product','ProductController@index')->name('store.product.manage');
Route::get('/store/add-product','ProductController@create')->name('store.product.add');
Route::post('/store/add-product','ProductController@store')->name('store.product.store');
Route::get('/store/edit-product/{product_slug}','ProductController@edit')->name('store.product.edit');
Route::post('/store/edit-product/{product_slug}','ProductController@update')->name('store.product.update');
Route::get('/store/delete-product/{product_slug}','ProductController@delete')->name('store.product.delete');

// Template
Route::get('/store/template','TemplateController@index')->name('store.template');
Route::post('/store/template','TemplateController@store')->name('store.template');
Route::get('/store/template/list','TemplateController@list')->name('store.template.list');
Route::post('/store/template/update','TemplateController@update')->name('store.template.update');

// Cart
Route::get('/cart','CartController@index')->name('cart');
Route::post('/buy-now','CartController@buyNow')->name('cart.buynow');
Route::post('/pay','CartController@pay')->name('cart.pay');

Route::get('/{storeSlug}','StoreController@show')->name('store.show');
Route::get('/{storeSlug}/product','ProductController@list')->name('store.product.list');
Route::get('/{storeSlug}/cart','CartController@show')->name('cart.show');
Route::get('/{storeSlug}/{productSlug}','ProductController@show')->name('store.product.show');
// Route::get('/category','FrontendController@category')->name('category');

