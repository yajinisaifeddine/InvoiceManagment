<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CustomAuth
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated using the CustomAuth guard
        if (!Auth::guard('CustomAuth')->check()) {
            // Store the intended URL for redirect after login
            if (!$request->session()->has('url.intended')) {
                $request->session()->put('url.intended', $request->fullUrl());
            }

            // Redirect to the login page with an error message
            return redirect()->route('login.form')->withErrors(['message' => 'You should sign in first.']);
        }

        // User is authenticated, proceed to the next request
        return $next($request);
    }
}
