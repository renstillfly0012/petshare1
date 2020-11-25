<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Medical_Histories;
use App\Http\Requests\medhisPostRequest;
use App\Pet_Info;

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
        try{
<<<<<<< HEAD
            $validated = $request->validated();
            $medinfo = Medical_Histories::Create($validated);
            return response()->json($medinfo, 201);
    
            }catch(\Exception $error){
                   return response()->json($error, 400);
            }
=======
        $validated = $request->validated();
        $medinfo = Medical_Histories::Create($validated);
        return response()->json($medinfo, 201);

        }catch(\Exception $error){
               return response()->json($error, 400);
        }

>>>>>>> newhead
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
<<<<<<< HEAD
            $medinfos = Medical_Histories::where('pet_id',$id)->get();
            // dd($medinfos[0]->pets);
            return response()->json($medinfos, 200);
    
        }catch(\Exception $error){
            return response()->json($error, 400);
        }
=======
        $medinfos = Medical_Histories::where('pet_id',$id)->get();
        // dd($medinfos[0]->pets);
        return response()->json($medinfos, 200);

    }catch(\Exception $error){
        return response()->json($error, 400);
    }
       
>>>>>>> newhead
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
