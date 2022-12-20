<?php

namespace App\Http\Controllers;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Services\Refugee\DTO\RefugeeDTO;
use App\Http\Requests\StoreRefugeeRequest;
use App\Http\Requests\UpdateRefugeeRequest;
use App\Services\Refugee\UpdateAllRefugeesService;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;
use App\Services\Refugee\ImageService;

class RefugeeController extends Controller
{
    public function __construct(
        private RefugeeRepositoryInterface $refugeeRepo,
        private UpdateAllRefugeesService $updateService,
        private ImageService $imageService,
    ) {
    }

    public function index(Request $request): View
    {
        return view('refugee.index', [
            'refugees' => $this->refugeeRepo->searchConfirmed($request->get('search')),
        ]);
    }

    public function create(RefugeeCamp $camp): View
    {
        return view('refugee.create', [
            'camp' => $camp,
        ]);
    }

    public function store(StoreRefugeeRequest $request): RedirectResponse
    {
        $refugeeDTO = RefugeeDTO::fromRequest($request);
        $refugeeDTO->setImage($this->imageService->saveAndGetPath($request->file('photo')));
        $this->refugeeRepo->store($refugeeDTO->getAllData());
        return redirect()->route('r_index')->with('message', 'Success');
    }

    public function show(Refugee $refugee): View
    {
        return view('refugee.show', [
            'refugee' => $refugee
        ]);
    }

    public function edit(Refugee $refugee): View
    {
        return view('refugee.edit', [
            'refugee' => $refugee,
            'camp' => $refugee->getCamp(),
        ]);
    }

    public function update(UpdateRefugeeRequest $request, Refugee $refugee): RedirectResponse
    {
        $refugeeDTO = RefugeeDTO::fromRequest($request);
        $refugeeDTO->setImage($this->imageService->saveAndGetPath($request->file('photo'), $refugee->getPhoto()));
        $this->refugeeRepo->update($refugeeDTO->getAllData(), $refugee);
        return redirect()->route('r_index')->with('message', 'Success');
    }

    public function destroy(Refugee $refugee): RedirectResponse
    {
        $this->refugeeRepo->destroy($refugee);
        return redirect()->back()->with('message', 'Successfully deleted');
    }

    public function acceptAll(): RedirectResponse
    {
        $this->updateService->acceptAllUnconfirmed(Auth::user()->id);
        return redirect()->back()->with('message', 'Success');
    }
}
