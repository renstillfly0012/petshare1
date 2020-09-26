@extends('layouts.app')

@section('content')

    <style>
        h3 {
            color: #fdc370;
        }

    </style>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- @if (\Session::has('success'))
        <div class="alert alert-success">
            <h3>{{ \Session::get('success') }}</h3>
        </div>
    @endif --}}
{{-- 
    $(document).ready(function() {
        $('.getMaps').on('click', function(e) {
            var userLat = $(this).data('user-lat');
            var userLon = $(this).data('user-lon');
            alert("Page is loaded"+a);
    
        });
        }); --}}
    {{-- <button class="getCoords" data-user-lat="{{$map ?? ''->lat}}" data-user-lon="{{$map ?? ''->lng}}"></button> --}}
   
   
    <div class="box" style="height:2693px">
        <div class="container-fluid"
            style="margin-top:5%; background-color:black; border-color:black; width: 90%; height:15%;">

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

@auth
<script>
    
    let map;
    var options;
    var infoWindow;
 //need to let the user know that we will use his/her location to pin point.

function initMap() {
    var userLat = document.getElementById('map-lat').getAttribute('value');
    var userLon = document.getElementById('map-lon').getAttribute('value');
    console.log(userLat+" "+userLon);


    options = {
        zoom: 14,
        // center: {lat:14.6009,lng:120.9881}
        center: {lat:14.5654,lng:120.9979}
    }

    map = new google.maps.Map(document.getElementById("map"),options);

    //Array of markers
    var markers = [{
        coords:{lat:14.6009,lng:120.9881},
        iconImage: '',
        content:'<h3>PSPCA</h3>',
    },

    {
        coords:{lat:14.5654,lng:120.9979},
        iconImage: '',
        content:'<h3>ME</h3>',
    }];

    //loop through markers
    for(var i=0; i<markers.length;i++){
        addMarker(markers[i]);
    }

    // addMarker({
    //     coords:{lat:14.6009,lng:120.9881},
    //     iconImage: '',
    //     content:'<h3>PSPCA</h3>',
    // });

    // addMarker({
    //     coords:{lat:14.5654,lng:120.9979},
    //     iconImage: '',
    //     content:'<h3>ME</h3>',
    // });

    //Add Marker
    function addMarker(props){
    if(props.coords){
        var marker = new google.maps.Marker({
    position:props.coords,
    // icon:props.iconImage
    map:map
    });
    }else{
        console.log("Invalid Coordinates");
    }
    //check for customIcon
    if(props.iconImage){
        //set icon image
        marker.setIcon(props.iconImage);
    }

    //check content
    if(props.content){
    infoWindow = new google.maps.InfoWindow({
        content:props.content
    });

    marker.addListener('click', function(){
        infoWindow.open(map,marker);
    });
    }

}
   
} 
</script>

@endauth
