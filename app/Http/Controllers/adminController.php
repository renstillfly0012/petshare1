<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Request;
use Gate;
use App\User;
use App\Pet;
use App\Appointment;
use App\Report;
use Alert;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;



class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index($user)
    // {

    //    $user = User::find($user);
    //     return view('admin.home', [
    //         'user'  => $user,
    //     ]);
    // }

    // public function viewPets($user){
    //     $user = User::find($user);
    //     return view('admin.pet.pet',[
    //     'user'  => $user,
    // ]);
    // }

    // public function viewUsers($user){
    //     $user = User::find($user);
    //     return view('admin.user.user',[
    //         'user'  => $user,
    //     ]);
    // }

    // public function viewReports($user){
    //     $user = User::find($user);
    //     return view('admin.report.report',[
    //         'user'  => $user,
    //     ]);
    // }
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth', 'except' => []);
    }

    public function index()
    {
        if (Gate::denies('isAdmin')) {
            return redirect()->route('landing')->with('warning', 'Authorized person can only access this');
        }
        // dd(Location::get(Request::ip()));
        $userCount = User::count();
        $petCount = Pet::count();
        $appointmentCount = Appointment::count();
        $reportCount = Report::count();
        $notifications = auth()->user()->unreadNotifications()->get();
        // dd($notifications);
        // return view('admin.home')->with('userCount', $userCount);
      
        
        // $surrenderCount = array();
        // for($i=0;$i<32;$i++)
        // {
        //     $days = Appointment::whereDay('requested_date', $i)
        //     ->where('appointment_type', 'Surrender')
        //     ->get()
        //     ->count();
        //     array_push($surrenderCount, $days);
        // }
        
        // dd($surrenderCount);

            // dd($notifications);

        if($notifications->count() > 0){
            
            foreach($notifications as $notification)
            {
                // if($notification->type == 'App\Notifications\newUserNotification' ){
                  
                //     toast('['.$notification->created_at.'] User: '.$notification->data['name'].'('.$notification->data['email'].
                //     ') has just registered.','success');
                // }
                
                if($notification->type == 'App\Notifications\newReportNotification')
                {
                    
                    $reportName = Report::where('email',$notification->data['email'])
                    ->orderBy('created_at', 'desc')
                    ->get()->first();
                    // dd( $reportName);
                    toast('Recent Notification: <br> ['.$notification->created_at.'] <br> Email: '.$reportName->email.
                    ' <br> Mobile Number: <br>('.$notification->data['mobile_number'].
                    ' <br> Address: <br>('.$notification->data['address'].
                    ' <br> Report Type: <br>('.$notification->data['report_type'].

                    ') ','warning');
                }
                        
                  
                
            }
            return view('admin.home',  compact('userCount', 'petCount', 'appointmentCount', 'reportCount', 'notifications', 'reportName'));
        }
        else{
            return view('admin.home',  compact('userCount', 'petCount', 'appointmentCount', 'reportCount', 'notifications'));
        }
       
        
        
        
        // return redirect()->route('admin-landing');
    }
    public function  viewPets()
    {
      
        // return redirect()->route('pets');
    }
    public function viewUsers()
    {
       
    }
    public function viewReports()
    {
        if (Gate::denies('isAdmin')) {
            return redirect()->route('landing')->with('warning', 'Authorized person can only access this');;
        }
        elseif(request()->has('date')){
            
            $reports = Report::where('created_at','like',  '%'.request('date').'%')
            ->orderBy('id', 'desc')
            ->with('user')
            ->paginate(5)
            ->appends('date', request('date'));
   
            if($reports->count() == 0){
                return redirect('/reports')->with('toast_error', 'No data found');
            }
           

        }elseif(request()->has('type')){
            if(request()->has('text')){


                $reports = Report::where(request('type'),'like',  '%'.request('text').'%')
                ->orderBy('id', 'desc')
                ->with('user')
                ->paginate(5)
                ->appends('text', request('text'));
                
                if($reports->count() == 0){
                    return redirect('/reports')->with('toast_error', 'No data found');
                }
            }


        }elseif(request()->has('all')){
            $reports = Report::orderBy('id', 'desc')->with('user')->paginate(0);
        }else{
            $reports = Report::orderBy('id', 'desc')->with('user')->paginate(5);
        }
    
        return view('admin.report.report')->with('reports', $reports);
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
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        auth()->user()
            ->unreadNotifications
            ->when($id, function ($query) use ($id) {
                return $query->where('id', $id);
            })
            ->markAsRead();

        return response()->noContent();
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
