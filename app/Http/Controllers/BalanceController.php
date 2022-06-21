<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Withdrawal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    public function index(Request $request){
        $store = Auth::user()->hasStore();
        $balances = $store->balances()->orderBy('created_at','DESC')->paginate(10);
        return view('store.balance',compact('store','balances'));
    }

    public function withdraw(Request $request){
        $this->validate($request, [
            'withdrawal_amount' => 'required|integer|min:10000',
        ]);
        $withdrawal = new Withdrawal();
        $withdrawal->amount = $request->withdrawal_amount;
        $withdrawal->reference_no = (string)time() . 'W' . Auth::user()->id;
        $withdrawal->save();
        
        $store = Auth::user()->hasStore();
        $store_balance = $store->currentBalance()->first();

        $balance = new Balance();
        $balance->value = 0;
        $balance->save();
        
        $store_balance->stores()->updateExistingPivot($store->id, ['deleted_at' => Carbon::now()]);
        $balance->withdrawals()->attach($withdrawal->id);
        $balance->stores()->attach($store->id, ['change'=> -$withdrawal->amount, 'reference_no' => $withdrawal->reference_no ] );
        $withdrawal->stores()->attach($store->id);
        
        return back()->with('status','Sukses melakukan permintaan tarik saldo');
    }
}
