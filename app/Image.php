<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_images');
    }

    public function templateconfigs()
    {
        return $this->belongsToMany(Templateconfig::class, 'templateconfig_images');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_images');
    }

    public function tips()
    {
        return $this->belongsToMany(Tips::class, 'tips_images');
    }
}
