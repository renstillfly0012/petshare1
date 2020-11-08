<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\userPostRequest;
use App\User;
use App\Role;
use Validator;
use Hash;

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
               return response()->json($error, 404);
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
    public function login(Request $request){
        

        $user = User::where([
            'email' => $request->email,
        ])->get()->first();

       $plainPass = $request->password;
        $hashPass = $user->password;
        // dd( $request->all(),$pass,Hash::check($pass,$user->password ),$user->password);
        //plaint text,hashpass
        if(Hash::check($plainPass, $hashPass)){
                return response()->json($user, 200); 
        }
        else{
            return response()->json('User Not Found',204);
        } 
        
    }
}
