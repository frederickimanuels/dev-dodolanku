<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'product_stores');
    }

    public function variants()
    {
        return $this->belongsToMany(Variant::class, 'variant_products');
    }
}
