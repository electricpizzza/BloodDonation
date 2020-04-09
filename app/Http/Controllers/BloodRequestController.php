<?php

namespace App\Http\Controllers;

use App\Notifications\InNotif;
use App\User;
use Illuminate\Http\Request;

use DateTime;

class BloodRequestController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index($postid) {
        $request = \App\BloodRequest::find($postid);
        return view('request.request',compact('request'));
    }
   

    public function store()
    {
        $request = request()->validate([
            "bloodType" => "required",
            "city" => "required",
            "address" => "required",
            "deadline" => "required",
            "description" => "required"
        ]);
        $deadline = new DateTime($request['deadline']);
         auth()->user()->bloodRequests()->create(array_merge($request,[
            $request["deadline"] => $deadline,
         ]));
         $users = \DB::table('users')->where('city',$request['city'])->where('id','!=',auth()->user()->id)->get();
         if($users->count()!=0)
          foreach ($users as $user) {
             $usr = User::find($user->id);
             $usr->notify(new InNotif(auth()->user()->bloodRequests()->latest()->first(),auth()->user()));
          }
         


       return redirect('home');
    }

    public function create()
    {
        return view("request.create");
    }
}
