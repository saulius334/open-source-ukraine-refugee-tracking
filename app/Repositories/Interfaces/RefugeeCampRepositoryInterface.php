<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\Models\RefugeeCamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Services\Shared\Interfaces\RequestDTOInterface;

interface RefugeeCampRepositoryInterface
{
    public function __construct(RefugeeCamp $camp);
    public function getAll(): Collection;
    public function store(RequestDTOInterface $requestDTO): void;
    public function update(RequestDTOInterface $requestDTO, Model $camp): void;
    public function destroy(Model $camp): void;
}