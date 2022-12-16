<?php

declare(strict_types=1);

namespace App\Services\Shared\Statistics;

use Carbon\Carbon;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;

class RefugeeStatistics
{
    public function __construct(private RefugeeRepositoryInterface $refugeeRepo)
    {
        $this->allRefugees = $refugeeRepo->getAll();
    }
    public function todayRegistered(): int
    {
        $todayRefugees = $this->allRefugees->filter(function ($value) {
            return Carbon::now()->subDay() < $value->created_at;
        });
        return $todayRefugees->count();
    }
    public function weekRegistered(): int
    {
        $todayRefugees = $this->allRefugees->filter(function ($value) {
            return Carbon::now()->subWeek() < $value->created_at;
        });
        return $todayRefugees->count();
    }
    public function monthRegistered(): int
    {
        $todayRefugees = $this->allRefugees->filter(function ($value) {
            return Carbon::now()->subMonth() < $value->created_at;
        });
        return $todayRefugees->count();
    }
    public function total(): int
    {
        return $this->allRefugees->count();
    }
}