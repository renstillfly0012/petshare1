<?php

namespace App\Http\Controllers;

use App\Report;
use App\Http\Requests\ReportRequest;
// use Request;
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
        $validated = $request->validated();
        //  dd($validated);
        if($request->hasFile('image') == true){
            // $user->image = $request->edit_image->getClientOriginalName();
           
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.USER_ID_'.$request->user_id.'.'.$extension;
            // $filename = $file->getClientOriginalName();
            // $request->image = $filename;
           
           
            // $data = array_merge($validated, ['image' => $filename]);
            $file->move('assets/images/reports/', $filename);
        }
        $data = array_merge($validated, ['image' => $filename]);
        $report = Report::create($data);
        // dd($report);
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
    public function edit(Report $report)
    {
        $report = Report::findorfail($id);
        $user = User::findorfail($report->user_id);
        // dd($user->email);
        // Mail::to($user->email)->send(new VerificationMail);
        $report->report_status == 'Approved' ? $user->notify(new ReportApproved())
        : $user->notify(new ReportDeclined());
       
        
        return redirect('/pets-requests')->with('success', 'Appointment Changes Request '.$id.' was Saved');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
