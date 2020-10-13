@extends('layouts.app')

@section('content')
<style>
    /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
  height: 100%;
}

/* Optional: Makes the sample page fill the window. */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}

#floating-panel {
  position: absolute;
  top: 10px;
  left: 25%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
  font-family: "Roboto", "sans-serif";
  line-height: 30px;
  padding-left: 10px;
}

#floating-panel {
  background-color: #fff;
  border: 1px solid #999;
  left: 25%;
  padding: 5px;
  position: absolute;
  top: 10px;
  z-index: 5;
}
.box{
    height:2693px;
  }

#svg400{
  width:100%;
  display:none;
}

#svg_desktop_green, #svg_desktop_yellow{
    width:100%;
    display:block;
}
h3{
  color: #FDC370;
  font-size: 20px;
}

#landing_main{
  display:grid;
  grid-template-columns:repeat(auto-fit, minmax(10px, 320px));
  grid-gap: 300px;
  margin-top: -1750px;
  margin-left: 200px;
}



/* iphone 5/SE */
@media (min-width:320px) and (max-width: 359px) {
  #svg400{
    margin-top: -500px;
    display:block;
  }
  #svg_desktop_green, #svg_desktop_yellow{
    display:none;
  }
 
}


/* Galaxy s5*/
@media (min-width:360px) and (max-width: 374px){
  #svg400{
    margin-top: -380px;
    display:block;
  }
  #svg_desktop_green, #svg_desktop_yellow{
    display:none;
  }
}

/* iphone 6/7/8 */
@media (min-width:375px) {
  #svg400{
    margin-top: -350px;
    display: block;
  }
  #svg_desktop_green, #svg_desktop_yellow{
    display:none;
  }
}
/* iphone 6/7/8 plus*/
@media (min-width:414px) {
  #svg400{
    display: block;
    margin-top: -250px;

  }

  #svg_desktop_green, #svg_desktop_yellow{
    display:none;
  }
  #green_photos{
    margin-top: -2100px;
    margin-left: -100px;
    
  }
  h3{
    font-size:16px;
   
  }

  
}
/* ipad */
@media (min-width:768px)  {
  #svg400{
    display:none;
  }
  #svg_desktop_green, #svg_desktop_yellow{
    margin-top: -1000px;
    display:block;
  }
}

/* ipad pro */

@media (min-width:1024px) {
  #svg400{
    display:none;
  }
  #svg_desktop_green, #svg_desktop_yellow{
    margin-top: -1000px;
    display:block;
  }
}

@media (min-width:1025px) {
  #svg400{
    display:none;
  }
  #svg_desktop_green, #svg_desktop_yellow{
    margin-top: -500px;
    display:block;
  }
  #green_photos{
    margin: 0 auto;
    
  }
  #img2{
    margin-right:160px; 
  }
  h3{
    font-size: 20px;
    margin-left: -100px;
  }
}
</style>
<div id="floating-panel">
    <button onclick="toggleHeatmap()">Toggle Heatmap</button>
    <button onclick="changeGradient()">Change gradient</button>
    <button onclick="changeRadius()">Change radius</button>
    <button onclick="changeOpacity()">Change opacity</button>
  </div>

<div id="map" style="height:400px; width:100%; display:;"></div>
<div id="infowindow-content">
    <span id="place-name" class="title"></span><br />
    <strong>Place ID:</strong> <span id="place-id"></span><br />
    <span id="place-address"></span>
  </div>
<input id="map-lat"  value="{{$map->lat ?? ''}}" hidden>
<input id="map-lon"  value="{{$map->lon ?? ''}}" hidden>



<div class="box"  style="height:">
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
                        <img class="d-block img-fluid" src="{{ asset('assets/images/adopt.png') }}" alt="First slide"  height="179.77px"
                        width="188.17px">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Announcement 1</h5>
                            <p>text 1</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{ asset('assets/images/report.png') }}" alt="Second slide" height="179.77px"
                        width="188.17px">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Announcement 2</h5>
                            <p>text 2</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{ asset('assets/images/donate.png') }}" alt="Third slide" height="179.77px"
                        width="188.17px">
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

