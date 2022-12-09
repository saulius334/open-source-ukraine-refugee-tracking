<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Pagination\Paginator;
use App\Services\Shared\Interfaces\RequestDTOInterface;

interface RefugeeRepositoryInterface
{
    public function __construct();
    public function store(RequestDTOInterface $requestDTO): void;
    public function update(RequestDTOInterface $requestDTO, Model $subject): void;
    public function destroy(Model $subject): void;
    public function getAllRefugees(): Collection;
    public function getConfirmedRefugees(): Paginator;
}