<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ResetPasswordController extends Controller
{
    // Show the form to reset the password
    public function showResetForm($token)
    {
        return view('auth.passwords.reset')->with('token', $token);
    }

    // Reset the user's password
    public function reset(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);

        // Attempt to reset the password
        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password)
                ])->save();

                // Fire the password reset event
                event(new PasswordReset($user));
            }
        );

        // Return response based on success or failure
        if ($response == Password::PASSWORD_RESET) {
            return redirect('/login')->with('status', 'Your password has been reset!');
        }

        return back()->withErrors(['email' => 'Failed to reset password. Please try again.']);
    }
}
