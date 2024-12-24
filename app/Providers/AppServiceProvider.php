<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // View::composer('*', function ($view) {
        //     $view->with('components', [$view->getName()]); // Passa as configurações para todas as views
        //     $view->with('modules', [$view->getName()]); // Passa o usuário logado para todas as views
        // });
    }
}
