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

    public function resetText(Request $request)
    {
        $store = Auth::user()->stores()->first();
        $templateconfigs = $store->templateconfigs()->where('type','store_text')->get();
        if(count($templateconfigs) > 0){
            foreach($templateconfigs as $templateconfig){
                $templateconfig->stores()->detach($store->id);
            }
        }
        return redirect()->back()->with('status','Sukses menghapus warna text');
    }
    public function resetBg(Request $request)
    {
        $store = Auth::user()->stores()->first();
        $templateconfigs = $store->templateconfigs()->where('type','store_bg')->get();
        if(count($templateconfigs) > 0){
            foreach($templateconfigs as $templateconfig){
                $templateconfig->stores()->detach($store->id);
            }
        }
        return redirect()->back()->with('status','Sukses menghapus warna background');
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
            return redirect()->back()->with('status','Sukses mengganti logo');
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
            return redirect()->back()->with('status','Sukses mengganti banner');
        }else if($request->input_type == 'store_search'){
            $this->validate($request, [
                'input_type' => 'required',
                'images' => 'required|min:1|max:1',
                'images.*' => 'image|mimes:jpeg,png,jpg,svg|max:10000',
            ]);
            $templateconfigs = $store->templateconfigs()->where('type','store_search')->get();
            if(count($templateconfigs) > 0){
                foreach($templateconfigs as $templateconfig){
                    $templateconfig->stores()->detach($store->id);
                }
            }
            foreach($request->images as $img){
                $imageName = time().'.'.$img->getClientOriginalExtension();
                $img->move(public_path('images/stored'), $imageName);

                $image = new Image();
                $image->filepath = $imageName;
                $image->save();

                $templateconfig = new Templateconfig();
                $templateconfig->type = 'store_search';
                $templateconfig->save();
                $templateconfig->images()->attach($image->id);
                $templateconfig->stores()->attach($store->id);
            }
            return redirect()->back()->with('status','Sukses mengganti banner');
        }else if($request->input_type == 'store_text'){
            $this->validate($request, [
                'input_type' => 'required',
                'color' => 'required|min:4|max:4',
                'color.*' => 'string|min:7|max:7',
            ]);
            $templateconfigs = $store->templateconfigs()->where('type','store_text')->get();
            if(count($templateconfigs) > 0){
                foreach($templateconfigs as $templateconfig){
                    $templateconfig->stores()->detach($store->id);
                }
            }
            foreach($request->color as $clr){
                $templateconfig = new Templateconfig();
                $templateconfig->type = 'store_text';
                $templateconfig->extra = $clr;
                $templateconfig->save();
                $templateconfig->stores()->attach($store->id);
            }
            return redirect()->back()->with('status','Sukses mengganti warna text');
        }else if($request->input_type == 'store_bg'){
            $this->validate($request, [
                'input_type' => 'required',
                'bg_color' => 'required|min:4|max:4',
                'bg_color.*' => 'string|min:7|max:7',
            ]);
            $templateconfigs = $store->templateconfigs()->where('type','store_bg')->get();
            if(count($templateconfigs) > 0){
                foreach($templateconfigs as $templateconfig){
                    $templateconfig->stores()->detach($store->id);
                }
            }
            foreach($request->bg_color as $clr){
                $templateconfig = new Templateconfig();
                $templateconfig->type = 'store_bg';
                $templateconfig->extra = $clr;
                $templateconfig->save();
                $templateconfig->stores()->attach($store->id);
            }
            return redirect()->back()->with('status','Sukses mengganti warna background');
        }
    }
}
