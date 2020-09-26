@extends('layouts.app')
<style>
    input[type="text"],
    input[type="address"],
    input[type="password"] {
        border-radius: 30px;
        box-shadow: 3px 3px 6px 0px rgba(0, 0, 0, 1), -3px -3px 6px 0px rgba(255, 255, 255, 1);
    }
</style>

@section('content')

@auth
<div id="map" style="height:400px; width:100%; display:none;"></div>
<div id="infowindow-content">
    <span id="place-name" class="title"></span><br />
    <strong>Place ID:</strong> <span id="place-id"></span><br />
    <span id="place-address"></span>
  </div>
<input id="map-lat"  value="{{$map->lat ?? ''}}" hidden>
<input id="map-lon"  value="{{$map->lon ?? ''}}" hidden>

@endauth
<div style="width:1593px; height:1060px; border-radius: 40px;" class="card col-md-10 offset-md-1 mt-5">
   <p style="font-size:40px; margin-left:87px;" class="mt-5"><b>REPORT INCIDENT</b></p>

   <div class="card-body" >
    
<form method="post" action="{{ action('ReportController@store') }}" enctype="multipart/form-data">
        @csrf

       
   
        <div class="col-md-10 offset-md-1 text-md-center" style="margin-bottom: 22px;">
            {{-- <img src="{{ asset('assets/images/pspcalogo.png') }}" alt="" id="card_logo"
                height="229ppx" width="235px" class="rounded-circle img-responsive"> --}}
            <div>
            <input class="mb-4" type="file" name="image" id="image" value="">

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
                <input id="address" type="address" class="form-control @error('address') is-invalid @enderror"
                    name="address" value="{{ old('address') }}" autocomplete="address">

                @error('address')
                <span class="invalid-feedback text-center" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <label for="address"
                    class="col-md-4 offset-md-4  col-form-label text-md-center" placeholder="">{{ __('Address') }}</label>
            </div>
        </div>



        <div class="form-group row">


            <div class="col-md-10 offset-md-1">
                <input id="description" type="text" class="form-control"
                    name="description" autocomplete="description">
            </div>
            <label for="description"
                class="col-md-4 offset-md-4  col-form-label text-md-center">{{ __('Report Description') }}</label>
        </div>

        <div class="form-group row mb-0 ">
            <div class="col-md-2 offset-md-5">
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit Report') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>



@endsection

@auth
<script>
    let map;
    var options;
    var infoWindow;
    var userLat;
    var userLng;
    var start;
    var end;
    var autocomplete;

window.addEventListener('load', (event) => {

    
//    var result = confirm('Do you like to use current location for this process?');
//    if(result){
//     userLat = document.getElementById('map-lat').getAttribute('value');
//     userLng = document.getElementById('map-lon').getAttribute('value');
   
//     alert(userLat+" "+userLng);    
//     
//    }
// document.getElementById('map').style.display = "block";
    initMap();
  
});
    
   
 //need to let the user know that we will use his/her location to pin point.

function initMap() {
    const address_input = document.getElementById('address');

    var directionDisplay = new google.maps.DirectionsRenderer();
    var directionService = new google.maps.DirectionsService();

    console.log(userLat+" "+userLng);
    options = {
        zoom: 13,
        // center: {lat:14.6009,lng:120.9881}
         center: {lat:14.5654,lng:120.9979}
        // center:{lat:parseFloat(userLat),lng:parseFloat(userLng)},
    }

    map = new google.maps.Map(document.getElementById("map"),options);
    
    directionDisplay.setMap(map);

  const input = document.getElementById("address_input");
  const autocomplete = new google.maps.places.Autocomplete(address_input);

  autocomplete.bindTo("bounds", map); // Specify just the place data fields that you need.

  autocomplete.setFields(["place_id", "geometry", "name"]);
  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
  const infowindow = new google.maps.InfoWindow();
  const infowindowContent = document.getElementById("infowindow-content");
  infowindow.setContent(infowindowContent);
  const marker = new google.maps.Marker({
    map: map,
  });

  marker.addListener("click", () => {
    infowindow.open(map, marker);
  });
  autocomplete.addListener("place_changed", () => {
    infowindow.close();
    const place = autocomplete.getPlace();

    if (!place.geometry) {
      return;
    }

    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    } // Set the position of the marker using the place ID and location.

    marker.setPlace({
      placeId: place.place_id,
      location: place.geometry.location,
    });
    marker.setVisible(true);
    infowindowContent.children.namedItem("place-name").textContent = place.name;
    infowindowContent.children.namedItem("place-id").textContent =
      place.place_id;
    infowindowContent.children.namedItem("place-address").textContent =
      place.formatted_address;
    infowindow.open(map, marker);


    start = new google.maps.LatLng(14.6009,120.9881);
    // user = new google.maps.LatLng(parseFloat(userLat),parseFloat(userLng));
  
        end = new google.maps.LatLng(14.5654,120.9979);
    
    // lat:14.5916,lng:121.0147
    console.log(start+""+end)
    var request = {
        	origin: start,
            destination: place.geometry.location,
            travelMode: 'DRIVING',
    };
    directionService.route(request, function(result, status){

     
        if(status=="OK"){
            directionDisplay.setDirections(result);
            document.getElementById('map').style.display = "block";
        }else{
            directionDisplay.setMap(null);
            directionDisplay.setDirections(null);
            alert('Could not display directions due to '+ status);
        }
    });
  });




//     //Array of markers
//     var markers = [{
//         // coords:{lat:14.6009,lng:120.9881},
//         // iconImage: '',
//         // content:'<h3>PSPCA</h3>',
//         //2044 Recto Ave, Quiapo, Manila, 1008 Metro Manila, Philippines
//     },
//     {
//         // coords:{lat:14.5654,lng:120.9979},
//         // coords:{lat:14.5916,lng:121.0147},
//         // coords:{lat:parseFloat(userLat),lng:parseFloat(userLng)},
//         // iconImage: '',
//         // content:'<h3>ME</h3>',
//     }];

//     //loop through markers
//     for(var i=0; i<markers.length;i++){
//         addMarker(markers[i]);
//     }

   

//     //Add Marker
//     function addMarker(props){
//     if(props.coords){

//     var marker = new google.maps.Marker({
//     position:props.coords,
//     map:map
//     });
//     }else{
//         console.log("Invalid Coordinates");
//     }
//     //check for customIcon
//     if(props.iconImage){
//         //set icon image
//         marker.setIcon(props.iconImage);
//     }

//     //check content
//     if(props.content){
//     infoWindow = new google.maps.InfoWindow({
//         content:props.content
//     });

//     marker.addListener('click', function(){
//         infoWindow.open(map,marker);
//     });
//     }
// }

  




   
} 
</script>

@endauth