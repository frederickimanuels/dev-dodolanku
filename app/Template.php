<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'template_stores');
    }
}
