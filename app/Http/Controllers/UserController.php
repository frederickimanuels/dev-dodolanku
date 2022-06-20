<?php

namespace App\Http\Controllers;

use App\Address;
use App\Balance;
use App\Order;
use App\Province;
use App\City;
use App\Image;
use App\Status;
use Carbon\Carbon;
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

    public function storeProfile(Request $request){
        $this->validate($request, [
            'name' => 'required',
        ]);
        if($request->profile_photo){
            $this->validate($request, [
                'profile_photo' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);
        }
        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        
        if($request->profile_photo){
            $imageName = time().'.'.$request->profile_photo->getClientOriginalExtension();
            $request->profile_photo->move(public_path('images/stored'), $imageName);

            $old_image = $user->images()->first();
            
            $image = new Image();
            $image->filepath = $imageName;
            $image->save();

            $old_image = $user->images()->first();
            if($old_image){
                $user->images()->detach($old_image->id);
            }
            $user->images()->attach($image->id);
        }

        return redirect()->route('user.profile');
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
                    ->whereNull('cart_status.deleted_at')
                    ->orderBy('cart_status.created_at','DESC')
                    ->paginate(10);
        return view('user/listOrder',compact('carts'));
    }
    
    public function detailOrder($reference_no){
        $order = Order::where('reference_no',$reference_no)->first();
        $cart = $order->carts()->first();
        $address = $cart->address()->withTrashed()->first();
        $address->province = Province::where('id',$address->province_id)->first()->name;
        $address->city = City::where('id',$address->city_id)->first()->name;
        return view('user/detailOrder',compact('cart','address'));
    }

    public function finishOrder($reference_no){
        $order = Order::where('reference_no',$reference_no)->first();
        $cart = $order->carts()->first();
        $store = $cart->stores()->first();

        $store_balance = $store->currentBalance()->first();
        if($store_balance){
            $current_balance = $store_balance->value;

            $balance = new Balance();
            $total_order = $order->total_amount + $order->shipping_fee;
            $balance->value =  $total_order + $current_balance;
            $balance->save();
            $store_balance->stores()->updateExistingPivot($store->id, ['deleted_at' => Carbon::now()]);
            $balance->stores()->attach($store->id, ['change'=> $total_order, 'reference_no' => $order->reference_no] );
        }else{
            $balance = new Balance();
            $total_order = $order->total_amount + $order->shipping_fee;
            $balance->value =  $total_order;
            $balance->save();

            $balance->stores()->attach($store->id, ['change'=> $total_order, 'reference_no' => $order->reference_no ] );
        }
        $cart->status()->updateExistingPivot(4, ['deleted_at' => Carbon::now()]);
        $cart->status()->attach(5);

        return redirect()->back();
    }
}
