<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(){
        return view('user/profile');
    }
    public function address(){
        return view('user/address');
    }
}
