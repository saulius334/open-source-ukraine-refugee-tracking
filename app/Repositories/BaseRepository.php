<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Services\Shared\Interfaces\RequestDTOInterface;

class BaseRepository
{
    public function __construct(protected Model $model)
    {
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function store(RequestDTOInterface $requestDTO): void
    {
        $this->model->create($requestDTO->getAllData());
    }

    public function update(RequestDTOInterface $requestDTO, Model $model): void
    {
        $model->update($requestDTO->getAllData());
    }

    public function destroy(Model $model): void
    {
        $model->delete();
    }
}
