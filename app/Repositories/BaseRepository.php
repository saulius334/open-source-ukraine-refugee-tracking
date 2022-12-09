<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Services\Shared\Interfaces\RequestDTOInterface;
use App\Repositories\Interfaces\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{   
    public function __construct(private string $subject)
    {
    }
    public function store(RequestDTOInterface $requestDTO): void
    {
        $this->subject::create($requestDTO->getAllData());
    }

    public function update(RequestDTOInterface $requestDTO, Model $subject): void
    {
        $subject->update($requestDTO->getAllData());
    }

    public function destroy(Model $subject): void
    {
        $subject->delete();
    }
}