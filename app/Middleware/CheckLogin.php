<?php

namespace App\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('api')->check()) {
             return $next($request);
        }

        return response()->json(['error' => 'User must be in login '], 401);
    }


}
