<?php

declare(strict_types=1);

namespace App\Repositories;

use DateTime;
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
        return parent::getAll()->where('confirmed', 1);
        return Refugee::where('confirmed', 1)->orderBy('created_at', 'desc')->get();
    }
    public function getRefugeesByCampId(int $campId): Collection
    {
        return parent::getAll()->where('current_refugee_camp_id', $campId);
    }
    public function todayRegistered(): int
    {
        return parent::getAll()->where('created_at', '>', new DateTime('yesterday'))->count();
    }
    public function weekRegistered(): int
    {
        return parent::getAll()->where('created_at', '>', (new DateTime())->modify('-7 day'))->count();
    }
    public function monthRegistered(): int
    {
        return parent::getAll()->where('created_at', '>', (new DateTime())->modify('-1 month'))->count();
    }
    public function refugeeCount(): int
    {
        return parent::getAll()->count();
    }
}
