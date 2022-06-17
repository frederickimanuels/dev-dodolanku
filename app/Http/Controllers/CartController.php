<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('cart/cart');
    }
    public function create($slug)
    {

    }
    public function buyNow($slug, Request $request){
        // $this->validate($request, [
        //     'variant_id' => 'required|exists:variants,id',
        //     'variant_quantity' => 'required|integer|min:1',
        // ]);
        return redirect()->route('cart.show',$slug);
    }
}
