<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // view masukin ke folder frontend
    public function index()
    {
        return view ('frontend/home');
    }
    public function home2(){
        return view('frontend/homepage2');
    }
    public function login()
    {
        return view ('frontend/login');
    }
    public function register()
    {
        return view ('frontend/register');
    }
    public function dashboard()
    {
        return view ('frontend/dashboard');
    }
    public function aboutus()
    {
        return view ('frontend/aboutUs');
    }
    public function profile()
    {
        return view('frontend/profile');
    }
    public function cart()
    {
        return view('frontend/cart');
    }
    public function category()
    {
        return view('frontend/category');
    }
    public function createStore()
    {
        return view('frontend/createStore');
    }
}
