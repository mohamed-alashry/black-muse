<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

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
        Model::unguard();

        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        }

        if (session()->has('dir')) {
            view()->share('dir', session('dir'));
        }
        
    }
}
