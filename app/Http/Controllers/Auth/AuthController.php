<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAuthEmailRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;


class AuthController extends Controller
{

    public function index()
    {
        if(!Auth::check())
            return view('auth.login');
        else
            return redirect(route('dashboard'));
    }

    public function store(LoginAuthEmailRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('home'));
        }

        return redirect()->back()
            ->withErrors([
                'email' => 'Las credenciales no coinciden con nuestros registros.',
            ])
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home'));

    }


    public function redirectToProvider($provider)
    {
        if (!config()->has("services.{$provider}")) {
            abort(404);
        }
        return Socialite::driver($provider)->redirect();
    }


    public function handleProviderCallback($provider) {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors(['msg' => 'No pudimos autenticarte con ' . $provider]);
        }

        $user = User::where($provider . '_id', $socialUser->getId())->first();

        if (!$user) {
            $user = User::where('email', $socialUser->getEmail())->first();

            if ($user) {
                if ($socialUser->user['email_verified'] ?? true) {
                    $user->update([$provider . '_id' => $socialUser->getId()]);
                } else {
                    return redirect('/login')->withErrors(['msg' => 'El email no está verificado en el proveedor ' . $provider]);
                }
            } else {
                $user = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'password' => Hash::make(uniqid()),
                    $provider . '_id' => $socialUser->getId(),
                ]);
                if($socialUser->user['email_verified']) {
                    $user->markEmailAsVerified();
                }
                try {
                    $user->addMediaFromUrl($socialUser->getAvatar())
                         ->toMediaCollection('avatars', 'public');
                } catch (\Exception $e) {
                    Log::error("No se pudo descargar el avatar de Google: " . $e->getMessage());
                }
                event(new Registered($user));
            }
        }

        Auth::login($user);
        return redirect()->intended('/dashboard');
    }
}
