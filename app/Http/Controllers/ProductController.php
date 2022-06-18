<?php

namespace App\Http\Controllers;

use App\Category;
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

    public function index(Request $request)
    {
        $store = Auth::user()->hasStore();
        $products = $store->products()->orderBy('created_at', 'desc')->paginate(12);
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
        // $products = $store->products()->get();
        $products = $store->activeProducts();
        if (request()->priceMin != "" or request()->priceMax != "" ) {
            $products = $products->join('variant_products','products.id','=','variant_products.product_id')
                                    ->join('variants','variants.id','=','variant_products.variant_id');
            if(request()->priceMin != ""){
                $products = $products->where('variants.price', '>=', request()->priceMin);
            }
            if(request()->priceMax != ""){
                $products = $products->where('variants.price', '<=', request()->priceMax);
            }
        }
        if (request()->get('keywords') != "") {
            $products = $products->where('products.name', 'LIKE', '%' . request()->get('keywords') . '%');
        }
        $products = $products->orderBy('products.created_at', 'desc')->paginate(20);
        $products->appends(request()->all());
        return view('store/templates/'.$template->code.'/search',compact('store','products'));
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
        return view('store/templates/'.$template->code.'/product-detail',compact('store','popular_products','product','variants'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'product_name' => 'required|min:5|max:60',
            'product_description' => 'required|min:5|max:500',
            'product_about' => 'required|min:10|max:2000',
            'product_min_order' => 'required|integer|min:1',
            'product_price' => 'required|integer|min:100',
            'product_weight' => 'required|integer|min:10',
            'product_stock' => 'required|integer|min:1',
        ]);

        $product = new Product();
        $product->name = $request->product_name;
        $product->description = $request->product_description;
        $product->about = $request->product_about;
        $replace_whitespace_with_dash = preg_replace("/[\s_]/", "-", $product->name);
        $product_slug_not_avail = Product::where('slug',$replace_whitespace_with_dash)->first();
        if(!$product_slug_not_avail){
            $product->slug = $replace_whitespace_with_dash;
        }else{
            $product->slug = $replace_whitespace_with_dash . '-' . (string)time();
        }
        $product->min_order = $request->product_min_order;
        $product->stock = $request->product_stock;
        $product->price = $request->product_price;
        $product->weight = $request->product_weight;
        $product->save();


        $store = Auth::user()->hasStore();
        $store->products()->attach($product->id);

        if($request->product_category){
            $product->category()->attach($request->product_category);
        }
        return redirect()->route('store.dashboard');
    }
}
