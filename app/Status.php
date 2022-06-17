<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_status');
    }
}
