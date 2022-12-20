<?php

namespace App\Http\Controllers;

use App\Models\RefugeeCamp;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use App\Http\Requests\StoreRefugeeCampRequest;
use App\Http\Requests\UpdateRefugeeCampRequest;
use App\Services\RefugeeCamp\DTO\RefugeeCampDTO;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;
use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;

class RefugeeCampController extends Controller
{
    public function __construct(
        private RefugeeCampRepositoryInterface $campRepo,
        private RefugeeRepositoryInterface $refugeeRepo,
    ) {
    }
    public function index(Request $request): View|Factory
    {
        return view('camp.index', [
            'camps' => $this->campRepo->search($request->get('search'))
        ]);
    }

    public function create(): View
    {
        return view('camp.create');
    }

    public function store(StoreRefugeeCampRequest $request): RedirectResponse
    {
        $refugeeCampDTO = RefugeeCampDTO::fromRequest($request);
        $this->campRepo->store($refugeeCampDTO->getAllData());
        return redirect()->route('u_myCamps')->with('message', 'Success');
    }

    public function show(RefugeeCamp $camp): View
    {
        return view('camp.show', [
            'camp' => $camp
        ]);
    }

    public function edit(RefugeeCamp $camp): View|Factory
    {
        return view('camp.edit', [
            'camp' => $camp,
            'refugees' => $this->refugeeRepo->getAll(),
        ]);
    }

    public function update(UpdateRefugeeCampRequest $request, RefugeeCamp $camp): RedirectResponse
    {
        $refugeeCampDTO = RefugeeCampDTO::fromRequest($request);
        $this->campRepo->update($refugeeCampDTO->getAllData(), $camp);
        return redirect()->route('u_myCamps')->with('message', 'Success');
    }

    public function destroy(RefugeeCamp $camp): RedirectResponse
    {
        $this->campRepo->destroy($camp);
        return redirect()->route('u_myCamps')->with('message', 'Success');
    }
}
