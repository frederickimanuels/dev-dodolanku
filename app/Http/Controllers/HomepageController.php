<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail; 
use App\Http\Controllers\Controller;
use DB; 
use Carbon\Carbon; 
use Hash;
use Illuminate\Support\Str;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        return view ('homepage/index');
    }

    public function about()
    {
        return view ('homepage/aboutUs');
    }
    public function feature()
    {
        return view ('homepage/Feature');
    }
    public function null()
    {
        return view ('homepage/pageNull');
    }
    public function emailUs(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'message' => 'required|string',
        ]);
        
        $email = $request->email;
        $msg = $request->message;

        Mail::send('mail.help', ['email' => $email,'msg' => $msg], function($message) use($request){
            $message->to('dodolanku.id@outlook.com');
            $message->subject('User Help Dodolanku.id');
        });
        
        return back()->with('status','Berhasil mengirimkan pesan');
    }
}
