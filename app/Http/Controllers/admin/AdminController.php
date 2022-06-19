<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Store;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){
        return view('admin.dashboard');
    }

    public function storeList(){
        $stores = Store::get();
        return view('admin.store-list',compact('stores'));
    }

    public function storeEdit($store_slug){
        return view('admin.dashboard');
    }
    public function storeDelete($store_slug){
        return view('admin.dashboard');
    }
}
