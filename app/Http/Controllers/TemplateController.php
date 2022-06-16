<?php

namespace App\Http\Controllers;

use App\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
