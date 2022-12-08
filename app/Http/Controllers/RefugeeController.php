<?php

namespace App\Http\Controllers;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use Illuminate\Http\RedirectResponse;
use App\Repositories\RefugeeRepository;
use App\Http\Requests\StoreRefugeeRequest;
use App\Http\Requests\UpdateRefugeeRequest;
use App\Services\SearchService\RefugeeSearch;

class RefugeeController extends Controller
{
    public function __construct(private RefugeeRepository $refugeeRepo, private RefugeeSearch $searchService)
    {
    }

    public function index()
    {
        return view('refugee.index', [
            'refugees' => $this->searchService->filter(request('search'))
        ]);
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
        return view('refugee.show', [
            'refugee' => $refugee
        ]);
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
