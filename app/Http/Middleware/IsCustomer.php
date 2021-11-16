<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  

class IsCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    { 
        //echo "yesss"; exit;

        if (Auth::guard('customer')->check()) {
            if (Auth::guard('customer')->user()){
                return $next($request);
            }
        }
      return redirect()->route('customer-login')->with('unsuccess',"You don't have access to that section");
       //return redirect()->back();
    } 
}
