<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::get('/dashboard', [MessageController::class, 'index'])->middleware('auth')->name('dashboard');


Route::get('/dashboard/message/{message}', [MessageController::class, 'show'])->middleware('auth')->name('dashboard.message');
Route::delete('/dashboard/message/{message}', [MessageController::class, 'destroy'])->middleware('auth')->name('dashboard.message.destroy');

// Services crud
Route::get('/dashboard/services', [ServicesController::class, 'index'])->middleware('auth')->name('dashboard.services.index');
Route::post('/dashboard/services/create', [ServicesController::class, 'store'])->middleware('auth')->name('dashboard.services.store');
Route::get('/dashboard/services/{service}', [ServicesController::class, 'show'])->middleware('auth')->name('dashboard.services.show');
Route::delete('/dashboard/services/{service}', [ServicesController::class, 'destroy'])->middleware('auth')->name('dashboard.services.destroy');
Route::get('/dashboard/services/{service}/edit', [ServicesController::class, 'edit'])->middleware('auth')->name('dashboard.services.edit');
Route::put('/dashboard/services/{service}', [ServicesController::class, 'update'])->middleware('auth')->name('dashboard.services.update');


// Blog crud
Route::get('/dashboard/blog', [PostController::class, 'index'])->middleware('auth')->name('dashboard.post.index');
Route::post('/dashboard/blog/create', [PostController::class, 'store'])->middleware('auth')->name('dashboard.post.create');
Route::get('/dashboard/blog/{post}', [PostController::class, 'show'])->middleware('auth')->name('dashboard.post.show');
Route::delete('/dashboard/blog/{post}', [PostController::class, 'destroy'])->middleware('auth')->name('dashboard.post.destroy');
Route::get('/dashboard/blog/{post}/edit', [PostController::class, 'edit'])->middleware('auth')->name('dashboard.post.edit');
Route::put('/dashboard/blog/{post}', [PostController::class, 'update'])->middleware('auth')->name('dashboard.post.update');
