<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;



class BloodRequestController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function store()
    {
        $request = request()->validate([
            "bloodType" => "required",
            "city" => "required",
            "address" => "required",
            "nbMax" => "required|int",
            "description" => "required"
        ]);

        auth()->user()->bloodRequests()->create($request);
       return redirect('home');
    }

    public function create()
    {
        return view("request.create");
    }
}
