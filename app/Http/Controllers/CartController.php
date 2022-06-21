<?php

namespace App\Http\Controllers;

use App\Store;
use App\Cart;
use App\City;
use App\Order;
use App\Product;
use App\Province;
use App\Status;
use App\Variant;
use Carbon\Carbon;
use Dotenv\Result\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $carts = Auth::user()->carts();
        $carts = $carts->join('cart_status','cart_status.cart_id','=','carts.id')
            ->where('status_id','=','1')
            ->whereNull('cart_status.deleted_at')
            ->orderBy('cart_status.created_at','DESC')
            ->get();
        return view('cart/cart-list',compact('carts'));
    }

    public function show($slug)
    {
        $store = Store::where('slug',$slug)->first();
        $cart = Auth::user()->hasCart($store->id);
        if($cart){
            $products = $cart->products()->get();
            if(!$products){
                $products = [];
            }
            $address = Auth::user()->address()->first();
            if($address){
                $address->province = Province::where('id',$address->province_id)->first()->name;
                $address->city = City::where('id',$address->city_id)->first()->name;
            }
            return view('cart/cart',compact('store','cart','products','address'));
        }else{
            $address = Auth::user()->address()->first();
            $products = [];
            if($address){
                $address->province = Province::where('id',$address->province_id)->first()->name;
                $address->city = City::where('id',$address->city_id)->first()->name;
            }
            return view('cart/cart',compact('store','cart','products','address'));
        }
    }

    public function create($slug)
    {

    }
    public function buyNow(Request $request){
        $this->validate($request, [
            'store_id' => 'required|exists:stores,id',
            'product_id' => 'required|exists:products,id',
            'product_quantity' => 'required|integer|min:1',
        ]);
        $product = Product::where('id',$request->product_id)->first();
        if($product->is_active == 0){
            return redirect()->back()->with('error','Gagal menambahkan produk ke keranjang, produk tidak tersedia');
        }
        $store = Store::find($request->store_id);
        if(Auth::user()->hasStore()->id = $store->id){
            return redirect()->back()->with('error','Penjual tidak bisa membeli produk miliknya sendiri');
        }
        $exist_cart = Auth::user()->hasCart($store->id);
        if($exist_cart){
            // dd("aa");
            $cart = $exist_cart;
            $cart_product = $cart->hasProduct($cart->id,$request->product_id);
            if($cart_product){
                $success = $cart->changeProductCount($cart_product,(int)$request->product_quantity);
                if($success){
                    return redirect()->route('cart.show',$store->slug);
                }else{
                    return redirect()->back()->with('checkout','Gagal menambahkan produk, stok produk tersisa '.$product->stock.' dan sudah ada di keranjang belanjamu');
                }
            }else{
                $cart->products()->attach($request->product_id, ['count'=> $request->product_quantity ]);
            }
            return redirect()->route('cart.show',$store->slug);
        }else{
            $cart = new Cart();
            $cart->save();

            $cart->status()->attach(1);
            $cart->users()->attach(Auth::user()->id);
            $cart->stores()->attach($store->id);
            $cart->products()->attach($request->product_id, ['count'=> $request->product_quantity ]);
        }
        return redirect()->route('cart.show',$store->slug);
    }

    public function pay(Request $request){
        $this->validate($request, [
            'cart_id' => 'required|exists:carts,id',
            'product_id.*' => 'required|exists:products,id',
            'product_count.*' => 'required|integer|min:1',
            'address_id' => 'required|exists:addresses,id',
            'shipping_fee' => 'required|integer',
        ]);
        $cart = Cart::where('id',$request->cart_id)->first();
        $products = [];
        $i = 0;
        $store = null;
        foreach($request->product_id as $p){
            $product = $cart->products()->where('id',$p)->first();
            if($product->stock < $request->product_count[$i]){
                return redirect()->back()->with('error','Pembelian melebihi stok produk yang tersedia');
            }else{
                $products[] = $product;
            }
            $i+=1;
            $store = $product->stores()->first();
        }
        $i = 0;
        $total_amount = 0;
        foreach($products as $p){
            $p->pivot->count = $request->product_count[$i];
            $p->pivot->save();
            $p->stock = $p->stock - $request->product_count[$i];
            if($p->stock == 0){
                $p->is_active = 0;
            }
            $p->save();
            $total_amount = $total_amount + ($p->pivot->count * $p->price);
            $i+=1;
        }
        $order = new Order();
        $order->reference_no = (string)time() . 'C' . $cart->id . 'U' . Auth::user()->id;
        $order->total_amount = $total_amount;
        $order->shipping_fee = $request->shipping_fee;
        $order->courier = "JNE";
        $order->save();

        
        $cart->status()->updateExistingPivot(1, ['deleted_at' => Carbon::now()]);
        $cart->status()->attach(2);
        $cart->orders()->attach($order->id);
        $cart->address()->attach($request->address_id);
        $order->stores()->attach($store->id);
        return redirect()->route('user.order');
    }
    public function listOrder()
    {
        $carts = Auth::user()->hasStore()->carts();
        $carts = $carts->join('cart_status','cart_status.cart_id','=','carts.id')
                    ->where('status_id','<>','1')
                    ->whereNull('cart_status.deleted_at')
                    ->orderBy('cart_status.created_at','DESC')
                    ->paginate(10);
        return view('store/order-list',compact('carts'));
    }

    public function postTracking(Request $request){
        $cart = Cart::where('id',$request->cart_id)->first();
        $cart->status()->updateExistingPivot(2, ['deleted_at' => Carbon::now()]);
        $cart->status()->attach(4);
        $order = $cart->orders()->first();
        $order->couriertracking = $request->couriertracking;
        $order->save();
        $response = array(
            'status' => 'success',
         );
        return response()->json($response);
    }

    public function removeProduct($cart_id, $product_id){
        $cart = Cart::where('id',$cart_id)->first();
        $cart->products()->detach($product_id);
        if($cart->products()->count() == 0){
            Auth::user()->carts()->detach($cart->id);
            $cart->delete();
        }
        return redirect()->back();
    }
}
