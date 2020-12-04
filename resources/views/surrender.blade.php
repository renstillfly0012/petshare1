@extends('layouts.app')

@section('content')

<div style="width:1593px; height:1260px; border-radius: 40px;" class="card col-md-10 offset-md-1 mt-5">
    <p style="font-size:40px; margin-left:87px;" class="mt-5"><b>SURRENDER A PET</b></p>
 
    <div class="card-body" >
<form method="post" action="{{ action('surrenderController@store') }}" enctype="multipart/form-data" id="usrform">
    @csrf

    <div class="col-md-10 offset-md-1 text-md-center" style="margin-bottom: 22px;">
        <div>
        <input class="mb-4" type="file" name="image" accept="image/*" id="image" value="">

        @error('image')
        <span class="invalid-feedback text-center" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
    </div>
    

<input type="text" id="user_id" name="user_id" value="{{Auth::user()->id}}" hidden>

    <div class="form-group row">
        <div class="col-md-10 offset-md-1">
            @auth
            <input style="font-size:16px" id="" type="text" class="form-control @error('name') is-invalid @enderror"
                name="name" value="{{ Auth::user()->name }}" autocomplete="name" readonly>
                @endauth
                
                @guest
                    <input style="font-size:16px" id="" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" autocomplete="name">
                @endguest
            @error('name')
            <span class="invalid-feedback text-center" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
                <label style=" font-size:24px;" for="name"
                class="col-md-4 offset-md-4  col-form-label ml-1 mt-2" placeholder="">{{ __('Name') }}</label>
        </div>

       
    </div>

                    <?php
                    $date = new DateTime('Asia/Singapore');
                    $date->modify('+7 day');
                    $dt= $date->format('Y-m-d\TH:i:s'); 

                    // dd($dt);
                    ?>

                    <div class="form-group row">
                        <div class="col-md-10 offset-md-1" id="datepicker">
                        {{-- <input style="font-size:20px" id="datetime" type="datetime-local" class="form-control" name="requested_date"  min="{{$dt}}"> --}}
                        <input style="font-size:20px" id="datetime" type="datetime-local" class="form-control" name="requested_date"  value="{{$dt}}" min="{{$dt}}">

        
        
                            @error('show_pet_description')
                            <span class="invalid-feedback text-center" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                           
                            <label style=" font-size:24px;"for="Date"
                class="col-md-4 offset-md-4  col-form-label ml-1 mt-2">{{ __('Date') }}</label>
                        </div>
                    </div>
    <div class="form-group row">
        
        
        <div class="col-md-10 offset-md-1 mt-3">
            <label style=" font-size:24px;"for="message"
            class="col-md-4 offset-md-8  col-form-label ml-1" s>{{ __('Message:') }}</label>
                 
            <textarea  style="font-size:16px;" id="message" type="text" class="form-control  @error('message') is-invalid @enderror"
                name="message" value="{{ old('message') }}" autocomplete="message" rows="8"></textarea form="usrform">

                @error('message')
                <span class="invalid-feedback text-center" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

         
        </div>
       
    </div>
    
    <div class="col-md-10 offset-md-1 ">
        <div class="alert alert-warning" role="alert">
            <strong> <p>Note: Always advanced a week for the date of the appointment.
                Ex: today is Jan 1,2020 (monday) select Jan 8,2020 (monday)</p>
                <br>
                <p>Upon the reservation of the appointment, all the appointments will be subjected to evaluation. 
                    Once validated, the administrator will send a notice.<p></strong>
          </div>
    </div>


    <div class="form-group row text-center">
        <div class="col-md-2 offset-md-5">
            <button type="submit" class="btn btn-primary" style="font-size:20px; color:black">
                {{ __('Submit') }}
            </button>
        </div>
        <div class="col-md-2 offset-md-5 mt-2">
            <a href="/" class="btn btn-secondary ml-1" style="color:white; font-size:20px;">
              Cancel
            </a>
        </div>
    </div>
</form>
</div>
</div>
</div>


@endsection



<script type="text/javascript">
$(function () {
    $('.datetimepicker').datetimepicker();
});
 </script>