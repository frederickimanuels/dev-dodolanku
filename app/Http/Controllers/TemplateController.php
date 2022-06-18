<?php

namespace App\Http\Controllers;

use App\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('store.manage');
    }

    public function index()
    {
        return view('store/edit-template');
    }

    
    public function list()
    {   
        $templates = Template::get();
        return view('store/template-list',compact('templates'));
    }

    public function store(Request $request)
    {
        // $template = new Template();
        // $template->name = "Fashion Elegant";
        // $template->code = "fashion-1";
        // $template->save();
        // $template->stores()->attach($template->id);
    }
}
