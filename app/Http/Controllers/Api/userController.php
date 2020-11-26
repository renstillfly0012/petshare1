<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\userPostRequest;
use App\User;
use App\Role;
use Validator;
use Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/*
200 = ok
201 = object created = store
204 = no content found after executed succesfully
206 = partial content for paginations
400 = bad request = fail to pass validations.
401 = unauthorized
403 = forbidden = user auth but no permission to do this action.
404 = not found 
500 = internal server error
503 = service unavailable.

*/

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        // return response()->json($user);
        return response()->json($user, 200);
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
    public function store(userPostRequest $request)
    {

        try{

            //create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 2,
        ]);

        // dd($user);
        //assign user role to the new user
        $role = Role::select('id')->where('name', 'foster')->first();

        $user->roles()->attach($role);

        //send email verification
        $user->sendEmailVerificationNotification();


        return response()->json($user, 201);

        }catch(\Exception $error){
               return response()->json($error, 400);
        }

        
    }

    public function storeAdmin(userPostRequest $request)
    {

        try{

            //create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role_id' => 1,
            'email_verified_at' => now(),
        ]);

        // dd($user);
        //assign user role to the new user
        $role = Role::select('id')->where('name', 'admin')->first();

        $user->roles()->attach($role);

        //send email verification
        $user->sendEmailVerificationNotification();


        return response()->json($user, 201);

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
    public function show(User $user)
    {
        // return QrCode::size(150)
        // ->generate('https://pet-share.com', public_path('assets/images/qrcodes/'.$user->email.''.time().'.png'));
        return response()->json($user, 200);
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
    public function update(userPostRequest $request, User $user)
    {
        try{
            $user->name = $request->edit_user_name;
        $user->email = $request->edit_email;
        $user->password = $request->edit_password;
        if($request->hasFile('edit_image') == true){
        // $user->image = $request->edit_image->getClientOriginalName();
       
        $file = $request->edit_image;
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.USER_ID_'.$user->id.'.'.$extension;
        // $filename = $file->getClientOriginalName();
        $user->image = $filename;
       

        // $data = array_merge($validated, ['image' => $filename]);
        $file->move('assets/images/users', $filename);
        }
     
       
        $user->save();

        return response()->json($user, 201);

        }catch(\Exception $error){
            return response()->json($error, 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        try{
        $user->delete();
        return response()->json($user, 200);
        }catch(\Exception $error){
        return response()->json($error, 400);
       }
    }
    public function login(Request $request){
        
        try{
        $user = User::where([
            'email' => $request->email,
            'password' => $request->password,
            ])->get();
    
            dd($user);
            $pass = $user->password;
            if(Hash::check($request->password, $pass)){
                    return response()->json($user->first(), 200); 
            }else{
                return response()->json('',404);
            }
        }catch(\Exception $error){
        return response()->json($error, 400);
       }
        
    }
}
