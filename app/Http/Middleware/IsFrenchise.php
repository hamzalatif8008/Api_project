<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Closure;

class IsFrenchise
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
        if (Auth::guard('frenchise')->check()) {
            if (Auth::guard('frenchise')->user()){
                return $next($request);
            }
        }
        return redirect()->route('frenchise-frenchise-login')->with('unsuccess',"You don't have access to that section");
    }
}
