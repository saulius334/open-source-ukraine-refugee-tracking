<?php

namespace App\Http\Controllers;

use App\Models\Refugee;
use App\Enums\PaginateEnum;
use App\Models\RefugeeCamp;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreRefugeeRequest;
use App\Http\Requests\UpdateRefugeeRequest;
use App\Repositories\RefugeeRepository;

class RefugeeController extends Controller
{
    public function __construct(private RefugeeRepository $refugeeRepo)
    {
    }

    public function index()
    {
            return $this->refugeeRepo->index();
    }

    public function create(RefugeeCamp $camp)
    {
        return $this->refugeeRepo->create($camp);

    }

    public function store(StoreRefugeeRequest $request): RedirectResponse
    {
        return $this->refugeeRepo->store($request);
    }

    public function show(Refugee $refugee)
    {
        return $this->refugeeRepo->show($refugee);
    }

    public function edit(Refugee $refugee)
    {
        return $this->refugeeRepo->edit($refugee);
    }

    public function update(UpdateRefugeeRequest $request, Refugee $refugee): RedirectResponse
    {
        return $this->refugeeRepo->update($request, $refugee);
    }
    public function destroy(Refugee $refugee)
    {
        return $this->refugeeRepo->destroy($refugee);
    }
}
