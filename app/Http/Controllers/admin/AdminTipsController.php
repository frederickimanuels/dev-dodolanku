<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Image;
use App\Tips;
use Illuminate\Http\Request;

class AdminTipsController extends Controller
{
    public function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }

    public function index(Request $request){
        $tips = Tips::paginate(10);
        if($request->search){
            $tips = Tips::where('title','like','%'.$request->search.'%' )
            ->orWhere('description','like','%'.$request->search.'%' )
            ->paginate(10);
        }
        return view('admin.tips.index',compact('tips'));
    }

    public function create(Request $request){
        return view('admin.tips.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|string|min:1',
            'description' => 'required|string|min:1',
            'images' => 'required|min:1|max:1',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $tips = new Tips();
        $tips->title = $request->title;
        $tips->description = $request->description;
        $tips->save();

        foreach($request->images as $product_image){
            $imageName = $this->generateRandomString() . time() .'.'.$product_image->getClientOriginalExtension();
            $product_image->move(public_path('images/stored'), $imageName);
            
            $image = new Image();
            $image->filepath = $imageName;
            $image->save();

            $tips->images()->attach($image->id);
        }
        return redirect()->route('admin.tips')->with('status','Tips berhasil ditambahkan');
    }

    public function toggle($tips_id){
        $tips = Tips::where('id',$tips_id)->first();
        $tips->is_show = $tips->is_show == 1 ? 0 : 1;
        $tips->save();
        return redirect()->back()->with('status','Sukses mengganti status tips');
    }

    public function delete($tips_id){
        $tips = Tips::where('id',$tips_id)->first();
        $tips->delete();
        return redirect()->back()->with('status','Sukses menghapus tips');
    }

    public function edit($tips_id,Request $request){
        $tips = Tips::where('id',$tips_id)->first();
        return view('admin.tips.edit',compact('tips'));
    }

    public function update($tips_id,Request $request){
        $this->validate($request, [
            'title' => 'required|string|min:1',
            'description' => 'required|string|min:1',
        ]);
        $tips = Tips::where('id',$tips_id)->first();
        if($request->images){
            $this->validate($request, [
                'images' => 'required|min:1|max:1',
                'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);
            $old_image = $tips->images()->first();
            $tips->images()->detach($old_image->id);
            foreach($request->images as $product_image){
                $imageName = $this->generateRandomString() . time() .'.'.$product_image->getClientOriginalExtension();
                $product_image->move(public_path('images/stored'), $imageName);
                
                $image = new Image();
                $image->filepath = $imageName;
                $image->save();
    
                $tips->images()->attach($image->id);
            }
        }
        $tips->title = $request->title;
        $tips->description = $request->description;
        $tips->save();
        
        return redirect()->back()->with('status','Tips berhasil diubah');
    }
}
