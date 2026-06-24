<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;


class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function updateAvatar(UpdateUserRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->clearMediaCollection('avatars');

        $user->addMediaFromRequest('avatar')
            ->toMediaCollection('avatars', 'public');

        return Redirect::route('profile.index')->with('success', '¡Perfil actualizado con éxito!');
    }
}
