<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TownController extends Controller
{
    public function index()
    {
        $towns = \App\Town::all();
        return view('ajax', ['towns'=>$towns]);
    }
}
