<?php

namespace App\Http\Controllers;

use App\Store;
use App\Cart;
use App\Status;
use App\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view('cart/cart-list');
    }
    public function show($slug)
    {
        $store = Store::where('slug',$slug)->first();
        $cart = Auth::user()->hasCart($store->id);
        $variants = $cart->variants()->get();
        return view('cart/cart',compact('store','cart','variants'));
    }
    public function create($slug)
    {

    }
    public function buyNow(Request $request){
        $this->validate($request, [
            'store_id' => 'required|exists:stores,id',
            'variant_id' => 'required|exists:variants,id',
            'variant_quantity' => 'required|integer|min:1',
        ]);
        $store = Store::find($request->store_id);
        $exist_cart = Auth::user()->hasCart($store->id);
        if($exist_cart){
            dd("AA");
        }else{
            $cart = new Cart();
            $cart->save();

            $cart->status()->attach(1);
            $cart->users()->attach(Auth::user()->id);
            $cart->stores()->attach($store->id);
            $cart->variants()->attach($request->variant_id, ['count'=> $request->variant_quantity ]);
        }
        return redirect()->route('cart.show',$store->slug);
    }
}
