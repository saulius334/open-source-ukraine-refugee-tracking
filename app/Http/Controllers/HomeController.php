<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;
use Illuminate\Contracts\View\View;
use App\Services\Shared\Statistics\RefugeeStatistics;

class HomeController extends Controller
{
    public function __construct(
        private RefugeeStatistics $refugeeStatistics,
        private RefugeeCampRepositoryInterface $campRepo
        )
    {
    }

    public function index(): View
    {
        return view('home.home');
    }
    public function welcome(): View
    {
        return view('home.welcome', [
            'statisticTotal' => $this->refugeeStatistics->total(),
            'statisticToday' => $this->refugeeStatistics->todayRegistered(),
            'statisticWeek' => $this->refugeeStatistics->weekRegistered(),
            'statisticMonth' => $this->refugeeStatistics->monthRegistered(),
        ]);
    }
    public function maps(): View
    {
        return view('home.maps',[
            'locations' => $this->campRepo->getAllLocations()
        ]);
    }
}
