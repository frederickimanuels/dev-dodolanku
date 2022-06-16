<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Product;
use Illuminate\Http\Request;
use App\Store;
use App\User;
use App\Variant;

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

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'product_name' => 'required|min:5|max:60',
            'product_description' => 'required|min:5|max:2000',
            'product_min_order' => 'required|integer|min:1',
            'product_price' => 'required|integer|min:100',
            'product_weight' => 'required|integer|min:10',
            'product_stock' => 'required|integer|min:1',
        ]);
        if($request->variant_active != "on"){
            $product = new Product();
            $product->name = $request->product_name;
            $product->description = $request->product_description;
            $replace_whitespace_with_dash = preg_replace("/[\s_]/", "-", $product->name);
            $product_slug_not_avail = Product::where('slug',$replace_whitespace_with_dash)->first();
            if(!$product_slug_not_avail){
                $product->slug = $replace_whitespace_with_dash;
            }else{
                $product->slug = $replace_whitespace_with_dash . '-' . (string)time();
            }
            $product->min_order = $request->product_min_order;
            $product->save();
            
            $variant = new Variant();
            $variant->type = 'default';
            $variant->name = 'default';
            $variant->price = $request->product_price;
            $variant->weight = $request->product_weight;
            $variant->stock = $request->product_stock;
            $variant->is_active = 1;
            $variant->save();

            $product->variants()->attach($variant->id);

            $store = Auth::user()->hasStore();
            $store->products()->attach($product->id);
        }
        return redirect()->route('store.dashboard');
    }
}
