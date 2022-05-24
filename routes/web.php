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
Route::get('/about', 'HomepageController@about');

Auth::routes();

// Middleware Auth
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home2','FrontendController@index')->name('homepage');
route::get('/dashboard','FrontendController@dashboard')->name('dashboard');
Route::get('/profile','FrontendController@profile')->name('profile');
