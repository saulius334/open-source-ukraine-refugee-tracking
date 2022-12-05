<?php

namespace App\Http\Controllers;

use App\Models\RefugeeCamp;
use App\Repositories\RefugeeCampRepository;
use App\Http\Requests\StoreRefugeeCampRequest;
use App\Http\Requests\UpdateRefugeeCampRequest;

class RefugeeCampController extends Controller
{
    public function __construct(private RefugeeCampRepository $campRepo)
    {
    }
    public function index()
    {
        return $this->campRepo->index();
    }

    public function create()
    {
        return $this->campRepo->create();
    }

    public function store(StoreRefugeeCampRequest $request)
    {
        return $this->campRepo->store($request);
    }

    public function show(RefugeeCamp $camp)
    {
        return $this->campRepo->show($camp);
    }

    public function edit(RefugeeCamp $camp)
    {
        return $this->campRepo->edit($camp);
    }

    public function update(UpdateRefugeeCampRequest $request, RefugeeCamp $camp)
    {
        return $this->campRepo->update($request, $camp);
    }

    public function destroy(RefugeeCamp $camp)
    {
        return $this->campRepo->destroy($camp);
    }
}
