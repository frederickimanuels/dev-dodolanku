<?php

namespace App\Http\Controllers\admin;

use App\Balance;
use App\Banned;
use App\Cart;
use App\Http\Controllers\Controller;
use App\Order;
use App\Store;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminBanController extends Controller
{
    public function banStore($store_id)
    {
        $store = Store::where('id',$store_id)->first();
        $active_carts = $store->activeCarts();
        foreach($active_carts as $active_cart){
            $active_cart_user = $active_cart->users()->first();
            if($active_cart_user){
                $active_cart->users()->detach($active_cart_user->id);
            }
        }
        $store->banned()->attach(1);
        return redirect()->back()->with('status','Sukses ban toko ' . $store->name);
    }
    public function unbanStore($store_id)
    {
        $store = Store::where('id',$store_id)->first();
        $store->banned()->detach(1);
        return redirect()->back()->with('status','Sukses unban toko ' . $store->name);
    }

    public function forceFinishOrder($reference_no){
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

        return true;
    }

    public function banUser($user_id)
    {
        $user = User::where('id',$user_id)->first();
        $carts = $user->hasCartOrders();
        foreach($carts as $cart){
            if($cart->status()->first()->id == 4){
                $this->forceFinishOrder($cart->orders()->first()->reference_no);
            }
        }
        $user->banned()->attach(1);
        return redirect()->back()->with('status','Sukses ban user ' . $user->name);
    }
    public function unbanUser($user_id)
    {
        $user = User::where('id',$user_id)->first();
        $user->banned()->detach(1);
        return redirect()->back()->with('status','Sukses unban user ' . $user->name);
    }
}
