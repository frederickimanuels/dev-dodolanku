<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_addresses');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'address_users');
    }
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'address_stores');
    }
}
