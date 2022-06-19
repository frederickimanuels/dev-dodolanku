<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_balances')->withTimestamps()->withPivot('change');
    }
}
