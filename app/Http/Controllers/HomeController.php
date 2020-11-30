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
              $pets = Pet::whereBetween('id', array(3,8))->get();
              $header = Content::where('content_section','Header')->get();
              $content = Content::all();

              // dd($header[0]);
              
                if(Auth::check()){
                if(Gate::denies('isAdmin')){
                    return view('welcome',compact('contents','pets','header','content'));
                
                  }else{
                    return redirect('home');
                  }
      
                }
               
                
                return view('welcome' ,compact('contents','pets','header','content'));
            }
            public function howToAdopt(){
                return view('howtoadopt');
            }

            public function availablePets(){
              
                // dd($pets);

              if(request()->has('breed')){
            
                  $pets = Pet::where('breed', request('breed'))
                  ->paginate(5)
                  ->appends('breed', request('breed'));
      
              }else{
                $pets = Pet::paginate(4);
              }
                
                return view('viewallpets')->with('pets', $pets);
            }





    
}
