<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthBasic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // username = apiuser
        // password = passapiuser123
        if($request->header('Authorization') == 'Basic YXBpdXNlcjpwYXNzYXBpdXNlcjEyMw=='){
            return $next($request);
        }
        else{
            return response()->json(['message'=>'Please provide valid authentication'],401);
        }
    }
}
