<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request){
        $orders = [];
        if($request->reference_no){
            $orders = Order::where('reference_no',$request->reference_no)->get();
        }
        return view('admin/order',compact('orders'));
    }

    public function cancelOrder($order_id, Request $request){
        $order = Order::where('id',$order_id)->first();
        $cart = $order->carts()->first();
        if($cart->status()->first()->id != 2){
            return back()->with('error','Gagal cancel order '.$order->reference_no);
        }else{
            $cart->status()->updateExistingPivot(2, ['deleted_at' => Carbon::now()]);
            $cart->status()->attach(3);
            return back()->with('status','Sukses cancel order '.$order->reference_no);
        }
    }
}
