<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Refugee;
use App\Enums\PaginateEnum;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\Paginator;
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

    public function getConfirmedRefugees(): Paginator
    {
        return Refugee::where('confirmed', 1)->orderBy('created_at', 'desc')->paginate(PaginateEnum::Fifteen);
    }
}