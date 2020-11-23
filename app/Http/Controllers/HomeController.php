<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use Gate;
use Auth;
use App\Content;
use QRCode;

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
              //---------
              $contents = Content::all();
              
                if(Auth::check()){
                if(Gate::denies('isAdmin')){
                    return view('welcome')->with('contents', $contents);
                
                  }else{
                    return redirect('home');
                  }
      
                }
               
                
                return view('welcome')->with('contents', $contents);
            }
            public function howToAdopt(){
                return view('howtoadopt');
            }

            public function availablePets(){
                $pets = Pet::paginate(4);
                // dd($pets);
                
                return view('viewallpets')->with('pets', $pets);
            }





    
}
