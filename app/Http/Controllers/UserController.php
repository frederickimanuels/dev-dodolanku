<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile(){
        return view('user/profile');
    }

    public function address(Request $request){
        $address = Auth::user()->address()->first();
        $provinces = Province::all();
        return view('user/address',compact('provinces','address'));
    }
	public function listOrder(){
        return view('user/listOrder');
    }
}
