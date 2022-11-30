<?php

namespace App\Http\Controllers;

use App\Models\Refugee;
use App\Models\RefugeeCamp;
use Illuminate\Http\Request;
use App\Models\OutsideRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Services\ImageServices\ImagePathService;
use App\Http\Requests\StoreOutsideRequestRequest;

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
        OutsideRequest::create($request->validated());
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
        // $imagePath = $this->imagePathService->updateImageAndGetPath($outsideRequest, $request->photo);
        // dd($outsideRequest->photo);
        DB::transaction(function () use ($request, $outsideRequest) {
            Refugee::create($request->validated() + [
                'photo' => $outsideRequest->photo
            ]);

            $outsideRequest->delete();
        });

        return redirect()->route('r_index')->with('message', 'Refugee created successfully!');
    }

    public function destroy(OutsideRequest $outsideRequest): RedirectResponse
    {
        $this->imagePathService->unlink($outsideRequest->photo);
        $outsideRequest->delete();
        return redirect()->route('req_index');
    }
}
