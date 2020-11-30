<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CmsRequest;
use App\Content;

class cmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $contents = Content::paginate(5);
        return view('admin.cms.pages')->with('contents', $contents);
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
        
        // dd($cms = $request);
        $cms = Content::findorfail($id);
        // dd($cms);
        
        $cms->content_section = $request->edit_content_section;
        $cms->content_title = $request->edit_content_title;
        $cms->content_text = $request->edit_content_text;
        $cms->content_description = $request->edit_content_description;
        $cms->content_date = $request->edit_content_date;
        if($request->hasFile('edit_image') == true){
            // $user->image = $request->edit_image->getClientOriginalName();
           
            $file = $request->edit_image;
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.CONTENT_ID_'.$cms->id.'.'.$extension;
            // $filename = $file->getClientOriginalName();
            $cms->content_image = $filename;
           
            // dd($cms);
            // $data = array_merge($validated, ['image' => $filename]);
            $file->move('assets/images/', $filename);
            }
        // dd($cms);
        $cms->save();
        return redirect('/cms')->with('toast_success', "Changes to the row's Data has been Saved");
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
