<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banned extends Model
{
    protected $table = 'banned';
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'banned_stores')->withTimestamps();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'banned_stores')->withTimestamps();
    }
}
