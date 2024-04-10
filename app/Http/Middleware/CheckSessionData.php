<?php

namespace App\Http\Middleware;

use Closure;

class CheckSessionData
{
    public function handle($request, Closure $next)
    {
        if (!session()->has('email')) {
            return redirect('/login')->with('error', 'Session data not found');
        }

        return $next($request);
    }
}