<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Gate;
use App\User;
use App\Role;
use App\Http\Requests\PostRequest;
use App\Http\Requests\PostUpdateRequest;
use View;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth', ['except' => 'adminLogin']);
    }

    public function index()
    {
        if (Gate::denies('isAdmin')) {
            return redirect()->route('landing')->with('warning', 'Authorized person can only access this');
        }
       

        //  $user = User::find(1)->roles()->orderBy('name')->get();
        //  $user = User::with('roles')->get();
        //  dd($user);
        //   dd($user->first()->name);
          

        // $a = User::with('roles')->get();
        // dd($a->toArray());
        $users = User::paginate(5);
        
        return view('admin.user.user')->with('users', $users);
        // return redirect()->route('users');
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
    public function store(PostRequest $request)
    {
        
        $validated = $request->validated(); 

        $data = array_merge($validated, ['email_verified_at' => now()]);
      
        $user = User::create($data);
        $role = Role::select('id')->where('name', 'admin')->first();

        $user->roles()->attach($role);
        // dd($user, $data);
        return redirect('/users')->with('success', 'New Data has been Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(User $user)
    {
        return view('admin.user.user-view')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {   
        
        return view('admin.user.user-edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, User $user)
    {
 
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
        $file->move('assets/images/', $filename);
        }
     
       
        $user->save();

        // $user = User::update($data);
        
        // $request->edit_image->store('assets/images/uploads','public');
        return redirect('/users')->with('success', 'Changes to '.$user->name."'s Data has been Saved");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        // $user = User::findorfail($id);
        
        $user->delete();
        return redirect('/users')->with('success', 'USER ID:'.$user->id.' has been Deleted');
    }

   
}
