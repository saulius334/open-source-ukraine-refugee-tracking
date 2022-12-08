<?php

namespace App\Providers;

use App\Repositories\RefugeeRepository;
use App\Repositories\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, RefugeeRepository::class);
    }

    public function boot()
    {
        //
    }
}
