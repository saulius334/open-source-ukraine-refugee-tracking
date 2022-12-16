<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use App\Services\Shared\Statistics\RefugeeStatistics;

class HomeController extends Controller
{
    public function __construct(private RefugeeStatistics $refugeeStatistics)
    {
    }

    public function index(): View
    {
        return view('home');
    }
    public function statistics(): View
    {
        return view('statistics', [
            'statisticTotal' => $this->refugeeStatistics->total(),
            'statisticToday' => $this->refugeeStatistics->todayRegistered(),
            'statisticWeek' => $this->refugeeStatistics->weekRegistered(),
            'statisticMonth' => $this->refugeeStatistics->monthRegistered(),
        ]);
    }
}
