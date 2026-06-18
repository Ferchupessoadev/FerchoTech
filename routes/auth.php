<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordReset;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    // login
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'store'])->name('login.store');

    // Register
    Route::get('/register', [RegisteredUserController::class, 'index'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');


    Route::get('/auth/{provider}/redirect', [AuthController::class, 'redirectToProvider'])
        ->name('auth.redirect');
    Route::get('/auth/{provider}/callback', [AuthController::class, 'handleProviderCallback']);
});
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/forgot-password', [PasswordReset::class, 'index'])
    ->name('password.request');
Route::post('/forgot-password', [PasswordReset::class, 'store'])
    ->name('password.email')
    ->middleware('throttle:password-reset');

Route::get('/password/reset/email', [PasswordReset::class, 'edit'])
    ->name('password.reset');
Route::post('/reset-password', [PasswordReset::class, 'update'])
    ->name('password.store');

