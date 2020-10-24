<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PetRequest;
use Gate;
use App\Pet;
use Illuminate\Support\Facades\Auth;
use Validator;


class petController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth', 'except' => []);
    }
    public function index()
    {
        if (Auth::check()) {
            if (Gate::denies('isAdmin')) {
                // dd(Auth::check());
                return redirect()->route('landing')->with('warning', 'Authorized person can only access this');
            }
        }else{
            return redirect()->route('landing')->with('warning', 'Kindly login first to view this page');
        }
        $pets = Pet::paginate(5);
        return view('admin.pet.pet')->with('pets', $pets);
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
    public function store(PetRequest $request)
    {
        // $validator = Validator::make($request->all(),[
        //     'pet_name' => ['required', 'string', 'max:255'],
        //      'pet_age' => ['required', 'integer', 'max:20', 'min:0'],
        //       'pet_breed' => ['required', 'string', 'max: 20'],
        //       'pet_description' => ['required', 'string', 'max:255'],
        //       'pet_image' => 'mimes:jpeg,jpg,png,gif','image', 'max:25000',
        //  ]);
        
        if($request->validated()==true)
        {
        $pet = new Pet;
        $pet->name = $request->input('pet_name');
        $pet->age = $request->input('pet_age');
        $pet->breed = $request->input('pet_breed');
        $pet->description = $request->input('pet_description');

        // $validated = $request->validated();
       
        // $data = $validated;
     
        // if($request->hasFile('pet_image') == true){
            // $user->image = $request->edit_image->getClientOriginalName();
            
            $new_pet_id = Pet::count()+1;
            
            $file = $request->pet_image;
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.PET_ID_'.$new_pet_id.'.'.$extension;
            // $filename = $file->getClientOriginalName();
            $pet->image = $filename;
            
            // $data = array_merge($validated, ['image' => $filename]);
           
        // }
       
    //    $pet->create($data);
        // $pet = Pet::create($data);
        
        $pet->save();
        // dd($pet);
        $file->move('assets/images/pets', $filename);
       
      
       
        return redirect('/pets')->with('toast_success', 'New Data has been Saved');
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
        $validator = Validator::make($request->all(),[
            'edit_pet_name' => ['required', 'string', 'max:255'],
             'edit_pet_age' => ['required', 'integer', 'max:20', 'min:0'],
              'edit_pet_breed' => ['required', 'string', 'max: 20'],
              'edit_pet_description' => ['required', 'string', 'max:255'],
         ]);

         request()->validate([
            'edit_pet_image' => ['mimes:jpeg,jpg,png,gif','image', 'max:25000'],
        ]);

        $pet = Pet::findorfail($id);
        $pet->name = $request->input('edit_pet_name');
        $pet->age = $request->input('edit_pet_age');
        $pet->breed = $request->input('edit_pet_breed');
        $pet->description = $request->input('edit_pet_description');
       

        if($request->hasFile('edit_pet_image') == true){
            // $user->image = $request->edit_image->getClientOriginalName();
           
            $file = $request->edit_pet_image;
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.PET_ID_'.$id.'.'.$extension;
            // $filename = $file->getClientOriginalName();
            $pet->image = $filename;
            $file->move('assets/images/pets/', $filename);
            }

            //   dd($pet);
            $pet->save();
       
        return redirect('/pets')->with('toast_success', 'Changes to PET ID: '.$pet->id."'s Data has been Saved");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pet = Pet::findorfail($id);
        $pet->delete();
        return redirect('/pets')->with('toast_success', 'PET ID:'.$id.' has been Deleted');

    }
}
