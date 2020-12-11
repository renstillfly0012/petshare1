<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use App\Location;
use App\User;
use App\Notifications\ReportApproved;
use App\Notifications\ReportDeclined;
use App\Events\ReportCreated;
use Notification;
use App\Notifications\newReportNotification;
use Gate;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        $map = geoip()->getLocation(\Request::ip());
        // dd($map);
        return view('report_incident')->with('map', $map);
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
    public function store(ReportRequest $request)
    {
        // dd($request->all());
        
        $lat = $request->address_lat;
        $lng = $request->address_lng;
        // dd($lat+$lng);
        // dd($request->validate($rules));
        if($request->hasFile('image') == true){
            // $user->image = $request->edit_image->getClientOriginalName();
            $validated = $request->validated();
            // dd($validated);
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.USER_ID_'.$request->user_id.'.'.$extension;
            // $filename = $file->getClientOriginalName();
            // $request->image = $filename;
           
           
            // $data = array_merge($validated, ['image' => $filename]);
            $file->move('assets/images/reports/', $filename);
            $data = array_merge($validated, ['image' => $filename]);
          
        }
        
       
        $report = Report::create($data);
        // dd($data,$report,$lat,$lng);
        // event(new ReportCreated($report));

        $admins = User::where('role_id', 1)->get();

        Notification::send($admins, new newReportNotification($report));

        $location = new Location;
        $location->report_id = $report->id;
        $location->address = $report->address;
        $location->address_latitude = $lat;   
        $location->address_longitude = $lng;
        // dd(sendNewReportNotification::class);
        $location->save();

        // $admins = User::where('role_id', 1)->get();

        // Notification::send($admins, new newReportNotification($report));

        
        // dd($data,$report,$location);
        return redirect('/')->with('success', 'Your Report has been submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = Report::findorfail($id);
       
        $user = User::findorfail($report->user_id);
        // $report->report_status =
        // dd($user->email);
        // Mail::to($user->email)->send(new VerificationMail);
        // dd($user->notify(new ReportApproved()));
        $report->report_status == 'Responded' ? $user->notify(new ReportApproved())
        : $user->notify(new ReportDeclined());
       
        
        return redirect('/reports')->with('toast_success', 'Report Changes '.$id.' was Saved');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $report = Report::findOrFail($id);
        $report->report_status = 'Responded';
        $report->save();

        return redirect('/')->with('toast_success', 'Report Changes '.$id.' was Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $report = Report::findOrFail($id);
        $report->report_status = 'Declined';
        $report->save();
      
        return redirect('/incident')->with('success', 'Report Changes '.$id.' was Saved');
        
       
    }

    public function printPDF(){
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


        }else{
            $reports = Report::orderBy('id', 'desc')->with('user')->paginate(5);
        }
    
        return view('admin.prints.report')->with('reports', $reports);
    }
}
