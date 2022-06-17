<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    public function product()
    {
        return $this->belongsToMany(Product::class, 'variant_products');
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_variants')->withPivot('count');
    }
}
