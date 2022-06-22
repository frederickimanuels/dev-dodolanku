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

Auth::routes();
Route::get('/about', 'HomepageController@about')->name('about');
Route::get('/feature','HomepageController@feature')->name('feature');
Route::get('/terms','HomepageController@terms')->name('terms');
Route::get('/not-found','HomepageController@null')->name('notfound');

Route::post('/email-us','HomepageController@emailUs')->name('email-us');

Route::get('/forgot-password','ForgotPasswordController@index')->name('forgot.password');
Route::post('/forgot-password','ForgotPasswordController@requestEmail')->name('forgot.password');
Route::get('/reset-password/{token}','ForgotPasswordController@resetPassword')->name('reset.password');
Route::post('/reset-password','ForgotPasswordController@submitPassword')->name('reset.password');


Route::group([ 'middleware' => '\App\Http\Middleware\AdminMiddleware'], function(){
    Route::get('/admin', 'admin\AdminController@index')->name('admin.dashboard');

    // Store
    Route::get('/admin/store-list', 'admin\AdminController@storeList')->name('admin.store.list');
    
    // User
    Route::get('/admin/user-list', 'admin\AdminController@userList')->name('admin.user');

    // Balance
    Route::get('/admin/withdrawal','admin\AdminController@withdrawalList')->name('admin.withdrawal.list');
    Route::get('/admin/withdrawal/accept/{withdrawal_id}','admin\AdminController@withdrawalAccept')->name('admin.withdrawal.accept');
    Route::get('/admin/withdrawal/reject/{withdrawal_id}','admin\AdminController@withdrawalReject')->name('admin.withdrawal.reject');

    // Ban
    Route::get('/admin/store/ban/{store_id}','admin\AdminBanController@banStore')->name('admin.store.ban');
    Route::get('/admin/user/ban/{user_id}','admin\AdminBanController@banUser')->name('admin.user.ban');
    Route::get('/admin/store/unban/{store_id}','admin\AdminBanController@unbanStore')->name('admin.store.unban');
    Route::get('/admin/user/unban/{user_id}','admin\AdminBanController@unbanUser')->name('admin.user.unban');

    // Order
    Route::get('/admin/order','admin\AdminOrderController@index')->name('admin.order');
    Route::get('/admin/order/cancel/{order_id}','admin\AdminOrderController@cancelOrder')->name('admin.order.cancel');

    // Tips
    Route::get('/admin/tips', 'admin\AdminTipsController@index')->name('admin.tips');
    Route::get('/admin/tips/create', 'admin\AdminTipsController@create')->name('admin.tips.create');
    Route::post('/admin/tips/create', 'admin\AdminTipsController@store')->name('admin.tips.store');
    Route::get('/admin/tips/edit/{tips_id}', 'admin\AdminTipsController@edit')->name('admin.tips.edit');
    Route::post('/admin/tips/edit/{tips_id}', 'admin\AdminTipsController@update')->name('admin.tips.update');
    Route::get('/admin/tips/toggle/{tips_id}', 'admin\AdminTipsController@toggle')->name('admin.tips.toggle');
    Route::get('/admin/tips/delete/{tips_id}', 'admin\AdminTipsController@delete')->name('admin.tips.delete');
});

Route::group([ 'middleware' => '\App\Http\Middleware\LoginMiddleware'], function(){
    // Ajax
    Route::get('/location/getCities/{province}','LocationController@getCities');
    Route::post('/cart/update-couriertracking','CartController@postTracking')->name('cart.update.couriertracking');

    // Store
    Route::get('/store', 'StoreController@index')->name('store.index');
    Route::get('/create-store','StoreController@create')->name('store.create');
    Route::post('/create-store','StoreController@store')->name('store.store');
    Route::get('/store/dashboard','StoreController@dashboard')->name('store.dashboard');
    Route::get('/store/manage','StoreController@edit')->name('store.manage');
    Route::post('/store/update','StoreController@update')->name('store.update');
    Route::get('/store/list-order','CartController@listOrder')->name('store.order');
    
    // User
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile','UserController@profile')->name('user.profile');
    Route::post('/profile','UserController@storeProfile')->name('user.profile');
    Route::get('/address','UserController@address')->name('user.address');
    Route::post('/address','UserController@storeAddress')->name('user.address.store');

    // Password

    Route::get('/change-password','ChangePasswordController@index')->name('change.password');
    Route::post('/change-password','ChangePasswordController@store')->name('change.password.store');

    // Order
    Route::get('/orders','UserController@orders')->name('user.order');
    Route::get('/orders/{reference_no}','UserController@detailOrder')->name('user.order.detail');
    Route::get('/orders/finish/{reference_no}','UserController@finishOrder')->name('user.order.finish');

    // Product
    Route::get('/store/manage-product','ProductController@index')->name('store.product.manage');
    Route::get('/store/add-product','ProductController@create')->name('store.product.add');
    Route::post('/store/add-product','ProductController@store')->name('store.product.store');
    Route::get('/store/edit-product/{product_slug}','ProductController@edit')->name('store.product.edit');
    Route::post('/store/edit-product/{product_slug}','ProductController@update')->name('store.product.update');
    Route::get('/store/delete-product/{product_slug}','ProductController@delete')->name('store.product.delete');

    // Cart
    Route::get('/cart','CartController@index')->name('cart');
    Route::get('/cart/remove-product/{cart_id}/{product_id}','CartController@removeProduct')->name('cart.product.remove');
    Route::post('/buy-now','CartController@buyNow')->name('cart.buynow');
    Route::post('/pay','CartController@pay')->name('cart.pay');
    
    // Balance
    Route::get('/store/balance','BalanceController@index')->name('store.balance');
    Route::post('/store/balance/withdraw','BalanceController@withdraw')->name('store.balance.withdraw');

    // Template
    Route::get('/store/template','TemplateController@index')->name('store.template');
    Route::get('/store/template/use/{template_id}','TemplateController@store')->name('store.template.use');

    Route::get('/store/template/list','TemplateController@list')->name('store.template.list');
    Route::post('/store/template/update','TemplateController@update')->name('store.template.update');
    Route::get('/store/template/reset-text','TemplateController@resetText')->name('store.template.reset-text');
    Route::get('/store/template/reset-bg','TemplateController@resetBg')->name('store.template.reset-bg');
});



Route::get('/{storeSlug}','StoreController@show')->name('store.show');

Route::group([ 'middleware' => '\App\Http\Middleware\LoginMiddleware'], function(){
    Route::get('/{storeSlug}/cart','CartController@show')->name('cart.show');
});

Route::get('/{storeSlug}/product','ProductController@list')->name('store.product.list');
Route::get('/{storeSlug}/{productSlug}','ProductController@show')->name('store.product.show');

