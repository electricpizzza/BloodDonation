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
        $elments =  $caravan
        ->join('blood_requests','blood_requests.caravan_id','=','caravans.id')
        ->join('events','events.caravan_id','=','caravans.id')
        //->join('posts','posts.caravan_id','=','caravans.id')
        ->select('blood_requests.*','events.*')
        ->get();
        return view('caravans.caravan',compact('caravan','elments'));
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
