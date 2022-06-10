<?php

namespace App\Http\Controllers;

use App\Province;
use App\Store;
use App\User;
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
        $this->middleware('auth');
    }

    public function index()
    {
        return view ('store/dashboard');
    }

    public function StoreTemplates()
    {
        // dd("test");
        return view('store/template-list');
    }
    public function list()
    {
        return view('store/listProduct');
    }
    public function listOrder()
    {
        return view('store/listOrder');
    }
    public function chats()
    {
        return view('store/chats');
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
            'store_name' => 'required|unique:stores,name|max:60',
            'store_slug' => 'required|unique:stores,slug|max:60',
            'store_address' => 'required|max:255',
            'province' => 'required',
            'city' => 'required|exists:cities,id',
            'terms' => 'accepted',
        ]);
        $store = new Store();
        $store->name = $request->store_name;
        $store->slug = $request->store_slug;
        $store->save();

        $user = User::find(Auth::user()->id);
        $user->stores()->attach($store->id);

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
        dd($store);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
