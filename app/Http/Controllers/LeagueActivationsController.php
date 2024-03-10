<?php

namespace App\Http\Controllers;


use App\Services\DataManageServices;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\CalculateServices;
use App\Services\ClubsServices;


class LeagueActivationsController extends Controller
{
    public CalculateServices $calculateService;
    public function __construct() {
        $this->calculateService = new CalculateServices();
    }



    public function index(): View
    {

        $this->calculateService->generateWeekes();

        $clubs = ClubsServices::getClubs();
        $weekCheck = DataManageServices::getData("match_1");

        return view('index',compact('clubs','weekCheck'));
    }


    public function nextWeek(int $week)
    {
        return response()->json($this->calculateService->nextWeek($week));
    }

    public function playAll(int $week)
    {
        return response()->json($this->calculateService->playAll($week));
    }
}
