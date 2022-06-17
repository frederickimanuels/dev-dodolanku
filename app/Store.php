<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
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
}
