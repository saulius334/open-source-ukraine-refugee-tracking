<?php

namespace App\Providers;

use App\Repositories\RefugeeRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, RefugeeRepository::class);
        $this->app->bind(RepositoryInterface::class, RefugeeCampRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
