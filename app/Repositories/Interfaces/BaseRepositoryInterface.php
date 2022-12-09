<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use App\Services\Shared\Interfaces\RequestDTOInterface;

interface BaseRepositoryInterface
{
    public function store(RequestDTOInterface $requestDTO): void;
    public function update(RequestDTOInterface $requestDTO, Model $subject): void;
    public function destroy(Model $subject): void;
}