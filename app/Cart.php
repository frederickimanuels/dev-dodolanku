<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function variants()
    {
        return $this->belongsToMany(Variant::class, 'cart_variants')->withPivot('count');
    }
    public function status()
    {
        return $this->belongsToMany(Status::class, 'cart_status');
    }
    public function address()
    {
        return $this->belongsToMany(Address::class, 'cart_addresses');
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'cart_users');
    }
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'cart_stores');
    }
}
