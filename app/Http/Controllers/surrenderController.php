<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\surrenderPostRequest;
use App\Appointment;

class surrenderController extends Controller
{
    //
    public function index(){

        return view('surrender');
    }

    public function store(surrenderPostRequest $request){

        
        $validated = $request->validated();
        // dd($validated);
        $data = array_merge($validated, ['appointment_type' => "Surrender"]);
// dd($data);
        $appointment = Appointment::create($data);
        return redirect('/')->with('success', 'Appointment Saved');
    }
}
