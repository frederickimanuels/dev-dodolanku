<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes;
    public function users()
    {
        return $this->belongsToMany(User::class, 'store_users');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_stores');
    }

    public function template()
    {
        return $this->belongsToMany(Template::class, 'template_stores');
    }

    public function activeProducts()
    {
        return $this->products()->where('products.is_active','1');
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_stores');
    }
    public function address()
    {
        return $this->belongsToMany(Address::class, 'address_stores')->withTimestamps();
    }
    public function currentAddress()
    {
        return $this->address()->whereNull('address_stores.deleted_at')->withTimestamps();
    }
    public function templateconfigs()
    {
        return $this->belongsToMany(Templateconfig::class, 'store_templateconfigs');
    }
}
