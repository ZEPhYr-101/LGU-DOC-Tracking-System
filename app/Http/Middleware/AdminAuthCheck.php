<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('admin')->check()) {
            // User is authenticated

        } else {
            // User is not authenticated, redirect to login view with an error message
            return redirect()->route('admin.login')->with('error', 'You must log in first.');
        }
        // User is authenticated and has a registered email, proceed with the request
        return $next($request);
    }
}
