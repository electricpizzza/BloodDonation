<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function store(Request $request,User $user)
    {
        
       $post = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'image',
        ]);

        $user = \App\User::find(1);

        $user->caravan->posts()->create($post);

        return $post;
    }
}
