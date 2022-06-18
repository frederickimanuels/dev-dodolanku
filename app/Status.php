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
    public function notinCart()
    {
        return $this->carts()->wherePivot('status_id','<>',1)->get();
    }
}
