<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_orders');
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_orders')->withTimestamps();
    }
}
