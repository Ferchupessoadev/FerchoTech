<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\PasswordReset as IlluminatePasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordReset extends Controller
{
    public function index(Request $request)
    {
        return view('administrator.auth.send-email-password-reset');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users'],
        ], [
            'email.exists' => 'El correo electrónico no está registrado.',
            'email.required' => 'El correo electrónico es obligatorio.',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );


        return $status === Password::ResetLinkSent
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }


    public function edit()
    {
        $token = request()->route()->parameter('token');

        if (is_null($token)) {
            return redirect()->route('password.reset');
        }

        return view('administrator.auth.password-reset', ['token' => $token]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => bcrypt($request->password),
                    'remember_token' => null,
                ])->save();

                event(new IlluminatePasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
