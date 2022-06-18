<?php

namespace App\Http\Controllers;

use App\Image;
use App\Template;
use App\Templateconfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('store.manage');
    }

    public function index()
    {
        $store = Auth::user()->hasStore();
        return view('store/edit-template',compact('store'));
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

    public function update(Request $request)
    {
        $this->validate($request, [
            'input_type' => 'required',
        ]);
        $store = Auth::user()->stores()->first();
        if($request->input_type == 'store_logo'){
            $this->validate($request, [
                'input_type' => 'required',
                'images' => 'required|min:1|max:1',
                'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->images[0]->getClientOriginalExtension();
            $request->images[0]->move(public_path('images/stored'), $imageName);
            
            $image = new Image();
            $image->filepath = $imageName;
            $image->save();

            $templateconfig = $store->templateconfigs()->where('type','store_logo')->first();
            if($templateconfig){
                $old_image = $templateconfig->images()->first();
                $templateconfig->images()->detach($old_image->id);
                $templateconfig->images()->attach($image->id);
            }else{
                $templateconfig = new Templateconfig();
                $templateconfig->type = 'store_logo';
                $templateconfig->save();
                $templateconfig->images()->attach($image->id);
                $templateconfig->stores()->attach($store->id);
            }
            return redirect()->back();
        }else if($request->input_type == 'store_banner'){
            $this->validate($request, [
                'input_type' => 'required',
                'images' => 'required|min:1|max:5',
                'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:10000',
            ]);
            $templateconfigs = $store->templateconfigs()->where('type','store_banner')->get();
            if(count($templateconfigs) > 0){
                foreach($templateconfigs as $templateconfig){
                    $templateconfig->stores()->detach($store->id);
                }
            }
            $i = 0;
            foreach($request->images as $img){
                $imageName = time().'.'.$img->getClientOriginalExtension();
                $img->move(public_path('images/stored'), $imageName);

                $image = new Image();
                $image->filepath = $imageName;
                $image->save();

                $templateconfig = new Templateconfig();
                $templateconfig->type = 'store_banner';
                $templateconfig->extra = $i;
                $templateconfig->save();
                $templateconfig->images()->attach($image->id);
                $templateconfig->stores()->attach($store->id);
                $i+=1;
            }
            return redirect()->back();
        }
    }
}
