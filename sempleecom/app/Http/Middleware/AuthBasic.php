<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;

class AuthBasic
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
        //This is for Basic auth
        if(Auth::onceBasic())
        {
            return response()->json(['message' => 'Auth Failed'],401);
        }
            return $next($request);
    }
}
