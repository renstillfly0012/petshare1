<?php

namespace App\Http\Controllers;

use App\Pet_Info;
use Illuminate\Http\Request;
use App\Medical_Histories;

class petInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petinfos = Pet_Info::paginate(5);
        // dd($petinfos[0]);
        return view('admin.pet-health.all')->with('petinfos', $petinfos);
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
     * @param  \App\PetInfo  $petInfo
     * @return \Illuminate\Http\Response
     */
    public function show(PetInfo $petInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PetInfo  $petInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(PetInfo $petInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PetInfo  $petInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PetInfo $petInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PetInfo  $petInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(PetInfo $petInfo)
    {
        //
    }
}
