<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserStatus
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
        if(Auth::check() && Auth::user()->status == "Activated"){
            return $next($request);
        }else{
            Auth::logout();
            return redirect('/login')->with('warning', 'Your Account has been disabled.');
        }
        return redirect('/');
       
    }
}
