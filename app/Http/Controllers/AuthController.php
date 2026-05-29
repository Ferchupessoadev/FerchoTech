<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        if(!Auth::check())
            return view('administrator.auth.login');
        else
            return redirect(route('dashboard'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'El correo es obligatorio.',
            'email.email' => 'Formato de correo no válido.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return redirect()->back()
            ->withErrors([
                'email' => 'Las credenciales no coinciden con nuestros registros.',
            ])
            ->withInput($request->only('email'));
    }
}
