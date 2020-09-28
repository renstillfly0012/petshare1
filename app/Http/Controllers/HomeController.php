<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use Gate;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

            public function index()
            {
                if(Auth::check()){
                if(Gate::denies('isAdmin')){
                    return view('welcome');
                
                  }else{
                    return redirect('home');
                  }
      
                }
                return view('welcome');
            }
            public function howToAdopt(){
                return view('howtoadopt');
            }

            public function availablePets(){
                $pets = Pet::all();
                // dd($pets);
                
                return view('viewallpets')->with('pets', $pets);
            }





    
}
