@extends('layouts.app')

@section('content')
    <style>

    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-md-4" style=" margin-top:75px;">
                <h1 class="text-center">HOW TO ADOPT
                    <br> A PET?</h1>
            </div>
            <div class="d-flex" style="margin-top:52px;">

                <div class="col-md-3">
                    <img src="{{ asset('assets/images/adoptPet.png') }}" class="img-fluid" height="417px" width="398px"
                        alt="">

                    <div class="col-md-10 offset-md-1" style="margin-top:73px;">
                        <h1 class="text-center">STEP 1:
                            <br>Choose a pet</h1>
                    </div>
                </div>


                <div class="col-md-3">
                    <img src="{{ asset('assets/images/booking.png') }}" class="img-fluid" height="417px" width="398px"
                        alt="">

                    <div class="col-md-10 offset-md-1" style="margin-top:73px;">
                        <h1 class="text-center">STEP 2:
                            <br>Book an appointment for meeting the pet.</h1>
                    </div>
                </div>


                <div class="col-md-3">
                    <img src="{{ asset('assets/images/bgcheck.png') }}" class="img-fluid" height="417px" width="398px"
                        alt="">
                    <div class="col-md-10 offset-md-1" style="margin-top:73px;">
                        <h1 class="text-center">STEP 3:
                            <br>Background Check</h1>
                    </div>
                </div>


                <div class="col-md-3">
                    <img src="{{ asset('assets/images/takecare.png') }}" class="img-fluid" height="417px" width="398px"
                        alt="">

                    <div class="col-md-10 offset-md-1" style="margin-top:73px;">
                        <h1 class="text-center">STEP 4:
                            <br>Take Care of it.</h1>
                    </div>
                </div>

            </div>

        </div>
        <a href="/availablepets" class="float-right">
            <h4>Click here to view available pets <i class="fa fa-arrow-right" aria-hidden="true"></i></h4>

        </a>
    </div>



@endsection
