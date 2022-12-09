<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\RefugeeCamp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use App\Services\Shared\Interfaces\RequestDTOInterface;
use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;

class RefugeeCampRepository extends BaseRepository implements RefugeeCampRepositoryInterface
{   
    public function __construct()
    {
        parent::__construct(RefugeeCamp::class);
    }

    public function store(RequestDTOInterface $refugeeCampDTO): void
    {
        RefugeeCamp::create($refugeeCampDTO->getAllData() + [
            'user_id' => Auth::id(),
        ]);
    }

    public function getAllCamps(): Collection
    {
        return RefugeeCamp::all();
    }
}