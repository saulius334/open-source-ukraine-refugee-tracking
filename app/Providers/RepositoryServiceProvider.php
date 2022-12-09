<?php

namespace App\Providers;

use App\Repositories\RefugeeRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(RefugeeRepositoryInterface::class, RefugeeRepository::class);
    }

    public function boot()
    {
        //
    }
}
