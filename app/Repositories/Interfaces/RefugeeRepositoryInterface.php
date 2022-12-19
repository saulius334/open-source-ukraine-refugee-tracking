<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\Models\Refugee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RefugeeRepositoryInterface
{
    public function __construct(Refugee $refugee);
    public function getAll(): Collection;
    public function store(array $data): void;
    public function update(array $data, Model $refugee): void;
    public function destroy(Model $refugee): void;
    public function getConfirmedRefugees(): Collection;
    public function getRefugeesByCampId(int $campId): Collection;
    public function todayRegistered(): int;
    public function weekRegistered(): int;
    public function monthRegistered(): int;
    public function refugeeCount(): int;
    public function getRefugeesByUserId(int $userId, bool $confirmed): Collection;
}
