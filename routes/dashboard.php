<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::get('/dashboard', [MessageController::class, 'index'])->middleware('auth')->name('dashboard');


Route::get('/dashboard/message/{message}', [MessageController::class, 'show'])->middleware('auth')->name('dashboard.message');
Route::delete('/dashboard/message/{message}', [MessageController::class, 'destroy'])->middleware('auth')->name('dashboard.message.destroy');
