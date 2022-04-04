<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'user_roles';
    public function user() {
        return $this->belongsTo(UserRole::class);
    }
    public function role() {
        return $this->belongsTo(Role::class);
    }
}
