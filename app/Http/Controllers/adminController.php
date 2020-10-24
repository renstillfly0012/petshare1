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
        foreach($notifications as $notification)
        {
            toast('['.$notification->created_at.'] User: '.$notification->data['name'].'('.$notification->data['email'].
            ') has just registered.','success');
          
        }
        
        
        return view('admin.home',  compact('userCount', 'petCount', 'appointmentCount', 'reportCount', 'notifications'));
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
        $reports = Report::with('user')->get();
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
