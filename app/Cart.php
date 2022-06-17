<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function variants()
    {
        return $this->belongsToMany(Variant::class, 'cart_variants')->withPivot('count');
    }
    public function status()
    {
        return $this->belongsToMany(Status::class, 'cart_status');
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

    public function hasVariant($variant_id)
    { 
        $cart = $this->join('cart_variants','cart_variants.cart_id','=','carts.id')
                    ->where('variant_id',$variant_id)
                    ->first();
        if($cart){
            return $cart;
        }else{
            return false;
        }
    }
    public function changecountVariant($cart_id,$variant_id,$add)
    {
        $cart = $this->where('id',$cart_id)->first();
        $cart = $cart->variants()->where('id',$variant_id)->first();
        $cart->pivot->count = $cart->pivot->count + $add;
        $cart->pivot->save();
        return $cart;
    }
}
