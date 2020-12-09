<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\ReportRequest;
use App\Location;
use App\User;
use App\Report;
use App\Notifications\ReportAppoved;
use App\Notifications\ReportDeclined;
use App\Events\ReportCreated;
use Notification;
use App\Notifications\newReportNotification;

class reportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $reports = Report::paginate(5);
            return response()->json($reports, 200);
    
            }catch(\Exception $error){
            return response()->json($error, 400);
            }
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

        
        try{

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
         // dd($request->mobile_number);
        // $data1 = array_merge($data, ['mobile_number' => $request->mobile_number]);
        // dd($data);
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
            
            return response()->json($report, 201);
    
            }catch(\Exception $error){
            return response()->json($error, 400);

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
