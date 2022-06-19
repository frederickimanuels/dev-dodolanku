<?php

namespace App\Http\Controllers;

use App\Address;
use App\Province;
use App\Store;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('store.manage')->except('create','store','show');
    }

    public function index(Request $request)
    {
        if($request->user()->hasStore()){
            return redirect()->route('store.dashboard');
        }else{
            return redirect()->route('store.create');
        }
    }

    public function dashboard(Request $request)
    {
        if(!$request->user()->hasStore()){
            return redirect()->route('store.create');
        }else{
            $store = Auth::user()->hasStore();
            return view ('store/dashboard',compact('store'));
        }
    }
    
    
    public function createProduct()
    {
        return view('store/createProduct');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->hasRole('admin')) {
            return redirect()->route('base');
        }
        if($request->user()->hasStore()){
            return redirect()->route('store.dashboard');
        }
        $provinces = Province::all();
        return view('store/create',compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'store_name' => 'required|max:60',
            'store_slug' => 'required|alpha_dash|unique:stores,slug|max:60',
            'store_address' => 'required|max:255',
            'province' => 'required',
            'city' => 'required|exists:cities,id',
            'terms' => 'accepted',
        ]);
        $store = new Store();
        $store->name = $request->store_name;
        $store->slug = $request->store_slug;
        $store->save();

        $address = new Address();
        $address->description = $request->store_address;
        $address->province_id = $request->province;
        $address->city_id = $request->city;
        $address->save();

        $store->address()->attach($address->id);

        $user = User::find(Auth::user()->id);
        $user->stores()->attach($store->id);
        $store->template()->attach(1);

        return redirect()->route('store.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($slug)
    {
        $store = Store::where('slug',$slug)->first();
        if(!$store){
            return redirect()->route('notfound');
        }else{
            $template = $store->template()->first();
            $popular_products = $store->products()->take(8)->get();
            return view('store/templates/'.$template->code.'/homepage',compact('store','popular_products'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $store = Auth::user()->stores()->first();
        return view('store/edit',compact('store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $this->validate($request, [
            'store_name' => 'required|max:60',
            'province' => 'required',
            'city' => 'required|exists:cities,id',
            'store_address' => 'required|max:255',
        ]);

        $store = Auth::user()->hasStore();
        $store->name = $request->store_name;
        $store->save();
        if($store->address()->first()){
            $store->address()->updateExistingPivot($store->address()->first()->id, ['deleted_at' => Carbon::now()]);
        }
        $address = new Address();
        $address->description = $request->store_address;
        $address->province_id = $request->province;
        $address->city_id = $request->city;
        $address->save();
        $store->address()->attach($address->id);

        return redirect()->route('store.dashboard');
    }
}
