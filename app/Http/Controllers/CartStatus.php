<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class CartStatus extends Controller
{
    protected $table = 'status';
    use SoftDeletes;
}
