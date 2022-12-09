<?php

namespace App\Http\Controllers;

use App\Models\RefugeeCamp;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreRefugeeCampRequest;
use App\Http\Requests\UpdateRefugeeCampRequest;
use App\Services\RefugeeCamp\DTO\RefugeeCampDTO;
use App\Services\RefugeeCamp\RefugeeCampMessageService;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;
use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;
use App\Services\RefugeeCamp\Transformers\RefugeeCampRequestTransformer;

class RefugeeCampController extends Controller
{
    public function __construct(
        private RefugeeCampRepositoryInterface $campRepo,
        private RefugeeRepositoryInterface $refugeeRepo,
        private RefugeeCampRequestTransformer $transformer,
        private RefugeeCampMessageService $messageService, 
        )
    {
    }
    public function index(): View
    {
        return view('camp.index', [
            'camps' => $this->campRepo->getAllCamps()
        ]);
    }

    public function create(): View
    {
        return view('camp.create');
    }

    public function store(StoreRefugeeCampRequest $request): RedirectResponse
    {
        $refugeeCampDTO = new RefugeeCampDTO($this->transformer->transform($request));
        $this->campRepo->store($refugeeCampDTO);
        return redirect()->route('u_index')->with('message', $this->messageService->storeMessage());
    }

    public function show(RefugeeCamp $camp): View
    {
        return view('camp.show', [
            'camp' => $camp
        ]);
    }

    public function edit(RefugeeCamp $camp): View
    {
        return view('camp.edit', [
            'camp' => $camp,
            'refugees' => $this->refugeeRepo->getAllRefugees(),
        ]);
    }

    public function update(UpdateRefugeeCampRequest $request, RefugeeCamp $camp): RedirectResponse
    {
        $refugeeCampDTO = new RefugeeCampDTO($this->transformer->transform($request));
        $this->campRepo->update($refugeeCampDTO, $camp);
        return redirect()->route('c_index')->with('message', $this->messageService->updateMessage());
    }

    public function destroy(RefugeeCamp $camp): RedirectResponse
    {
        $this->campRepo->destroy($camp);
        return redirect()->route('c_index')->with('message', $this->messageService->deleteMessage());
    }
}
