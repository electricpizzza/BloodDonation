<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'type'=>'required',
            'address'=>'required',
            'city'=>'required',
        ]);
        auth()->user()->potes()->create($request->all());
    }
}
