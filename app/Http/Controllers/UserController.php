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
use DB;


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
        // $admins = User::where('role_id', 1)->get();
        // dd($admins);
        if(request()->has('role')){
            
            $users = User::where('role_id', request('role'))
            ->paginate(5)
            ->appends('gender', request('role'));

        }else{
            $users = User::with('roles')->paginate(5);
        }
       
        // foreach($users as $user)
        // {
        //     dd($user->roles->first()->name);
        
        // }
        // dd($users);
        
        return view('admin.user.user')->with('users', $users);
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
        
        $data2 = array_merge($data, ['role_id' => 1]);

        // if($request->hasFile('image') == true){
            // $user->image = $request->edit_image->getClientOriginalName();
           
            $new_user_id = User::count()+1;
            
            $file = $request->image;
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.USER_ID_'.$new_user_id.'.'.$extension;
            // $filename = $file->getClientOriginalName();
       
           
    
            $data3= array_merge($data2, ['image' => $filename]);
            
        // }
      
       
        
        $user = User::create($data3);
        $file->move('assets/images/users', $filename);

        $role = Role::select('id')->where('name', 'admin')->first();

        $user->roles()->attach($role);
        // dd($user, $data);
        
        return redirect('/users')->with('toast_success', 'New Data has been Saved');
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
        $file->move('assets/images/users', $filename);
        }
     
       
        $user->save();

        // $user = User::update($data);
        
        // $request->edit_image->store('assets/images/uploads','public');
        if($user->roles->first()->name == 'foster'){
            return redirect('/')->with('success', 'Changes to your Data has been Saved');
        }
        return redirect('/users')->with('toast_success', 'Changes to '.$user->name."'s Data has been Saved");
        

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
        return redirect('/users')->with('toast_success', 'USER ID:'.$user->id.' has been Deleted');
    }

   
}
