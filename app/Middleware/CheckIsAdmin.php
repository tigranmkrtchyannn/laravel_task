<?php

namespace App\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user('api');


        if ($user && $user->role == 'admin') {
            return $next($request);
        }
        return response()->json("You must be in admin to do that option");
    }
}
