<?php

namespace App\Http\Controllers\Auth;

use Log;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;

class LoginController extends Controller
{
    //
    public function index()
    {
        return View('pages.login');
    }
    public function login(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8',
            ]);

            // Rate limiter key (include the guard name for clarity)
            $key = 'login_attempts_' . $request->email . '_CustomAuth';

            // Check if there are too many login attempts
            if (RateLimiter::tooManyAttempts($key, 3)) {
                $seconds = RateLimiter::availableIn($key);
                return back()->with([
                    'error' => "Too many login attempts. Please try again in <span id='countdown' data-seconds='{$seconds}'></span> seconds."
                ]);
            }

            // Attempt to log in using the CustomAuth guard
            if (Auth::guard('CustomAuth')->attempt(['email' => $request->email, 'password' => $request->password])) {
                // Clear the rate limiter on successful login
                RateLimiter::clear($key);

                // Redirect to the intended page
                return redirect()->intended('/')->with('success', 'Login successful!');
            }

            // Increment the rate limiter on failed login
            RateLimiter::hit($key, 300); // 300 seconds (5 minutes)

            // Return with error message
            return back()->with([
                'error' => 'Email or Password are incorrect',
            ]);
        } catch (Exception $e) {


            // Return with error message
            return back()->with([
                'error' => 'An error occurred' . $e->getMessage(),
            ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('CustomAuth')->logout();
        return redirect()->intended('/')->with('success', 'logout successful!');
    }
}
