<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Templateconfig extends Model
{
    public function stores()
    {
        return $this->belongsToMany(Store::class, 'store_templateconfigs');
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'templateconfig_images');
    }
}
