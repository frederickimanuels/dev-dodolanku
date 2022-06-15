<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index(Request $request)
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
