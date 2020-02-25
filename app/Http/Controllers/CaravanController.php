<?php

namespace App\Http\Controllers;

use App\Caravan;
use App\User;
use Illuminate\Http\Request;

class CaravanController extends Controller
{
    public function index(Caravan $caravan)
    {
        dd($caravan->id);
        return view('caravan.caravan',compact('caravan'));
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
        //dd($user,$caravan);
        $user->caravan()->create(array_merge($caravan,[
            "latestPosition"=>$caravan["currentPosition"]
        ]));

        return $caravan;
    }
}
