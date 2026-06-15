<?php

namespace App\Providers;

use App\Models\Service;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.footer', function ($view) {
            $view->with('services', Service::all());
        });


        View::composer('components.navbar.home', function ($view) {
             $view->with('services', Service::all());
        });

        RateLimiter::for('contact-form', function (Request $request) {

            $email = (string) $request->input('email');

            return [
                Limit::perMinute(3)->by($request->ip()),

                Limit::perHour(10)->by($email),

                Limit::perDay(20)->by($request->ip()),
            ];
        });

        RateLimiter::for('password-reset', function (Request $request) {
            $email = (string) $request->input('email');

            $customResponse = function (Request $request, array $headers) {
                $seconds = $headers['Retry-After'] ?? 60;

                throw ValidationException::withMessages([
                    'throttle' => $seconds,
                ]);
            };

            return [
                Limit::perMinute(1)->by($email)->response($customResponse),
                Limit::perDay(10)->by($request->ip())->response($customResponse),
            ];
        });

    }
}
