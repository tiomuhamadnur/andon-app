<?php

namespace App\Providers;

use App\Models\Settings;
use Illuminate\Support\Facades\View;
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
        // Mengambil nama aplikasi dan logo dari database
        $appName = Settings::where('code', 'APP_NAME')->first()->value;
        $appLogo = Settings::where('code', 'APP_LOGO')->first()->value;

        // Membagikan variabel ke semua view
        View::share('appName', $appName);
        View::share('appLogo', $appLogo);
    }
}