<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
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
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
        $verticalMenuData = json_decode($verticalMenuJson);

        // Share all menuData to all the views
        View::share('menuData', $verticalMenuData);
        View::share('languages', config('app.available_locales'));

        Paginator::defaultView('components.pagination');
    }
}
