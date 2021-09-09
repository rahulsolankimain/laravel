<?php

namespace App\Http\Middleware;

use Closure;

class AuthKey
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
        //THIS IS FOR tOKEN authentication
        $token = $request->header('APP_KEY');
        if($token != 'ABCDEFG')
        {
            return response()->json(['message' => 'App Key not Found'],401); //401 unauthorized
        }
        return $next($request);
    }
}
