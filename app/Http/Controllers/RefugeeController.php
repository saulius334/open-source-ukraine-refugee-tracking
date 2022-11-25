<?php

namespace App\Http\Controllers;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use App\Services\ImageServices\ImagePathService;
use App\Http\Requests\StoreRefugeeRequest;
use App\Http\Requests\UpdateRefugeeRequest;
use App\Services\CampRefugeeCount\CampRefugeeUpdateCountService;
use Illuminate\Http\RedirectResponse;

class RefugeeController extends Controller
{
    public function __construct(private ImagePathService $imagePathService)
    {
    }

    public function index()
    {
        return view('refugee.index', [
            'refugees' => Refugee::latest()->paginate(15)
        ]);
    }
    public function create(RefugeeCamp $camp)
    {
        if (!$camp->id) {
            return redirect()->back()->with('message', 'Create a refugee camp first before adding refugees!');
        } else {
            return view('refugee.create', [
                'camp' => $camp,
                'camps' => RefugeeCamp::all(),
                'campId' => $camp->id
            ]);
        }
    }
    public function store(StoreRefugeeRequest $request): RedirectResponse
    {
        $imagePath = $this->imagePathService->storeImageAndGetPath($request->photo);

        Refugee::create([
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
