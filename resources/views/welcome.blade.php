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
                    {{-- @foreach($contents->take(3) as $content) --}}
                    <div class="carousel-item active">
                    <img class="d-block img-fluid" src="assets/images/{{$contents[0]->content_image}}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{$contents[0]->content_title}}</h5>
                            <p>{{$contents[0]->content_description}}</p>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="assets/images/{{$contents[1]->content_image}}" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{$contents[1]->content_title}}</h5>
                            <p>{{$contents[1]->content_description}}</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="assets/images/{{$contents[2]->content_image}}" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{$contents[2]->content_title}}</h5>
                            <p>{{$contents[2]->content_description}}</p>
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
                @foreach($contents->slice(3,3) as $content)
                <div class="col-md-3 ml-5" style=" text-center">
                <img src="assets/images/{{$content->content_image}}" alt=""
                        class="img-circle elevation-5 img-fluid ml-5">
                    <h3 class="text-center mt-5 ml-4 pr-5">
                        {{$content->content_description}}
                    </h3>
                </div>
                @endforeach
                {{-- <div class=" col-md-3" style="margin-right:160px;">
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
                </div> --}}
            </div>
            
        </div>
     
    </div>
@endsection
