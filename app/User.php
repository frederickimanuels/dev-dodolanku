<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->count() == 1;
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_users');
    }

    public function hasStore()
    {
        return $this->stores()->first();
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_users');
    }

    public function hasCart($store_id)
    { 
        $cart = $this->carts()
                    ->join('cart_status','cart_status.cart_id','=','carts.id')
                    ->join('cart_stores','cart_stores.cart_id','=','carts.id')
                    ->where('status_id',1)
                    ->where('store_id',$store_id)->first();
        if($cart){
            return $cart;
        }else{
            return false;
        }
    }

    public function address()
    {
        return $this->belongsToMany(Address::class, 'address_users');
    }

    public function currentAddress()
    {
        return $this->address()->orderBy('created_at','DESC')->first();
    }

    protected static function booted(){
        
    }
}
