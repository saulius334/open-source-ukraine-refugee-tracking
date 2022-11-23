<?php

namespace App\Providers;

use App\Models\Refugee;
use App\Observers\RefugeeObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Refugee::observe(RefugeeObserver::class);
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
