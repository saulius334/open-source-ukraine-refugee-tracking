<?php

namespace App\Http\Controllers;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use Illuminate\Http\RedirectResponse;
use App\Services\Refugee\DTO\RefugeeDTO;
use App\Http\Requests\StoreRefugeeRequest;
use App\Http\Requests\UpdateRefugeeRequest;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;
use App\Services\Shared\Transformers\Request\RefugeeRequestTransformer;

class RefugeeController extends Controller
{
    public function __construct(private RefugeeRepositoryInterface $refugeeRepo)
    {
    }

    public function index()
    {
        return view('refugee.index', [
            'refugees' => Refugee::all()->where('confirmed', 1)
        ]);
    }

    public function create(RefugeeCamp $camp)
    {
        return view('refugee.create', [
            'camps' => $this->refugeeRepo->getAllCamps(),
            'selectedCamp' => $camp,
        ]);
    }

    public function store(StoreRefugeeRequest $request): RedirectResponse
    {
        $refugeeDTO = new RefugeeDTO((new RefugeeRequestTransformer())->transform($request));
        return $this->refugeeRepo->store($refugeeDTO);
    }

    public function show(Refugee $refugee)
    {
        return view('refugee.show', [
            'refugee' => $refugee
        ]);
    }

    public function edit(Refugee $refugee)
    {
        return view('refugee.edit', [
            'refugee' => $refugee,
            'camps' => $this->refugeeRepo->getAllCamps(),
            'campID' => $refugee->current_refugee_camp_id
        ]);
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
