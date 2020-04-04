<?php

namespace App\Http\Controllers;

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
        $requests = \App\BloodRequest::latest()->paginate(10);
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
