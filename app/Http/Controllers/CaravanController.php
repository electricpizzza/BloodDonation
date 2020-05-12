<?php

namespace App\Http\Controllers;

use App\BloodRequest;
use App\Caravan;
use App\User;
use Illuminate\Http\Request;

class CaravanController extends Controller
{
    public function index(Caravan $caravan)
    {
        $elements = [];
        $requests = $caravan->bloodRequests->all();
        $events = $caravan->events->all();
        $posts = $caravan->posts->all();
        return view('caravans.caravan',compact('caravan','elements'));
    }
    public function edit(Caravan $caravan)
    {
        return view('caravans.edit',compact('caravan'));
    }

    public function store(Request $request)
    {
        
       $caravan = $request->validate([
            'currentPosition'=>'',
            'city'=>'required',
            'staringTime'=>'required',
            'endingTime'=>'required',
        ]);

        $user = \App\User::find(1);
        
        $user->caravan()->create(array_merge($caravan,[
            "latestPosition"=>$caravan["currentPosition"]
        ]));

        return $caravan;
    }
}
