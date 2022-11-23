<?php

namespace App\Http\Controllers;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use App\Services\ImagePathService;
use App\Http\Requests\StoreRefugeeRequest;
use App\Http\Requests\UpdateRefugeeRequest;
use App\Services\CampRefugeeCount\CampRefugeeUpdateCountService;

class RefugeeController extends Controller
{
    public function index()
    {
       return view('refugee.index', [
        'refugees' => Refugee::orderBy('updated_at', 'desc')->paginate(15)
       ]);
    }
    public function create(RefugeeCamp $camp)
    {
        if ($camp->id == null) {
            return redirect()->back()->with('message', 'Create a refugee camp first before adding refugees!');
        } else {
             return view('refugee.create', [
            'camp' => $camp,
            'camps' => RefugeeCamp::all(),
            'campId' => $camp->id
        ]);
        }
    }
    public function store(StoreRefugeeRequest $request, ImagePathService $imagePathService)
    {
        $imagePath = $imagePathService->saveAndGeneratePath($request->photo);

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
       
        return redirect()->route('r_index');
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

    public function update(
        UpdateRefugeeRequest $request,
        Refugee $refugee,
        ImagePathService $imagePathService,
        CampRefugeeUpdateCountService $countService
      )
    {
        $imagePath = $imagePathService->saveOrReturnOldPath($refugee, $request->photo);
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
        $countService->updateCount($refugee, $request);
        return redirect()->route('r_index');
    }

    public function destroy(Refugee $refugee)
    {
        $refugee->delete();
        return redirect()->route('r_index')->with('message', 'Deleted Successfully');
    }
}
