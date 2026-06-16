<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing.home');
})->name('home');

Route::get('/servicios', fn() => view('landing.services'))->name('services');

Route::get('/nosotros', fn() => view('landing.aboutas'))->name('about');


Route::get('/contacto', fn() => view('landing.contact'))->name('contact');


Route::post('/contacto', [ContactController::class, 'store'])
    ->middleware('throttle:contact-form')
    ->name('contact.store');

