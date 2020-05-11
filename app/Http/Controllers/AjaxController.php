<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function Create(Request $request)
    {
        $this->validate($request, [
            'city' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'people' => 'required',
        ]);
        
        
        $town = new \App\Town;
        $town->fill($request->all());
        $town->save();
    }
    
}
