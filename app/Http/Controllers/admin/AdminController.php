<?php

namespace App\Http\Controllers\admin;

use App\Balance;
use App\Http\Controllers\Controller;
use App\Store;
use App\User;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){
        return view('admin.dashboard');
    }

    public function storeList(){
        $stores = Store::paginate(10);
        return view('admin.store-list',compact('stores'));
    }

    public function userList(Request $request){
        $users = [];
        if($request->user_search){
            $users = User::Where('name','like','%'.$request->user_search.'%' )
                        ->orWhere('email','like','%'.$request->user_search.'%' )
                        ->get();
        }
        return view('admin.user-list',compact('users'));
    }

    public function withdrawalList(Request $request){
        $withdrawals = Withdrawal::whereNull('is_accept')->paginate(10);
        return view('admin.withdrawal-list',compact('withdrawals'));
    }

    public function withdrawalAccept($withdrawal_id, Request $request){
        $withdrawal = Withdrawal::where('id',$withdrawal_id)->first();
        $withdrawal->is_accept = 1;
        $withdrawal->save();
        return redirect()->back()->with('status','Sukses menerima permintaan withdraw');
    }

    public function withdrawalReject($withdrawal_id, Request $request){
        $withdrawal = Withdrawal::where('id',$withdrawal_id)->first();
        $withdrawal->is_accept = 0;
        $withdrawal->save();

        $store = $withdrawal->stores()->first();
        $store_balance = $store->currentBalance()->first();

        $balance = new Balance();
        $balance->value =  $withdrawal->amount + $store_balance->value;
        $balance->save();
        
        $store_balance->stores()->updateExistingPivot($store->id, ['deleted_at' => Carbon::now()]);
        $balance->stores()->attach($store->id, ['change'=> $withdrawal->amount ,'reference_no' => $withdrawal->reference_no] );
        return redirect()->back()->with('status','Sukses menolak permintaan withdraw');
    }
}
