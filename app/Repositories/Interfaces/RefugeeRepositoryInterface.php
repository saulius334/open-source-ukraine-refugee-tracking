<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\Models\Refugee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\Services\Shared\Interfaces\RequestDTOInterface;

interface RefugeeRepositoryInterface
{
    public function __construct(Refugee $refugee);
    public function getAll(): Collection;
    public function store(RequestDTOInterface $requestDTO): void;
    public function update(RequestDTOInterface $requestDTO, Model $refugee): void;
    public function destroy(Model $refugee): void;
    public function getConfirmedRefugees(): Collection;
}