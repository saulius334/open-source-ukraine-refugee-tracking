<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Services\Shared\Interfaces\RequestDTOInterface;

interface RefugeeCampRepositoryInterface
{
    public function __construct();
    public function getAll(): Collection;
    public function store(RequestDTOInterface $refugeeCampDTO): void;
    public function update(RequestDTOInterface $requestDTO, Model $subject): void;
    public function destroy(Model $subject): void;
    public function getAllCamps(): Collection;
}