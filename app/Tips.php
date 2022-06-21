<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tips extends Model
{
    protected $table = 'tips';
    use SoftDeletes;
    public function images()
    {
        return $this->belongsToMany(Image::class, 'tips_images');
    }
}
