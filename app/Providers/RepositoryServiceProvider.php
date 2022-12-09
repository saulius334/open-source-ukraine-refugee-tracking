<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\RefugeeRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;
use Illuminate\Auth\EloquentUserProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(EloquentUserProvider::class, BaseRepository::class);
        $this->app->bind(RefugeeRepositoryInterface::class, RefugeeRepository::class);
        $this->app->bind(RefugeeCampRepositoryInterface::class, RefugeeCampRepository::class);
    }

    public function boot(): void
    {
    }
}
