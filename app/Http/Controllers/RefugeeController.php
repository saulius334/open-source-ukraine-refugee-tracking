<?php

namespace App\Http\Controllers;

use App\Enums\PaginateEnum;
use App\Models\Refugee;
use App\Models\RefugeeCamp;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreRefugeeRequest;
use App\Http\Requests\UpdateRefugeeRequest;
use App\Services\ImageServices\ImagePathService;
use App\Services\CampRefugeeCount\CampRefugeeUpdateCountService;

class RefugeeController extends Controller
{
    public function __construct(private ImagePathService $imagePathService)
    {
    }

    public function index()
    {
        return view('refugee.index', [
            'refugees' => Refugee::where('confirmed', 1)->paginate(PaginateEnum::Five)
        ]);
    }
    public function create(RefugeeCamp $camp)
    {
        return view('refugee.create', [
            'camps' => RefugeeCamp::all(),
            'campId' => $camp->id,
        ]);
    }
    
    public function store(StoreRefugeeRequest $request): RedirectResponse
    {
        Refugee::create($request->validated());
        return redirect()->route('r_index')->with('message', 'Refugee created successfully!');
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
            'camps' => RefugeeCamp::all(),
            'campID' => $refugee->current_refugee_camp_id
        ]);
    }

    public function update(UpdateRefugeeRequest $request, Refugee $refugee): RedirectResponse
    {
        $imagePath = $this->imagePathService->updateImageAndGetPath($refugee, $request->photo);
        $countService = new CampRefugeeUpdateCountService($refugee);
        $countService->updateCount($request);
        $refugee->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'IdNumber' => $request->IdNumber,
            'current_refugee_camp_id' => $request->current_refugee_camp_id,
            'photo' => $imagePath,
            'pets' => $request->pets,
            'destination' => $request->destination,
            'aidReceived' => $request->aidReceived,
            'healthCondition' => $request->healthCondition,
            'bedsTaken' => $request->bedsTaken,
        ]);
        return redirect()->route('r_index')->with('message', 'Refugee updated successfully!');
    }
    public function destroy(Refugee $refugee)
    {
        $refugee->delete();
        return redirect()->route('r_index')->with('message', 'Deleted Successfully');
    }
}
