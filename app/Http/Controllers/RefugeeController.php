<?php

namespace App\Http\Controllers;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\Shared\DTO\SearchDTO;
use App\Services\Refugee\DTO\RefugeeDTO;
use App\Http\Requests\StoreRefugeeRequest;
use App\Http\Requests\UpdateRefugeeRequest;
use App\Services\Refugee\RefugeeMessageService;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;
use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;
use App\Services\Refugee\Transformers\RefugeeRequestTransformer;

class RefugeeController extends Controller
{
    public function __construct(
        private RefugeeRepositoryInterface $refugeeRepo,
        private RefugeeCampRepositoryInterface $campRepo,
        private RefugeeRequestTransformer $transformer,
        private RefugeeMessageService $messageService
        )
    {
    }

    public function index(Request $request): View
    {
        $searchDTO = new SearchDTO($request->search);
        return view('refugee.index', [
            'refugees' => $this->refugeeRepo->getSearched($this->refugeeRepo->getConfirmedRefugees(), $searchDTO)
        ]);
    }

    public function create(RefugeeCamp $camp): View
    {
        return view('refugee.create', [
            'camps' => $this->campRepo->getAllCamps(),
            'selectedCamp' => $camp,
        ]);
    }

    public function store(StoreRefugeeRequest $request): RedirectResponse
    {
        $refugeeDTO = new RefugeeDTO($this->transformer->transform($request));
        $this->refugeeRepo->store($refugeeDTO);
        return redirect()->route('r_index')->with('message', $this->messageService->storeMessage($refugeeDTO->getConfirmed()));
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
            'camps' => $this->campRepo->getAllCamps(),
            'campID' => $refugee->current_refugee_camp_id
        ]);
    }

    public function update(UpdateRefugeeRequest $request, Refugee $refugee): RedirectResponse
    {
        $refugeeDTO = new RefugeeDTO($this->transformer->transform($request));
        $message = $this->messageService->updateMessage($refugeeDTO->getConfirmed());
        $this->refugeeRepo->update($refugeeDTO, $refugee);
        return redirect()->route('r_index')->with('message', $message);
    }

    public function destroy(Refugee $refugee): RedirectResponse
    {
        $this->refugeeRepo->destroy($refugee);
        return redirect()->route('r_index')->with('message', $this->messageService->deleteMessage());
    }
}
