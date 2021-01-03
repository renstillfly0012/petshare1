<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Medical_Histories;
use App\Http\Requests\medhisPostRequest;
use App\Pet_Info;
use App\Pet;

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
        return response()->json($petinfos, 200);
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
    public function store(medhisPostRequest $request)
    {
        // dd($request->all());
        try{
        $validated = $request->validated();
        $medinfo = Medical_Histories::Create($validated);
        return response()->json($medinfo, 201);

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
        try{
        $medinfos = Medical_Histories::where('pet_id',$id)->get();                      
        // dd($medinfos[0]->pets);
        return response()->json($medinfos, 200);

        }catch(\Exception $error){
            return response()->json($error, 400);
        }
       
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

    public function viewPet($id){
        try{
        $petinfos = Pet_info::select('pet_owner_id', 'pet_id')
        ->where('pet_owner_id',$id)
        ->get()
        ->first();

        $pet = Pet::select('name','qrcodePath')
        ->where('id', $petinfos->pet_id)
        ->get()
        ->first();

        $datasForMyPet = ([
            'user_id' => $petinfos->pet_owner_id,
            'pet_id' => $petinfos->pet_id,
            'pet_name' => $pet->name,
            'pet_qrCode' => $pet->qrcodePath,
        ]);
        
        // dd($petinfos, $pet, $datasForMyPet);
        return response()->json($datasForMyPet, 200);

        }catch(\Exception $error){
            return response()->json($error, 400);
        }
    }
}
