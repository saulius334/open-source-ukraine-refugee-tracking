<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public function __construct(protected Model $model)
    {
    }

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function store(array $data): void
    {
        $this->model->create($data);
    }

    public function update(array $data, Model $model): void
    {
        $model->update($data);
    }

    public function destroy(Model $model): void
    {
        $model->delete();
    }
}
