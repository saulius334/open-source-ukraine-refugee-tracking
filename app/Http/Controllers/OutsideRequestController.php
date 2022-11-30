<?php

namespace App\Http\Controllers;

use App\Models\RefugeeCamp;
use App\Models\OutsideRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\ImageServices\ImagePathService;
use App\Http\Requests\StoreOutsideRequestRequest;
use App\Models\Refugee;

class OutsideRequestController extends Controller
{
    public function __construct(private ImagePathService $imagePathService)
    {
    }

    public function index(): View
    {
        return view('request.index', [
            'outsideRequests' => OutsideRequest::latest()->paginate(15),
        ]);
    }

    public function create(RefugeeCamp $camp): View
    {
        return view('request.create', [
            'campId' => $camp->id,
            'camps' => RefugeeCamp::all(),
        ]);
    }

    public function store(StoreOutsideRequestRequest $request): RedirectResponse
    {
        $imagePath = $this->imagePathService->storeImageAndGetPath($request->photo);

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

    public function show(OutsideRequest $outsideRequest): View
    {
        return view('request.show', [
            'outsideRequest' => $outsideRequest,
            'camps' => RefugeeCamp::all()
        ]);
    }

    public function storeRefugeeAndDeleteRequest(OutsideRequest $outsideRequest, StoreOutsideRequestRequest $request): RedirectResponse
    {
        $imagePath = $this->imagePathService->updateImageAndGetPath($outsideRequest, $request->photo);

        DB::transaction(function () use ($request, $outsideRequest, $imagePath) {
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

            $outsideRequest->delete();
        });

        return redirect()->route('r_index')->with('message', 'Refugee created successfully!');
    }

    public function destroy(OutsideRequest $outsideRequest): RedirectResponse
    {
        $outsideRequest->delete();
        return redirect()->route('req_index');
    }
}
