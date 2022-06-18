<?php

namespace App\Http\Controllers;

use App\Address;
use App\Order;
use App\Province;
use App\City;
use App\Status;
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

	public function orders(Request $request){
        $carts = Auth::user()->carts();
        $carts = $carts->join('cart_status','cart_status.cart_id','=','carts.id')
                    ->where('status_id','<>','1')
                    ->orderBy('cart_status.created_at','DESC')
                    ->paginate(2);
        return view('user/listOrder',compact('carts'));
    }
    public function detailOrders($reference_no){
        $order = Order::where('reference_no',$reference_no)->first();
        $cart = $order->carts()->first();
        $address = $cart->address()->first();
        $address->province = Province::where('id',$address->province_id)->first()->name;
        $address->city = City::where('id',$address->city_id)->first()->name;
        return view('user/detailOrder',compact('cart','address'));
    }
}
