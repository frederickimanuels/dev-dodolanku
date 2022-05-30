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
        return view ('homepage/about');
    }
    public function landingPage()
    {
        return view ('homepage/landingPage');
    }
    public function aboutUs()
    {
        return view ('homepage/aboutUs');
    }
}
