<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // view masukin ke folder frontend
    public function profile()
    {
        return view('user/profile');
    }
    public function cart()
    {
        return view('cart/cart');
    }
    public function cartshop()
    {
        return view('cart/listshop');
    }
    public function category()
    {
        return view('frontend/category');
    }
}
