<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/api/blog/search', [BlogController::class, 'search']);
Route::get('blog/{post}', [BlogController::class, 'show'])->name('blog.show');

Route::middleware(['auth','role:admin'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::resource('blog', PostController::class)->parameters(['blog' => 'post'])->except('show');

    Route::post('blog/upload-image', [PostController::class, 'uploadEditorImage'])->name('blog.upload-image');

});


Route::get('/media/preview/{media}', function (Media $media) {
    if (Auth::check() && (int) Auth::user()->id === (int) $media->model_id) {
        return response()->file($media->getPath());
    }
    abort(403);
})->middleware('auth')->name('media.preview');

