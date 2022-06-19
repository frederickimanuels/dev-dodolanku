<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'product_stores')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }

    public function hasStore()
    {
        return $this->stores()->first();
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_products')->withPivot('count');;
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'product_images');
    }
}
