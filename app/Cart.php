<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;
    public function status()
    {
        return $this->belongsToMany(Status::class, 'cart_status')->whereNull('cart_status.deleted_at')->withTimestamps();
    }
    public function allStatus()
    {
        return $this->belongsToMany(Status::class, 'cart_status')->withTimestamps();
    }
    public function address()
    {
        return $this->belongsToMany(Address::class, 'cart_addresses');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'cart_users');
    }
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'cart_stores');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_products')->withPivot('count');
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'cart_orders');
    }

    public function hasProduct($cart_id,$product_id)
    {
        $cart = $this->join('cart_products','cart_products.cart_id','=','carts.id')
                    ->where('cart_id',$cart_id)
                    ->where('product_id',$product_id)
                    ->first();
        if($cart){
            return $cart;
        }else{
            return false;
        }
    }
    public function changeProductCount($cart_product,$add)
    {
        $product = Product::where('id',$cart_product->product_id)->first();
        if($product->stock < ($cart_product->count + $add)){
            return false;
        }
        $cart = $this->where('id',$cart_product->id)->first();
        $cart = $cart->products()->where('id',$product->id)->first();
        $cart->pivot->count = $cart->pivot->count + $add;
        $cart->pivot->save();
        return $cart;
    }
}
