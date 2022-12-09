<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use Illuminate\Http\RedirectResponse;
use App\Services\Refugee\DTO\RefugeeDTO;
use App\Http\Requests\UpdateRefugeeRequest;
use Illuminate\Database\Eloquent\Collection;
use App\Services\Refugee\RefugeeMessageService;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;

class RefugeeRepository implements RefugeeRepositoryInterface
{
    public function __construct(private RefugeeMessageService $messageService)
    {  
    }
    
    public function store(RefugeeDTO $refugeeDTO): RedirectResponse
    {
        Refugee::create($refugeeDTO->getAllData());
        return redirect()->route('r_index')->with('message', $this->messageService->storeMessage($refugeeDTO->getConfirmed()));
    }

    public function edit(Refugee $refugee)
    {
        return view('refugee.edit', [
            'refugee' => $refugee,
            'camps' => RefugeeCamp::all(),
            'campID' => $refugee->current_refugee_camp_id
        ]);
    }

    public function update(UpdateRefugeeRequest $request, Refugee $refugee): RedirectResponse
    {
        $message = $this->messageService->updateMessage($request->confirmed, $refugee->confirmed);
        $refugee->update($request->validated());
        return redirect()->route('r_index')->with('message', $message);
    }

    public function destroy(Refugee $refugee)
    {
        $refugee->delete();
        return redirect()->route('r_index')->with('message', $this->messageService->deleteMessage());
    }
    public function getAllCamps(): Collection
    {
        return RefugeeCamp::all();
    }
}