<div>
  {{-- desktop --}}
<svg id="svg_desktop_green" xmlns="http://www.w3.org/2000/svg" version="1.0" width="1427.000000pt" height="2003.000000pt" viewBox="0 0 1920.000000 2693.000000" preserveAspectRatio="xMidYMid meet">
  <g transform="translate(0.000000,2693.000000) scale(0.100000,-0.100000)" fill="#2D643B" stroke="none">
  <path d="M19176 20572 c-124 -646 -469 -1141 -957 -1371 -119 -56 -271 -103 -409 -127 -88 -15 -687 -16 -8030 -10 -5613 5 -7953 3 -7995 -4 -314 -56 -599 -183 -870 -388 -105 -80 -305 -290 -392 -412 -259 -365 -408 -779 -485 -1340 -21 -154 -21 -168 -22 -2817 l-1 -2663 270 0 c149 -1 4464 -14 9590 -29 5126 -16 9321 -28 9323 -27 1 2 1 2091 0 4644 -3 4558 -3 4639 -22 4544z"/>
  </g>
</svg>
{{-- mobile --}}
<svg id="svg400" xmlns="http://www.w3.org/2000/svg" version="1.0" width="414.000000pt" height="2003.000000pt" viewBox="0 0 117.000000 764.000000" preserveAspectRatio="xMidYMid meet">
  <g transform="translate(0.000000,764.000000) scale(0.100000,-0.100000)" fill="#2D643B" stroke="none">
  <path d="M1146 6827 c-15 -98 -99 -220 -169 -246 -17 -7 -117 -11 -245 -11 -240 0 -354 -10 -452 -41 -126 -39 -171 -85 -218 -221 -64 -180 -62 -151 -62 -1123 l0 -885 580 0 580 0 0 1285 c0 707 -2 1285 -4 1285 -2 0 -7 -19 -10 -43z"/>
  </g>
  </svg>

</div>

<div >
  {{-- desktop --}}
  <svg id="svg_desktop_yellow" xmlns="http://www.w3.org/2000/svg" version="1.0" width="1427.000000pt" height="922.000000pt" viewBox="0 0 1919.000000 1238.000000" preserveAspectRatio="xMidYMid meet">
    <g transform="translate(0.000000,1238.000000) scale(0.100000,-0.100000)" fill="#FDC370" stroke="none">
    <path d="M1 3033 l-1 -3033 9584 0 9584 0 7 838 c9 1010 4 1329 -24 1537 -75 555 -226 971 -484 1335 -87 122 -287 332 -392 412 -271 205 -556 332 -870 388 -42 7 -2382 9 -7995 4 -7343 -6 -7942 -5 -8030 10 -328 57 -601 197 -831 426 -253 252 -419 569 -519 995 l-29 120 0 -3032z"/>
    </g>
    </svg>
    {{-- mobile --}}
</div>
</div>

<div class="container-fluid" id="green_photos">
  <div class="row" style="margin-left: 200px; margin-top: -1750px;">
      <div id="img1" class="col-md-3" style="margin-right:160px; text-center">
          <img src="{{ asset('assets/images/adopt.png') }}" alt="AdminLTE Logo"
              class="img-circle elevation-5 img-fluid">
          <h3 class="text-center mt-5">
              ADOPT/SURRENDER
              <br> A
              <br> PET
          </h3>
      </div>
      <div id="img2"class=" col-md-3" >
          <img src="{{ asset('assets/images/report.png') }}"  
              class=" img-circle elevation-5 img-fluid">
          <h3 class="text-center mt-5">
              REPORT ANIMAL CRUELTY
          </h3>
      </div>
      <div id="img3" class="col-md-3">
          <img src="{{ asset('assets/images/donate.png') }}"  
              class=" img-circle elevation-5  img-fluid">
          <h3 class="text-center mt-5">
              DONATE TO HELP
              <br> THE ANIMALS
          </h3>
      </div>

  </div>
  
</div>
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
    new google.maps.LatLng( 14.6009, 120.9881),
    new google.maps.LatLng(14.5654,120.9979),
  
        ];
       
}

</script>
