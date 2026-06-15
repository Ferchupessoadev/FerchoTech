<?php

use App\Http\Controllers\LucideIconController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SettingController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [MessageController::class, 'index'])->name('dashboard');


    Route::get('/dashboard/message/{message}', [MessageController::class, 'show'])->name('dashboard.message');
    Route::delete('/dashboard/message/{message}', [MessageController::class, 'destroy'])->name('dashboard.message.destroy');

    // Services crud
    Route::get('/dashboard/services', [ServicesController::class, 'index'])->name('dashboard.services.index');
    Route::get('/dashboard/services/create', [ServicesController::class, 'create'])->name('dashboard.services.create');
    Route::post('/dashboard/services/create', [ServicesController::class, 'store'])->name('dashboard.services.store');
    Route::get('/dashboard/services/{service}', [ServicesController::class, 'show'])->name('dashboard.services.show');
    Route::delete('/dashboard/services/{service}', [ServicesController::class, 'destroy'])->name('dashboard.services.destroy');
    Route::get('/dashboard/services/{service}/edit', [ServicesController::class, 'edit'])->name('dashboard.services.edit');
    Route::put('/dashboard/services/{service}', [ServicesController::class, 'update'])->name('dashboard.services.update');

    // Statistics
    Route::get('/dashboard/statistics', function () {
        $totalPosts = Post::count();
        $totalCategories = Category::count();
        $totalUsers = User::count();

        // 2. Simulación de tráfico orgánico basado en ID de posts (para tener data visual ya)
        // Cuando implementes un sistema de visitas real, reemplazarás esto.
        $totalViews = Post::sum('id') * 42 + 1240;

        // 3. Generar datos para el gráfico de los últimos 7 días
        $chartLabels = [];
        $chartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $chartLabels[] = $date->isoFormat('dddd'); // Ejemplo: "Lunes", "Martes"

            // Simular visitas diarias de forma dinámica para que el gráfico tenga curvas
            $chartData[] = rand(150, 400) + ($totalPosts * 15);
        }

        // 4. Obtener los 3 artículos más leídos (simulado por ID o fecha de creación)
        $topPosts = Post::with('category')->latest()->take(3)->get();

        return view('dashboard.statistics.index', compact(
            'totalPosts',
            'totalCategories',
            'totalUsers',
            'totalViews',
            'chartLabels',
            'chartData',
            'topPosts'
        ));
    })->name('dashboard.statistics');

    Route::get('/dashboard/setting', [SettingController::class, 'index'])->name('dashboard.settings.index');
    Route::get('/api/lucide-icons/search', [LucideIconController::class, 'index'])->name('api.icons.search');
});

