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
use App\Http\Requests\adoptRequest;
use App\Rules\Recaptcha;




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

       
        // $pagination = Appointment::paginate(5);

        if(request()->has('type')){
            
            $appointments = Appointment::where('appointment_type', request('type'))
            ->orderBy('id', 'desc')
            ->with('user', 'pet')
            ->paginate(request('page'))
            ->appends('type', request('type'));
            // dd($appointments);
            if($appointments->count() == 0){
                return redirect('/pets-requests')->with('toast_error', 'No data found');
            }

        }elseif(request()->has('date')){
            
            $appointments = Appointment::where('requested_date','like',  '%'.request('date').'%')
            ->orderBy('id', 'desc')
            ->with('user', 'pet')
            ->paginate(5)
            ->appends('date', request('date'));
            // dd($appointments);
            if($appointments->count() == 0){
                return redirect('/pets-requests')->with('toast_error', 'No data found');
            }
           

        }elseif(request()->has('status')){
            
            $appointments = Appointment::where('appointment_status', request('status'))
            ->orderBy('id', 'desc')
            ->with('user', 'pet')
            ->paginate(5)
            ->appends('status', request('status'));
            if($appointments->count() == 0){
                return redirect('/pets-requests')->with('toast_error', 'No data found');
            }

        }elseif(request()->has('all')){
            $appointments = Appointment::orderBy('id', 'desc')->with('user', 'pet')->paginate(0);
        }else{
            $appointments = Appointment::orderBy('id', 'desc')->with('user', 'pet')->paginate(5);
        }
        


        // dd($appointments->pet);
    
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
    public function store(adoptRequest $request)
    {
        
        // $validator = Validator::make($request->all(),[
        //     'show_user_id' => ['required', 'integer', 'max:255'],
        //     'show_pet_id' => ['required', 'integer', 'max:255'],
        //     'show_requested_date' => 'required|date',
        //     'g_recaptcha-response' => 'required', new Recaptcha(),
        //  ]);
        // $validated = $request->validated();
        //  dd($request->all(),  $validated);
         
        
         $userName = User::where('id', $request->show_user_id)
         ->pluck('name')
         ->first();

         $appointment = new Appointment;
         $appointment->name = $userName;
         $appointment->user_id = $request->show_user_id;
         $appointment->requested_pet_id = $request->show_pet_id;
         $petImage = Pet::where('id', $request->show_pet_id)
         ->pluck('image')
         ->first();    
         $appointment->image = $petImage;

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

        // dd($appointment->appointment_status);
   
        $appointment->appointment_status == 'Approved' ? $user->notify(new AppointmentApproved())
        : $user->notify(new AppointmentDeclined());
        
        
        return redirect('/pets-requests')->with('toast_success', 'Appointment Changes Request '.$id.' was Saved');

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
        
       
        // dd($user);
        // Mail::to($user->email)->send(new VerificationMail);
        // ;
        return redirect('/')->with('toast_success', 'Appointment Changes Request '.$id.' was Saved');
      
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
      
        return redirect('/pets-requests')->with('toast_success', 'Appointment Changes Request '.$id.' was Saved');
        
       
    }

    public function printPDF(){

        if (Gate::denies('isAdmin')) {
            return redirect()->route('landing')->with('warning', 'Authorized person can only access this');
        }
        // $appointments = Appointment::all();

       
        // $pagination = Appointment::paginate(5);

       
        if(request()->has('type')){
            
            $appointments = Appointment::where('appointment_type', request('type'))
            ->orderBy('id', 'desc')
            ->with('user', 'pet')
            ->paginate(5)
            ->appends('type', request('type'));
            // dd($appointments);

        }elseif(request()->has('type') && request()->has('date')){
            
            $appointments = Appointment::where('requested_date','like',  '%'.request('date').'%')
            ->where('appointment_type', request('type'))
            ->orderBy('id', 'desc')
            ->with('user', 'pet')
            ->paginate(5)
            ->appends('date', request('date'));
            dd($appointments);

        }elseif(request()->has('date')){
            
            $appointments = Appointment::where('requested_date','like',  '%'.request('date').'%')
            ->orderBy('id', 'desc')
            ->with('user', 'pet')
            ->paginate(5)
            ->appends('date', request('date'));
            // dd($appointments);

        }elseif(request()->has('status')){
            
            $appointments = Appointment::where('appointment_status', request('status'))
            ->orderBy('id', 'desc')
            ->with('user', 'pet')
            ->paginate(5)
            ->appends('status', request('status'));

        }elseif(request()->has('all')){
            $appointments = Appointment::orderBy('id', 'desc')->with('user', 'pet')->paginate(0);
        }else{
            $appointments = Appointment::orderBy('id', 'desc')->with('user', 'pet')->paginate(5);
        }
    


        // dd($appointments->pet);
    
        return view('admin.prints.appointments')->with('appointments', $appointments);

    }



}
