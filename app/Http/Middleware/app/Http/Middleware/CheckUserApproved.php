<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserApproved
{
    /**
     * Check if the authenticated user is approved
     */
    public function handle($request, Closure $next)
    {
        // Check if user is logged in AND not approved
        if (Auth::check() && !Auth::user()->is_approved) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your account is pending admin approval.');
        }

        return $next($request);
    }
}