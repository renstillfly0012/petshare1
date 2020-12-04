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
        if($request->hasFile('image') == true){
            // $user->image = $request->edit_image->getClientOriginalName();
           
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.SURRENDER_USER_ID_'.$request->user_id.'.'.$extension;
            // $filename = $file->getClientOriginalName();
            $image = $filename;
           
           
            // $data = array_merge($validated, ['image' => $filename]);
            $file->move('assets/images/surrendered', $filename);
            }
            $data = array_merge($validated, ['appointment_type' => "Surrender"], ['image' => $image]);
            // dd($data);
        $appointment = Appointment::create($data);
        return redirect('/')->with('success', 'Appointment Saved');
    }
}
