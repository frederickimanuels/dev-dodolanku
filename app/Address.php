<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_addresses');
    }
}
