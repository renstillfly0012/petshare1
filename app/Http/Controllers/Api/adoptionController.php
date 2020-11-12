<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        $validator = Validator::make($request->all(),[
            'show_user_id' => ['required', 'integer', 'max:255'],
            'show_pet_id' => ['required', 'integer', 'max:255'],
            'show_requested_date' => 'required',
         ]);

         if ($validator->fails()) {
         
            return $validator->messages()->all();
        } 

         $appointment = new Appointment;
         $appointment->user_id = $request->input('show_user_id');
         $appointment->requested_pet_id = $request->input('show_pet_id');
         $appointment->requested_date = $request->input('show_requested_date');
         $appointment->appointment_type = "Adoption";
        // dd($appointment);
         $appointment->save();

         return response()->json($appointment, 201);

        }catch(\Exception $error){
               return response()->json($appointment, 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
