<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use Illuminate\Http\RedirectResponse;
use App\Repositories\RepositoryInterface;
use App\Http\Requests\StoreRefugeeRequest;
use App\Http\Requests\UpdateRefugeeRequest;
use App\Services\ImageService\ImagePathService;
use App\Services\MessageService\RefugeeMessageService;

class RefugeeRepository implements RepositoryInterface
{
    public function __construct(private RefugeeMessageService $messageService, private ImagePathService $imageService)
    {  
    }
    
    public function create(RefugeeCamp $camp)
    {
        return view('refugee.create', [
            'camps' => RefugeeCamp::all(),
            'selectedCamp' => $camp,
        ]);
    }
    
    public function store(StoreRefugeeRequest $request): RedirectResponse
    {
        $filepath = ($request->photo)->store('uploads', 'public');
        Refugee::create($request->validated() + [
            'photo' => $filepath
        ]);
        return redirect()->route('r_index')->with('message', $this->messageService->storeMessage($request->confirmed));
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
}