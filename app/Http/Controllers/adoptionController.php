<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Gate;
use App\Pet;
use App\Appointment;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AppointmentApproved;
use App\Notifications\AppointmentDeclined;





class adoptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
      
    }
    public function index()
    {
        if (Gate::denies('isAdmin')) {
            return redirect()->route('landing')->with('warning', 'Authorized person can only access this');
        }
        // $appointments = Appointment::all();

        $appointments = Appointment::with('user', 'pet')->get();
        

        // dd($appointments);
    
        return view('admin.pet.request')->with('appointments', $appointments);
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
        //
        $validator = Validator::make($request->all(),[
            'show_user_id' => ['required', 'integer', 'max:255'],
            'show_pet_id' => ['required', 'integer', 'max:255'],
            'show_requested_date' => 'required',
         ]);

         $appointment = new Appointment;
         $appointment->user_id = $request->input('show_user_id');
         $appointment->requested_pet_id = $request->input('show_pet_id');
         $appointment->requested_date = $request->input('show_requested_date');
         $appointment->appointment_type = "Adoption";
        // dd($appointment);
         $appointment->save();

         return redirect('/')->with('success', 'Appointment Saved');
      
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
        $appointment = Appointment::findorfail($id);
        $user = User::findorfail($appointment->user_id);
        // dd($user->email);
        // Mail::to($user->email)->send(new VerificationMail);
        $appointment->appointment_status == 'Approved' ? $user->notify(new AppointmentApproved())
        : $user->notify(new AppointmentDeclined());
       
        
        return redirect('/reports')->with('success', 'Appointment Changes Request '.$id.' was Saved');

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
        $appointment = Appointment::findOrFail($id);
        $appointment->appointment_status = 'Approved';
        $appointment->save();
        $user = User::findorfail($id);
        dd($user);
        // Mail::to($user->email)->send(new VerificationMail);
        // ;
        return redirect('/')->with('success', 'Appointment Changes Request '.$id.' was Saved');
      
    }

  

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $appointment = Appointment::findOrFail($id);
        $appointment->appointment_status = 'Declined';
        $appointment->save();
    
        return redirect('/')->with('success', 'Appointment Changes Request '.$id.' was Saved');
        
       
    }



}
