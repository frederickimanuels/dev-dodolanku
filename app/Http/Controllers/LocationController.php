<?php

namespace App\Http\Controllers;

use App\Province;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getCities(Province $province) 
    {
        $cities = $province->cities()->get();
        return json_encode($cities);
    }
}
