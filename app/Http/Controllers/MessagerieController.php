<?php

namespace App\Http\Controllers;

use App\BloodRequest;
use Illuminate\Http\Request;

class MessagerieController extends Controller
{
    public function index()
    {
        $conversations=[];
        $bloodrequests = auth()->user()->bloodRequests()->get();
        foreach ($bloodrequests as $bloodrequest) 
            array_push($conversations,$bloodrequest->conversations()->latest()->get());          
        $inboxMsg = auth()->user()->conversations()->get();


        return view("messagerie",compact('bloodrequests','inboxMsg'));
    }

    public function respond(BloodRequest $blood_request_id)
    {
        $message = request()->validate([
            "message" => "required"
        ]);

        $conversations =  $blood_request_id->conversations()->create([
             "user_id"=>auth()->user()->id,
         ]);
         $conversations->messages()->create([
            "user_id"=>auth()->user()->id,
            "message"=>$message["message"]
         ]);
        return redirect('inbox');

    }
}
