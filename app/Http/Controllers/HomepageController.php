<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        return view ('homepage/index');
    }

    public function about()
    {
        return view ('homepage/aboutUs');
    }
    public function feature()
    {
        return view ('homepage/Feature');
    }
    public function aboutStore()
    {
        return view ('homepage/aboutStore');
    }
}
