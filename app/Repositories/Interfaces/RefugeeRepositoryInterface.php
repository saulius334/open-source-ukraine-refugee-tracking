<?php

declare(strict_types=1);

namespace App\Repositories\Interfaces;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreRefugeeRequest;
use App\Http\Requests\UpdateRefugeeRequest;

interface RefugeeRepositoryInterface
{
    public function create(RefugeeCamp $camp);
    public function store(StoreRefugeeRequest $request): RedirectResponse;
    public function edit(Refugee $refugee);
    public function update(UpdateRefugeeRequest $request, Refugee $refugee): RedirectResponse;
    public function destroy(Refugee $refugee);
}