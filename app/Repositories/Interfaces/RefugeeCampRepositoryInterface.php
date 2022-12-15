<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\Models\RefugeeCamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RefugeeCampRepositoryInterface
{
    public function __construct(RefugeeCamp $camp);
    public function getAll(): Collection;
    public function store(array $data): void;
    public function update(array $data, Model $camp): void;
    public function destroy(Model $camp): void;
    public function getCampsByUserId(int $userId): Collection;
}
