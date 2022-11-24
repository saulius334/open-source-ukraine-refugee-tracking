<?php

namespace App\Http\Controllers;

use App\Models\RefugeeCamp;
use App\Models\OutsideRequest;
use App\Services\ImageServices\ImagePathService;
use App\Http\Requests\StoreOutsideRequestRequest;

class OutsideRequestController extends Controller
{
    private ImagePathService $imagePathService;
    public function __construct()
    {
        $this->imagePathService = new ImagePathService();
    }
    public function index()
    {
        return view('request.index', [
            'outsideRequests' => OutsideRequest::latest()->paginate(15),
        ]);
    }

    public function create(RefugeeCamp $camp)
    {
        return view('request.create',[
            'campId' => $camp->id,
            'camps' => RefugeeCamp::all(),
        ]);
    }

    public function store(StoreOutsideRequestRequest $request)
    {
        $imagePath = $this->imagePathService->saveAndGeneratePathOrReturnOldPath($request->photo);

        OutsideRequest::create([
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
        return redirect()->route('c_index')->with('message', 'Request sent');
    }

    public function show(OutsideRequest $outsideRequest)
    {
        return view('request.show',[
            'outsideRequest' => $outsideRequest,
            'camps' => RefugeeCamp::all()
        ]);
    }

    public function destroy(OutsideRequest $outsideRequest)
    {
        $outsideRequest->delete();
        return redirect()->route('req_index');
    }
}
