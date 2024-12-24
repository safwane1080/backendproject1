<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; 

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            Log::info('User logged in: ' . Auth::user()->email);
        } else {
            Log::info('No user logged in.');
        }

        if (!Auth::check()) {
            return redirect('/login')->with('error', 'You must be logged in to access this page.');
        }

        if (Auth::user()->usertype !== 'admin') {
            Log::warning('Access denied for user: ' . Auth::user()->email);
            return redirect('/')->with('error', 'Access denied: Admins only.');
        }

        return $next($request);
    }
}
