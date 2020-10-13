@extends('layouts.app')

@section('content')

<style>
   
        #body{
            /* width:400px; */
            background: url('assets/images/landing_page.png')100%;
            background-size: 100% 100%;
    

        }
        h3 {
            font-size: 18px;
            color: #fdc370;
        }

        @media all (max-width: 500px){
       #body{
            /* width:400px; */
            background: url('assets/images/mobile_landing.png')100%;
            background-repeat: repeat-y;
            background-size: 100% 100%;
                 
        }
        img{
            margin: auto;
            height:179.77px;
            width:188.17px;
        }
        h3{
        font-size: 20px;
        }
        #carousel_div{
            /* height:220px;
            width:262px; */
        }
     
   }
        
    
</style>
   
    <div class="box" style="height:2693px">
        <div class="container-fluid"
            style="margin-top:5%; background-color:black; border-color:black; width: 90%; height:15%;" id="carousel_div">

            <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel" style="padding-top:140px;">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="{{ asset('assets/images/adopt.png') }}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Announcement 1</h5>
                            <p>text 1</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{ asset('assets/images/report.png') }}" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Announcement 2</h5>
                            <p>text 2</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{ asset('assets/images/donate.png') }}" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Announcement 3</h5>
                            <p>text 3</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row" style="margin-left: 200px; margin-top: 500px;">
                <div class="col-md-3" style="margin-right:160px; text-center">
                    <img src="{{ asset('assets/images/adopt.png') }}" alt="AdminLTE Logo"
                        class="img-circle elevation-5 img-fluid">
                    <h3 class="text-center mt-5 mr-5 pr-5">
                        ADOPT/SURRENDER
                        <br> A
                        <br> PET
                    </h3>
                </div>
                <div class=" col-md-3" style="margin-right:160px;">
                    <img src="{{ asset('assets/images/report.png') }}" alt="AdminLTE Logo" height="332px" width="317ppx"
                        class=" img-circle elevation-5 img-fluid">
                    <h3 class="text-center mt-5 mr-5 pr-5">
                        REPORT ANIMAL
                        <br> CRUELTY
                        <br> OR
                        <br>RESCUE ANIMALS.
                    </h3>
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('assets/images/donate.png') }}" alt="AdminLTE Logo" height="332px" width="317ppx"
                        class=" img-circle elevation-5  img-fluid">
                    <h3 class="text-center mt-5 mr-5 pr-5">
                        DONATE TO HELP
                        <br> THE ANIMALS.
                    </h3>
                </div>

            </div>
            
        </div>
     
    </div>
@endsection
