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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home2','FrontendController@index')->name('homepage');
Route::get('/login','FrontendController@login')->name('login');
Route::get('/register','FrontendController@register')->name('register');
route::get('/dashboard','FrontendController@dashboard')->name('dashboard');
Route::get('/aboutus','FrontendController@aboutus')->name('aboutus');
Route::get('/profile','FrontendController@profile')->name('profile');
Route::get('/cart','FrontendController@cart')->name('cart');
Route::get('/category','FrontendController@category')->name('category');