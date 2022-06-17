<?php

namespace App\Http\Controllers;

use App\Address;
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

    public function seed_address(){
        $address = new Address();
        $address->description = "Jl magelang no 129";
        $address->province_id = 11;
        $address->city_id = 248;
        $address->save();

        $address->users()->attach(Auth::user()->id);
    }

	public function listOrder(){
        return view('user/listOrder');
    }
}
