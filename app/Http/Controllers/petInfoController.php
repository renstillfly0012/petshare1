<?php

namespace App\Http\Controllers;

use App\Pet_Info;
use Illuminate\Http\Request;
use App\Medical_Histories;
use App\Http\Requests\medhisPostRequest;
use App\Http\Requests\petInfoEditRequest;
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
                if(request('text') == 'None'){
                    $petinfos = Pet_Info::where('pet_owner_id', Null)
                    ->orderBy('id', 'desc')
                   ->with('user')
                   ->paginate(5); 
                }else{
                    $user = User::where(request('type'),'like',  '%'.request('text').'%')
                    ->pluck('id');

                $petinfos = Pet_Info::whereIn('pet_owner_id', $user)
                ->orderBy('id', 'desc')
               ->with('user')
               ->paginate(5); 
                }
               
                
             
                // dd($petinfos);
                
                
              
            //    dd($user,$petinfos);
            
            }else{

                $pet = Pet::where('name','like',  '%'.request('text').'%')
                ->pluck('id');

                $petinfos = Pet_Info::whereIn(request('type'), $pet)
               ->orderBy('id', 'desc')
               ->with('pets','user')
               ->paginate(5);

               

                // dd($pet,$petinfos);
            }
           
        
            if($petinfos->count() == 0){
                return redirect('/pethealth/all')->with('toast_error', 'No data found');
            }
        

        }elseif(request()->has('all')){
            $petinfos = Pet_Info::paginate(0);
        }else{
            $petinfos = Pet_Info::paginate(5);
        }

        $users = User::all();
    
        // dd($petinfos[0]->users->name);
        return view('admin.pet-health.all', compact('petinfos','users'));
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
        if(request()->has('date')){
            
            $medinfos = Medical_Histories::where('pet_id',$id)
            ->where('created_at','like',  '%'.request('date').'%')
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->appends('date', request('date'));
            // dd($donations);
            if($medinfos->count() == 0){
                return redirect('/pethealth/view/'.$id)->with('toast_error', 'No data found');
            }
           

        }else{
            $medinfos = Medical_Histories::where('pet_id',$id)
            ->orderBy('id', 'desc')
            ->paginate(5);
        }
   
        // dd($medinfos);
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
    public function update(petInfoEditRequest $request, $id)
    {
        $petInfo = Pet_Info::findorfail($id);
        if($request->pet_owner_id == "null"){
            $request->pet_owner_id = null;
        }
        $petInfo->pet_owner_id = $request->pet_owner_id;
        $petInfo->pet_allergies = $request->pet_allergies;
        $petInfo->pet_existing_conditions = $request->pet_existing_conditions;
        // dd($petInfo, $request->validated());
        $petInfo->save();
       
        return redirect('/pethealth/all')->with('toast_success', 'New Medical Record has been Edited');
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

    public function printPDF(){

        if(request()->has('type') && request()->has('text')){
      
            // dd(request('type'),request('text'));
            if(request('type') == 'name'){
                if(request('text') == 'None'){
                    $petinfos = Pet_Info::where('pet_owner_id', Null)
                    ->orderBy('id', 'desc')
                   ->with('user')
                   ->paginate(5); 
                }else{
                    $user = User::where(request('type'),'like',  '%'.request('text').'%')
                    ->pluck('id');

                $petinfos = Pet_Info::whereIn('pet_owner_id', $user)
                ->orderBy('id', 'desc')
               ->with('user')
               ->paginate(5); 
                }
               
                
             
                // dd($petinfos);
                
                
              
            //    dd($user,$petinfos);
            
            }else{

                $pet = Pet::where('name','like',  '%'.request('text').'%')
                ->pluck('id');

                $petinfos = Pet_Info::whereIn(request('type'), $pet)
               ->orderBy('id', 'desc')
               ->with('pets','user')
               ->paginate(5);

               

                // dd($pet,$petinfos);
            }
           
            
            if($petinfos->count() == 0){
                return redirect('/pethealth')->with('toast_error', 'No data found');
            }
        

        }elseif(request()->has('all')){
            $petinfos = Pet_Info::paginate(0);
        }else{
            $petinfos = Pet_Info::paginate(5);
        }
    
        // dd($petinfos[0]->users->name);
        return view('admin.prints.pethealth')->with('petinfos', $petinfos);

    }

    public function printPDFofMedhis($id)
    {
      
        if(request()->has('date')){
            
            $medinfos = Medical_Histories::where('pet_id',$id)
            ->where('created_at','like',  '%'.request('date').'%')
            ->orderBy('id', 'desc')
            ->paginate(5)
            ->appends('date', request('date'));
            
            if($medinfos->count() == 0){
                return redirect('/pethealth/view/'.$id)->with('toast_error', 'No data found');
            }
           

        }elseif(request()->has('all')){
            $medinfos = Medical_Histories::where('pet_id',$id)
            ->orderBy('id', 'desc')
            ->paginate(0);
        }else{
            $medinfos = Medical_Histories::where('pet_id',$id)
            ->orderBy('id', 'desc')
            ->paginate(5);
        }
   
        // dd($medinfos[0]->pets);
        return view('admin.prints.medhis')->with('medinfos', $medinfos);

    }

}
