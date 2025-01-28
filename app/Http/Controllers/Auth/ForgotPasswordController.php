<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    // Show the password reset request form
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Send the password reset link to the user's email
    public function sendResetLinkEmail(Request $request)
    {
        // Validate the email input
        $request->validate(['email' => 'required|email']);

        // Send the password reset link
        $response = Password::sendResetLink(
            $request->only('email')
        );

        // Return response based on success or failure
        if ($response == Password::RESET_LINK_SENT) {
            return back()->with('status', 'We have emailed your password reset link!');
        }

        return back()->withErrors(['email' => 'We could not find a user with that email address.']);
    }
}
