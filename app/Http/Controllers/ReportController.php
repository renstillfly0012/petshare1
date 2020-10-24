<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;
use App\Location;
use App\User;
use App\Notifications\ReportAppoved;
use App\Notifications\ReportDeclined;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
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
        
        // dd($data);
        $report = Report::create($data);
        // dd($data,$report,$lat,$lng);
        $location = new Location;
        $location->report_id = $report->id;
        $location->address = $report->address;
        $location->address_latitude = $lat;   
        $location->address_longitude = $lng;
        $location->save();
        
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
        $report->report_status == 'Approved' ? $user->notify(new ReportApproved())
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
        $report->report_status = 'Apprved';
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
}
