<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    // view masukin ke folder frontend
    public function index()
    {
        return view ('frontend/home');
    }
    public function login()
    {
        return view ('frontend/login');
    }
}
