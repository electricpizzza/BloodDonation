<?php

namespace App\Http\Controllers;

use App\Association;
use Illuminate\Http\Request;

class AssociationController extends Controller
{
    public function index(Association $association)
    {
        return view("association.association",compact('association'));
    }
}
