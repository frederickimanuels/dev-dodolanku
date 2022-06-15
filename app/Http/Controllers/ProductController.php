<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\User;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('store.manage');
    }

    public function index()
    {
        return view('store/manage-product');
    }

    public function create()
    {
        return view('store/create-product');
    }
}
