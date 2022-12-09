<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use App\Services\Shared\DTO\SearchDTO;
use Illuminate\Database\Eloquent\Model;
use App\Services\Shared\Interfaces\RequestDTOInterface;

interface RefugeeRepositoryInterface
{
    public function __construct();
    public function getAll(): Collection;
    public function getSearched(Collection $searchable, ?SearchDTO $searchDTO): Paginator;
    public function store(RequestDTOInterface $requestDTO): void;
    public function update(RequestDTOInterface $requestDTO, Model $subject): void;
    public function destroy(Model $subject): void;
    public function getAllRefugees(): Collection;
    public function getConfirmedRefugees(): Collection;
}