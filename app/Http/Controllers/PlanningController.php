<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;

class PlanningController extends Controller
{
    public function index()
    {
        $user= auth()->user();
        $planning = $user->planning;
        return view('planning.planning',compact('user','planning'));
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            "bloodType"=>"string|required",
            "city"=>"string|required",
            "latestDonation"=>"date|required",
            "timePeriod"=>"int|required",
        ]);
        $user= auth()->user();
        $latestDonation = new DateTime();
        $latestDonation->modify('-'.$data["timePeriod"].'month');
        $planning = $user->planning()->create([
            "latestDonation"=>$data["latestDonation"]?:$latestDonation,
            "timePeriod"=>$data["timePeriod"],
        ]);
        return redirect('/planning');
    }
}
