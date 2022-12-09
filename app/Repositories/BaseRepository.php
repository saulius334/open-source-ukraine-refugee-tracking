<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Refugee;
use App\Enums\PaginateEnum;
use App\Models\RefugeeCamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\Paginator;
use App\Services\Shared\Interfaces\RequestDTOInterface;
use App\Repositories\Interfaces\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface
{   
    public function __construct(private string $subject)
    {
    }
    public function store(RequestDTOInterface $refugeeDTO): void
    {
        $this->subject::create($refugeeDTO->getAllData());
    }

    public function update(RequestDTOInterface $refugeeDTO, Model $subject): void
    {
        $subject->update($refugeeDTO->getAllData());
    }

    public function destroy(Model $subject): void
    {
        $subject->delete();
    }

    public function getAllCamps(): Collection
    {
        return RefugeeCamp::all();
    }
    public function getConfirmedRefugees(): Paginator
    {
        return Refugee::where('confirmed', 1)->orderBy('created_at', 'desc')->paginate(PaginateEnum::Fifteen);
    }
}