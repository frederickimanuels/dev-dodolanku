<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;
use Illuminate\Support\Facades\Auth;
use App\Product;
use Illuminate\Http\Request;
use App\Store;
use App\User;
use App\Variant;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    
    public function __construct()
    {
        // $this->middleware('auth');
        $this->middleware('store.manage')->except('show','list');
    }

    public function index(Request $request)
    {
        $store = Auth::user()->hasStore();
        $products = $store->products()->orderBy('created_at', 'desc')->paginate(10);
        return view('store/manage-product',compact('products','store'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('store/create-product',compact('categories'));
    }

    public function list($store_slug, Request $request)
    {
        $store = Store::where('slug',$store_slug)->first();
        $template = $store->template()->first();
        if(!$store){
            return redirect()->route('base');
        }
        $products = $store->products();
        $categories = $store->products()->join('category_products','category_products.product_id','products.id')
                        ->join('categories','category_products.category_id','categories.id')
                        ->get(['categories.id','categories.name']);

        if (request()->cat){
            $products = $products->join('category_products','category_products.product_id','products.id');
            if(count(request()->cat) == 1){
                $products = $products->where('category_products.category_id',request()->cat[0]);
            }else{
                $i = 0;
                $products = $products->orWhere('category_products.category_id',request()->cat[0]);
                foreach(request()->cat as $req_cat){
                    if($i > 0){
                        $products = $products->orWhere('category_products.category_id',$req_cat);
                    }
                    $i+=1;
                }
            }
        }
        if(request()->price_range){
            if(request()->price_range == 'below-300'){
                $products = $products->where('price', '<', 300000);
                request()->harga_max = 299999;
            }elseif(request()->price_range == 'between-300-1000'){
                $products = $products->where('price', '>=', 300000);
                $products = $products->where('price', '<=', 1000000);
                request()->harga_min = 300000;
                request()->harga_max = 1000000;
            }elseif(request()->price_range == 'above-1000'){
                $products = $products->where('price', '>', 1000000);
                request()->harga_min = 1000000;
            }
        }else{
            if (request()->harga_min != "") {
                $products = $products->where('price', '>=', request()->harga_min);
            }
            if (request()->harga_max != "") {
                $products = $products->where('price', '<=', request()->harga_max);
            }
        }

        if (request()->keywords != "") {
            $products = $products->where('products.name', 'LIKE', '%' . request()->get('keywords') . '%');
        }
        if (request()->priceMin != "" or request()->priceMax != "" ) {
            if(request()->priceMin != ""){
                $products = $products->where('price', '>=', request()->priceMin);
            }
            if(request()->priceMax != ""){
                $products = $products->where('price', '<=', request()->priceMax);
            }
        }
        if (request()->order != "") {
            if (request()->order == "lowtohigh") {
                $products = $products->orderBy('price', 'asc');
            } else {
                $products = $products->orderBy('price', 'desc');
            }
        } else {
            $products = $products->orderBy('products.created_at', 'desc');
        }
        $products = $products->paginate(20);
        $products->appends(request()->all());
        return view('store/templates/'.$template->code.'/search',compact('store','products','categories'));
    }

    public function show($store_slug, $product_slug)
    {
        $store = Store::where('slug',$store_slug)->first();
        if(!$store){
            return redirect()->route('base');
        }
        $product = $store->products()->where('slug',$product_slug)->orderBy('id','DESC')->first();
        if(!$product){
            return redirect()->route('store.show',$store_slug);
        }
        $template = $store->template()->first();
        $popular_products = $store->products()->take(8)->get();
        return view('store/templates/'.$template->code.'/product-detail',compact('store','popular_products','product'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required|min:5|max:60',
            'product_category' => 'required|exists:categories,id',
            'product_description' => 'required|min:5|max:500',
            'product_about' => 'required|min:10|max:2000',
            'product_price' => 'required|integer|min:100',
            'product_weight' => 'required|integer|min:10',
            'product_stock' => 'required|integer|min:1',
            'images' => 'required|min:3|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $product = new Product();
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->about = $request->product_about;
        $replace_whitespace_with_dash = preg_replace("/[\s_]/", "-", $product->name);
        $replace_whitespace_with_dash = preg_replace("/[^A-Za-z0-9 ]/", "-", $replace_whitespace_with_dash);
        $product_slug_not_avail = Product::where('slug',$replace_whitespace_with_dash)->first();
        if(!$product_slug_not_avail){
            $product->slug = $replace_whitespace_with_dash;
        }else{
            $product->slug = $replace_whitespace_with_dash . '-' . (string)time();
        }
        $product->stock = $request->product_stock;
        $product->price = $request->product_price;
        $product->weight = $request->product_weight;
        $product->save();

        foreach($request->images as $product_image){
            $imageName = $this->generateRandomString() . time() .'.'.$product_image->getClientOriginalExtension();
            $product_image->move(public_path('images/stored'), $imageName);
            
            $image = new Image();
            $image->filepath = $imageName;
            $image->save();

            $product->images()->attach($image->id);
        }

        $store = Auth::user()->hasStore();
        $store->products()->attach($product->id);
        $product->category()->attach($request->product_category);
        return redirect()->route('store.product.manage');
    }

    public function edit($product_slug){
        $categories = Category::get();
        $store = Auth::user()->hasStore();
        $product = $store->products()->where('slug',$product_slug)->first();
        // dd($product->images()->get()[2]->id);
        return view('store/edit-product',compact('categories','product'));
    }

    public function update($product_slug, Request $request){
        $product = Product::where('slug',$product_slug)->first();
        // $old_images_count = $old_product->images()->count();
        
        $this->validate($request, [
            'product_name' => 'required|min:5|max:60',
            'product_category' => 'required|exists:categories,id',
            'product_description' => 'required|min:5|max:500',
            'product_about' => 'required|min:10|max:2000',
            'product_price' => 'required|integer|min:100',
            'product_weight' => 'required|integer|min:10',
            'product_stock' => 'required|integer|min:0',
        ]);

        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->about = $request->product_about;
        $product->stock = $request->product_stock;
        $product->price = $request->product_price;
        $product->weight = $request->product_weight;

        if($request->product_stock == 0){
            $product->is_active = 0;
        }

        if($product->category()->first()){
            $product->category()->detach($product->category()->first()->id);
        }
        $product->category()->attach($request->product_category);
        $product->save();

        return redirect()->back()->with('status','Sukses memperbaharui produk');
        // if($old_images_count == count($request->old)){
        //     $this->validate($request, [
        //         'product_name' => 'required|min:5|max:60',
        //         'product_description' => 'required|min:5|max:500',
        //         'product_about' => 'required|min:10|max:2000',
        //         'product_price' => 'required|integer|min:100',
        //         'product_weight' => 'required|integer|min:10',
        //         'product_stock' => 'required|integer|min:1',
        //     ]);
        // }else{
        //     // $new = 0;
        //     // $i = 0;
        //     // foreach($request->photos as $new_image_input){
        //     //     if($request->photos != '') $new+=1;
        //     //     $i+=1;
        //     // }
        //     // foreach($old_product->images()->get() as $old_product_images){
        //     //     $old_product_images->products()->detach($old_product->id);
        //     // }
        //     // foreach($request->old as $old_image_input){
        //     //     $old_image_input_id = substr($old_image_input,4);
        //     //     $old_image_not_deleted = Image::where('id',$old_image_input_id)->first();
        //     //     $old_image_not_deleted->products()->attach($old_product->id);
        //     // }
        // }
    }
    
    public function delete($product_slug){
        $product = Auth::user()->hasStore()->products()->where('slug',$product_slug)->first();
        $carts = $product->carts()->join('cart_status','cart_status.cart_id','=','carts.id')->where('status_id',1)->whereNull('cart_status.deleted_at')->get();
        foreach($carts as $cart){
            $cart->products()->detach($product->id);
        }
        
        $product->stores()->updateExistingPivot(Auth::user()->hasStore()->id, ['deleted_at' => Carbon::now()]);
        return redirect()->back()->with('status','Sukses menghapus produk');
    }
}
