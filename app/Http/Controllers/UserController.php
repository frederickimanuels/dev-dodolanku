<?php

namespace App\Http\Controllers;

use App\Address;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        return view('user/profile');
    }

    public function address(Request $request){
        $provinces = Province::all();
        return view('user/address',compact('provinces'));
    }

    public function storeAddress(Request $request){
        $this->validate($request, [
            'province' => 'required',
            'city' => 'required|exists:cities,id',
            'description' => 'required|string|min:10',
        ]);
        $old_address = Auth::user()->address()->orderBy('created_at','ASC')->first();
        if($old_address){
            $old_address->delete();
        }

        $address = new Address();
        $address->description = $request->description;
        $address->province_id = $request->province;
        $address->city_id = $request->city;
        $address->save();

        $address->users()->attach(Auth::user()->id);

        return redirect()->route('user.address');
    }

	public function orders(){
        return view('user/listOrder');
    }
    public function detailOrders(){
        return view('user/detailOrder');
    }
}
