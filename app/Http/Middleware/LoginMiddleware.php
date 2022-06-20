<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::guest()){
            if(Auth::user()->isBanned()){
                auth()->logout();
                session()->invalidate();
                return redirect('/login')->with('error','Akun anda telah diblokir');
            }
            return $next($request);
        }
        return redirect()->route('login');
    }
}
