<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Refugee;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;

class RefugeeRepository extends BaseRepository implements RefugeeRepositoryInterface
{   
    public function __construct()
    {
        parent::__construct(Refugee::class);
    }

    public function getAllRefugees(): Collection
    {
        return Refugee::all();
    }

    public function getConfirmedRefugees(): Collection
    {
        return Refugee::where('confirmed', 1)->orderBy('created_at', 'desc');
    }
}