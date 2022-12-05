<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Refugee;
use App\Enums\PaginateEnum;
use App\Models\RefugeeCamp;
use Illuminate\Support\Facades\Auth;
use App\Repositories\RepositoryInterface;
use App\Http\Requests\StoreRefugeeCampRequest;
use App\Http\Requests\UpdateRefugeeCampRequest;
use App\Services\MessageServices\CampMessageService;


class RefugeeCampRepository implements RepositoryInterface
{
    public function __construct(private CampMessageService $messageService)
    {  
    }

    public function index()
    {
        return view('camp.index', [
            'camps' => RefugeeCamp::latest()->paginate(PaginateEnum::Five)
        ]);
    }

    public function create()
    {
        return view('camp.create');
    }

    public function store(StoreRefugeeCampRequest $request)
    {
        RefugeeCamp::create($request->validated() + [
            'user_id' => Auth::id(),
            'currentCapacity' => $request->originalCapacity
        ]);
        return redirect()->route('u_index')->with('message', $this->messageService->storeMessage());
    }

    public function show(RefugeeCamp $camp)
    {
        return view('camp.show', [
            'camp' => $camp
        ]);
    }

    public function edit(RefugeeCamp $camp)
    {
        return view('camp.edit', [
            'camp' => $camp,
            'refugees' => Refugee::all(),
        ]);
    }

    public function update(UpdateRefugeeCampRequest $request, RefugeeCamp $camp)
    {
        $camp->update($request->validated() + [
            'currentCapacity' => $request->originalCapacity - $camp->originalCapacity + $camp->currentCapacity,
        ]);

        return redirect()->route('c_index')->with('message', $this->messageService->updateMessage());
    }

    public function destroy(RefugeeCamp $camp)
    {
        $camp->delete();
        return redirect()->route('c_index')->with('message', $this->messageService->deleteMessage());
    }
}