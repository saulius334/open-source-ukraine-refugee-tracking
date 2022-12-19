<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\RefugeeCampRepositoryInterface;
use App\Repositories\Interfaces\RefugeeRepositoryInterface;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __construct(
        private RefugeeRepositoryInterface $refugeeRepo,
        private RefugeeCampRepositoryInterface $campRepo
    ) {
    }

    public function index(): View
    {
        return view('home.home');
    }
    public function welcome(): View
    {
        return view('home.welcome', [
            'statisticTotal' => $this->refugeeRepo->refugeeCount(),
            'statisticToday' => $this->refugeeRepo->todayRegistered(),
            'statisticWeek' => $this->refugeeRepo->weekRegistered(),
            'statisticMonth' => $this->refugeeRepo->monthRegistered(),
        ]);
    }
    public function maps(): View
    {
        return view('home.maps', [
            'camps' => $this->campRepo->getAll(),
        ]);
    }
}
