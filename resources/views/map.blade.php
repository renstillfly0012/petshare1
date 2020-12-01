@extends('layouts.app')

@section('content')
<style>
    /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
  height: 100%;
}
</style>

<div id="floating-panel">
    <button onclick="toggleHeatmap()">Toggle Heatmap</button>
    <button onclick="changeGradient()">Change gradient</button>
    <button onclick="changeRadius()">Change radius</button>
    <button onclick="changeOpacity()">Change opacity</button>
  </div>

<div id="map" style="height:800px; width:100%; display:;"></div>
<div id="infowindow-content">
    <span id="place-name" class="title"></span><br />
    <strong>Place ID:</strong> <span id="place-id"></span><br />
    <span id="place-address"></span>
  </div>
<input id="map-lat"  value="{{$map->lat ?? ''}}" hidden>
<input id="map-lon"  value="{{$map->lon ?? ''}}" hidden>
{{-- 
 @foreach ($location as $locations) 
<script>
  var NumberOfReports =  @json($locations::count());
  var a = new array();
  for(NumberOfReports; NumberOfReports>=0; NumberOfReports--){
    a[NumberofReports] = new Array @json($locations->id,$locations->address_latitude,$locations->address_longitude)
  }
  console.log(a[NumberOfReports]);
</script>
  <input type="hidden" value="{{$locations->id}}">
  <input type="hidden" value="{{$locations->report_id}}">
  <input type="hidden" value="{{$locations->address}}">
  <input type="hidden" value="{{$locations->address_latitude}}">
  <input type="hidden" value="{{$locations->address_longitude}}">
  <br>
@endforeach  --}}


{{-- 
<main id="landing_main" >
  <div class="text-center">
    <img src="{{ asset('assets/images/adopt.png') }}" alt="AdminLTE Logo"
    class="img-circle elevation-5 img-fluid">
    <h3 class="text-center mt-5">
      ADOPT/SURRENDER
      <br> A
      <br> PET
    </h3>
  </div>

  <div class="text-center">
    <img src="{{ asset('assets/images/adopt.png') }}" alt="AdminLTE Logo"
    class="img-circle elevation-5 img-fluid">
    <h3 class= "mt-5">
      ADOPT/SURRENDER
      <br> A
      <br> PET
  </h3>
  </div>

  <div class="text-center">
    <img src="{{ asset('assets/images/adopt.png') }}" alt="AdminLTE Logo"
    class="img-circle elevation-5 img-fluid">
    <h3 class=" mt-5">
      ADOPT/SURRENDER
      <br> A
      <br> PET
  </h3>
  </div>

</main> --}}
@endsection




<script>
    
    let map,heatmap;
    var options;
    var infoWindow;


   
 //need to let the user know that we will use his/her location to pin point.

function initMap() {
    var userLat = document.getElementById('map-lat').getAttribute('value');
    var userLon = document.getElementById('map-lon').getAttribute('value');
    console.log(userLat+" "+userLon);

   

    options = {
        zoom: 17,
        // center: {lat:reportLat_Lng[0],lng:reportLat_Lng[1]},
        // center: {lat:14.5654,lng:120.9979}
        center: {lat:14.6009,lng:120.9881},
        mapTypeId: "terrain",
    }

    map = new google.maps.Map(document.getElementById("map"),options);
    // console.log(controllerId);

  //BORDER OF BRGY 390
    const flightPlanCoordinates = [
 { lat: 14.601594, lng: 120.988096 },
    { lat: 14.600512, lng: 120.987423 }, 
    { lat: 14.600385, lng: 120.987637 }, 
    { lat: 14.600357, lng: 120.987622 }, 
    { lat: 14.599522, lng: 120.988716 }, 
    { lat: 14.599466, lng: 120.988809 }, 
    { lat: 14.599354, lng: 120.989073 },
    { lat: 14.599284, lng:  120.9893409 },
    { lat: 14.597637, lng: 120.989524 },
    {lat:14.600418, lng:120.990879 },
    { lat: 14.601594, lng: 120.988096 },
  ];

  const flightPath = new google.maps.Polygon({
    path: flightPlanCoordinates,
    geodesic: true,
    strokeColor: "#FF0000",
    strokeOpacity: 1.0,
    strokeWeight: 2,
    fillColor: "#FF0000",
    fillOpacity: 0.35,
  });
  flightPath.setMap(map);
  //BORDER OF BRGY 390

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

    //heatmap 
    heatmap = new google.maps.visualization.HeatmapLayer({
    data: getPoints(),
    map: map,
        });
        
        map.data.setStyle(function(feature) {
          var mag = Math.exp(parseFloat(feature.getProperty('mag'))) * 0.1;
          return /** @type {google.maps.Data.StyleOptions} */({
            icon: {
              path: google.maps.SymbolPath.CIRCLE,
              scale: mag,
              fillColor: '#f00',
              fillOpacity: 0.35,
              strokeWeight: 0
            }
          });
        });

   
} 

function toggleHeatmap() 
{
    heatmap.setMap(heatmap.getMap() ? null : map);
}
function changeGradient() {
  const gradient = [
    "rgba(0, 255, 255, 0)",
    "rgba(0, 255, 255, 1)",
    "rgba(0, 191, 255, 1)",
    "rgba(0, 127, 255, 1)",
    "rgba(0, 63, 255, 1)",
    "rgba(0, 0, 255, 1)",
    "rgba(0, 0, 223, 1)",
    "rgba(0, 0, 191, 1)",
    "rgba(0, 0, 159, 1)",
    "rgba(0, 0, 127, 1)",
    "rgba(63, 0, 91, 1)",
    "rgba(127, 0, 63, 1)",
    "rgba(191, 0, 31, 1)",
    "rgba(255, 0, 0, 1)",
  ];
  heatmap.set("gradient", heatmap.get("gradient") ? null : gradient);
}

function changeRadius() {
  heatmap.set("radius", heatmap.get("radius") ? null : 50);
}

function changeOpacity() {
  heatmap.set("opacity", heatmap.get("opacity") ? null : 0.2);
}

function getPoints() {
  return [
    new google.maps.LatLng(14.6009, 120.9881),
    new google.maps.LatLng(14.5654,120.9979),
    new google.maps.LatLng(14.601594, 120.988096),
    new google.maps.LatLng(14.601587, 120.988087),
    new google.maps.LatLng(14.601609, 120.988082),
    new google.maps.LatLng(reportLat_Lng[0],reportLat_Lng[1]),
        ];
       
}

</script>
