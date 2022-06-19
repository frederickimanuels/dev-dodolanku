<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_balances')->withTimestamps()->withPivot(['change','reference_no']);
    }

    public function withdrawals()
    {
        return $this->belongsToMany(Withdrawal::class, 'withdrawal_balances')->withTimestamps();
    }
}
