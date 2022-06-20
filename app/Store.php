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
        return $this->belongsToMany(Product::class, 'product_stores')->whereNull('product_stores.deleted_at')->withTimestamps();
    }

    public function template()
    {
        return $this->belongsToMany(Template::class, 'template_stores');
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_stores');
    }
    public function activeCarts()
    {
        return $this->carts()->join('cart_status','cart_status.cart_id','carts.id')->whereNull('cart_status.deleted_at')->where('cart_status.status_id',1)->get();
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
    public function balances()
    {
        return $this->belongsToMany(Balance::class, 'store_balances')->withTimestamps()->withPivot(['change','reference_no']);
    }
    public function currentBalance()
    {
        return $this->balances()->whereNull('store_balances.deleted_at')->withTimestamps();
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'store_orders')->withTimestamps();
    }

    public function withdrawals()
    {
        return $this->belongsToMany(Withdrawal::class, 'store_withdrawals')->withTimestamps();
    }

    public function banned()
    {
        return $this->belongsToMany(Banned::class, 'banned_stores')->withTimestamps();
    }

    public function isBanned()
    {
        return $this->banned()->whereNull('banned_stores.deleted_at')->where('name','banned')->count() == 1;
    }
}
