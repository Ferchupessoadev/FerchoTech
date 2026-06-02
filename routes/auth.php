<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login');

Route::post('/login', [AuthController::class, 'store'])->name('login.store');


Route::get('/password/reset/email', [PasswordReset::class, 'index'])->name('password.reset');
Route::post('/password/sendemail', [PasswordReset::class, 'store'])->middleware('throttle:password-reset')->name('password.reset.store');

Route::get('/password/reset', [PasswordReset::class, 'edit'])->name('password.reset.edit');
Route::post('/password/reset', [PasswordReset::class, 'update'])->name('password.reset.update');

Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');
