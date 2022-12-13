<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\RefugeeCamp;
use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;

class RefugeeCampRepository extends BaseRepository implements RefugeeCampRepositoryInterface
{
    public function __construct(RefugeeCamp $camp)
    {
        parent::__construct($camp);
    }
}
