<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
public function handle(Request $request, Closure $next, ...$guards)
{
    $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            $user = Auth::user();
            if ($user->hasRole('SuperAdmin') || $user->hasRole('Admin') || $user->hasRole('Teacher')) {
                return redirect()->route('home');
            } elseif ($user->hasRole('Student')) {
                return redirect()->route('student_dashboard');
            } elseif ($user->hasRole('Alumni')) {
                return redirect()->route('alumni_dashboard');
            } else {
                return redirect()->back();
            }
        }
    }

    return $next($request);
}

}
