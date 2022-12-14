<?php

namespace App\Providers;

use App\Models\Refugee;
use App\Observers\RefugeeObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        Refugee::observe(RefugeeObserver::class);
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }
}
