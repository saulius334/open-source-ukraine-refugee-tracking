<?php

declare(strict_types=1);

namespace App\Repositories;

use DateTime;
use App\Models\Refugee;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;

class RefugeeRepository extends BaseRepository implements RefugeeRepositoryInterface
{
    public function __construct(Refugee $model)
    {
        parent::__construct($model);
    }

    public function searchConfirmed(?string $query): Collection
    {
        return $this->model->where('name', 'like', "%{$query}%")->where('confirmed', 1)->get();
    }

    public function getConfirmedRefugees(): Collection
    {
        return $this->model->where('confirmed', 1)->get();
    }

    public function getRefugeesByCampId(int $campId): Collection
    {
        return $this->model->where('current_refugee_camp_id', $campId)->get();
    }

    public function todayRegistered(): int
    {
        return $this->model->where('created_at', '>', new DateTime('yesterday'))->count();
    }

    public function weekRegistered(): int
    {
        return $this->model->where('created_at', '>', (new DateTime())->modify('-7 day'))->count();
    }

    public function monthRegistered(): int
    {
        return $this->model->where('created_at', '>', (new DateTime())->modify('-1 month'))->count();
    }

    public function refugeeCount(): int
    {
        return $this->model->count();
    }

    public function getRefugeesByUserId(int $userId, bool $confirmed): Collection
    {
        return $this->model->whereHas('getCamp', function (Builder $query) use ($userId) {
            $query->where('user_id', $userId);
        })->where('confirmed', $confirmed)->get();
    }
}
