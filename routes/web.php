<?php

use App\Http\Controllers\ContactController;
use App\Models\LucideIcon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('landing.home'))->name('home');

Route::get('/servicios', fn() => view('landing.services'))->name('services');

Route::get('/nosotros', fn() => view('landing.aboutas'))->name('about');


Route::get('/contacto', fn() => view('contact'))->name('contact');


Route::post('/contacto', [ContactController::class, 'store'])
    ->middleware('throttle:contact-form')
    ->name('contact.store');

Route::get('/api/lucide-icons/search', function (Request $request) {
    $search = $request->query('q');

    if (empty($search)) {
        return response()->json(LucideIcon::take(24)->pluck('id'));
    }

    $iconos = LucideIcon::where('id', 'like', "%{$search}%")->take(40)->pluck('id');

    return response()->json($iconos);
})->middleware('auth')->name('api.icons.search');
