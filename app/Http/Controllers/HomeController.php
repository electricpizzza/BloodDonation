<?php

namespace App\Http\Controllers;

use App\BloodRequest;
use App\Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $content =[];
        $i=0;
        $requests = BloodRequest::where('city',auth()->user()->city)->latest()->paginate(5);
        foreach ($requests as $value) {
            $content[$i]['type']='request';
            $content[$i]['request']=$value;
            $content[$i]['created_at']= $value->created_at;
            $i++;
        }
        $events = Event::where('city',auth()->user()->city)->latest()->paginate(5);
        foreach ($requests as $value) {
            $content[$i]['type']='event';
            $content[$i]['request']=$value;
            $content[$i]['created_at']= $value->created_at;
            $i++;
        }
        //dd(array_multisort($content,'created_at','SORT_DESC'));
        return view('home',compact('requests'));
    }

    public function setting(User $user)
    {
        if ($user!=auth()->user()) {
            return redirect('home');
            }
        return view('settings',compact('user'));
    }

    public function planning(User $user)
    {
        if ($user!=auth()->user()) {
        return redirect('home');
        }
        return view('planning.planning',compact('user'));
    }
}
