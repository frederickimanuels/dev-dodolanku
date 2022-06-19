<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    public function balances()
    {
        return $this->belongsToMany(Balance::class, 'withdrawal_balances')->withTimestamps();
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_withdrawals')->withTimestamps();
    }
}
