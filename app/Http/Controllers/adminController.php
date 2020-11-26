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

        //charts for users
        $settings1 = [
            'chart_title' => 'Roles',
            // 'report_type' => 'group_by_date',
            'report_type' => 'group_by_string',
            'model' => 'App\Role_User',
            // 'conditions'            => [
            //     ['name' => 'Administrators', 'condition' => 'role_id = 1', 'color' => '#D31B2E'],
            //     ['name' => 'Fosters', 'condition' => 'role_id = 2', 'color' => '#FDC370'],
            //     ['name' => 'Vets', 'condition' => 'role_id = 3', 'color' => '#1C4496'],
            // ],
            
            // 'group_by_field' => 'created_at',
            // 'group_by_period' => 'day',
           
            // 'continuous_time' => true,
            // 'chart_type' => 'line',

            // 'relationship_name' => 'roles',
            'group_by_field' => 'role_id',
            'chart_type' => 'pie',
        ];

        $chart1  = new LaravelChart($settings1);

        //charts for appointments
        $settings2 = [
            'chart_title' => 'Monthly Appointments',
            'report_type' => 'group_by_date',
            'model' => 'App\Appointment',
            'conditions'            => [
                ['name' => 'Adopted', 'condition' => 'appointment_type = "Adoption"', 'color' => '#FDC370'],
                ['name' => 'Surrendered', 'condition' => 'appointment_type = "Surrender"', 'color' => '#D31B2E'],
            ],
            
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'continuous_time' => true,
            'chart_type' => 'line',

        ];

        $chart2  = new LaravelChart($settings2);
        //charts for reports
        $settings3 = [
            'chart_title' => 'Weekly Incident Reports',
            'report_type' => 'group_by_date',
            'model' => 'App\Report',
            'conditions'            => [
                ['name' => 'Approved', 'condition' => 'report_status = "Apprved"', 'color' => '#1C4496'],
                ['name' => 'Disapproved', 'condition' => 'report_status = "Declined"', 'color' => '#D31B2E'],
                ['name' => 'Pending', 'condition' => 'report_status = "Pending"', 'color' => '#FDC370'],
            ],
            
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            
            'continuous_time' => true,
            'chart_type' => 'line',
        ];

        $chart3  = new LaravelChart($settings3);

        //charts for pets
        $settings4 = [
            'chart_title' => 'Breed',
            'report_type' => 'group_by_string',
            'model' => 'App\Pet',
            'group_by_field' => 'breed',
            'chart_type' => 'pie',
        ];

        $chart4  = new LaravelChart($settings4);

        

        if($notifications->count() > 0){
            foreach($notifications as $notification)
            {
                // if($notification->type == 'App\Notifications\newUserNotification' ){
                  
                //     toast('['.$notification->created_at.'] User: '.$notification->data['name'].'('.$notification->data['email'].
                //     ') has just registered.','success');
                // }
                if($notification->type == 'App\Notifications\newReportNotification')
                {
                    $reportName = User::where('id',$notification->data['user_id'])->get();
                    // dd('asd');
                    toast('Recent Notification: <br> ['.$notification->created_at.'] <br> User: '.$reportName->first()->name.' <br> Address: <br>('.$notification->data['address'].
                    ') ','warning');
                }
                        
                  
                
            }
            return view('admin.home',  compact('userCount', 'petCount', 'appointmentCount', 'reportCount', 'notifications', 'reportName', 'chart1', 'chart2', 'chart3', 'chart4'));
        }
        else{
            return view('admin.home',  compact('userCount', 'petCount', 'appointmentCount', 'reportCount', 'notifications', 'chart1', 'chart2', 'chart3', 'chart4'));
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
        $reports = Report::orderBy('id', 'desc')->with('user')->get();
        // dd($reports);
        $paginate = Report::paginate(5);
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
