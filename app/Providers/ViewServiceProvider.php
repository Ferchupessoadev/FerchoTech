<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Service;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.footer', function ($view) {
            $view->with('services', Service::all());
        });


        View::composer('components.navbar.home', function ($view) {
             $view->with('services', Service::all());
        });
    }
}
