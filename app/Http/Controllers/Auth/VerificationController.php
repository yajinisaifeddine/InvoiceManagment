<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
    /**
     * Show the email verification notice.
     */
    public function notice(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
            ? redirect()->route('home') // Redirect if already verified
            : view('auth.verify'); // Show the verification notice view
    }

    /**
     * Mark the authenticated user's email address as verified.
     */
    public function verify(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('home'); // Redirect if already verified
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user())); // Trigger the Verified event
        }

        return redirect()->route('home')->with('verified', true); // Redirect after verification
    }

    /**
     * Resend the email verification notification.
     */
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('home'); // Redirect if already verified
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!'); // Notify the user
    }
}
