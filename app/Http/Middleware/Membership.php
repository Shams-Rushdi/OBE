<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use carbon\carbon;

class Membership
{

    public function handle(Request $request, Closure $next)
    {

    $today = now();
        
    if (Auth::user()->expire < $today) {
       
        return redirect()->route('expire');
    }

        return $next($request);
    }
}
