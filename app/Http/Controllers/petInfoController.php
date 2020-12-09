<?php

namespace App\Http\Controllers;

use App\Pet_Info;
use Illuminate\Http\Request;
use App\Medical_Histories;
use App\Http\Requests\medhisPostRequest;
use App\User;
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


        if(request()->has('type') && request()->has('text')){
      
            // dd(request('type'),request('text'));
            if(request('type') == 'name'){
                $user = User::where(request('type'),'like',  '%'.request('text').'%')
                ->pluck('id')
                ->first();
                
             
                // dd($user);


               $petinfos = Pet_Info::where('pet_owner_id', $user)
               ->orderBy('id', 'desc')
               ->with('user')
               ->paginate(5);


            //    dd($petinfos);
               
            }else{
                $pet = Pet::where('name','like',  '%'.request('text').'%')
                ->pluck('id')
                ->all();
                dd($pet);

                $petinfos = Pet_Info::where(request('type'), $pet)
               ->orderBy('id', 'desc')
               ->with('pets')
               ->paginate(5);

                   dd($petinfos);
            }
           
            
            if($petinfos->count() == 0){
                return redirect('/pethealth')->with('toast_error', 'No data found');
            }
        

        }else{
            $petinfos = Pet_Info::paginate(5);
        }
    
        // dd($petinfos[0]->users->name);
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
    public function store(medhisPostRequest $request)
    {
        // dd($request->validated(), $request->medhis_date);
        $validated = $request->validated();

        // $validator = Validator::make($request->all(),[
        //     'edit_pet_name' => ['required', 'string', 'max:255'],
        //      'edit_pet_age' => ['required', 'integer', 'max:20', 'min:0'],
        //       'edit_pet_breed' => ['required', 'string', 'max: 20'],
        //       'edit_pet_description' => ['required', 'string', 'max:255'],
        //  ]);

        
        $medinfo = Medical_Histories::Create($validated);
        // dd($medinfo);
        return redirect('/pethealth/all')->with('toast_success', 'New Medical Record has been Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PetInfo  $petInfo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medinfos = Medical_Histories::where('pet_id',$id)->get();
        // dd($medinfos[0]->pets);
        return view('admin.pet-health.view')->with('medinfos', $medinfos);
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
