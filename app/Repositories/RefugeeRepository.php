<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Refugee;
use Illuminate\Support\Collection;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;

class RefugeeRepository extends BaseRepository implements RefugeeRepositoryInterface
{
    public function __construct(Refugee $refugee)
    {
        parent::__construct($refugee);
    }

    public function getConfirmedRefugees(): Collection
    {
        return Refugee::where('confirmed', 1)->orderBy('created_at', 'desc')->get();
    }
    public function getRefugeesByCampId(int $campId): Collection
    {
        return Refugee::where('current_refugee_camp_id', $campId)->get();
    }
}
