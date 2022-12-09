<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\Paginator;

interface RefugeeRepositoryInterface
{
    public function __construct();
    public function getConfirmedRefugees(): Paginator;
}