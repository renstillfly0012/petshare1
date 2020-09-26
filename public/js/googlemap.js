

// function initMap(){

//     var mapElement = document.getElementById('map');
//     var url = '/map-marker';

//     async function markerscodes(){
//         var data = await axios(url);
//         var locationData = data.data;
//         mapDisplay(locationData);
//     }
//     function mapDisplay(datas){

//         //map options
//         var options = {
//             // center: { lat:Number(datas[0].coords_lat), lng:Number(datas[0].coords_lng),
//             center:{lat:42.3601, lng:-71.0589},
//                 zoom:10,
//             }
//         }
//         var map = new googlemap.maps.Map(mapElement, options);

//         var markers = new Array();

//         for(let index = 0; index < datas.length; index++)
//         {
//             markers.push({
//                 coords: {lat:Numbers(datas[index].coords_lat), lng:Number(datas[index].coords_lng)},
//                 content: `<div><h5>${datas[index].location_title}</h5><p><i class="icon address-icon"></i>
//                 ${data[index].addressline1}</p>
//                 <p>${data[index].addressline2},${data[index].city}</p>
//                 <small>${data[index].location_email}</small></div>`
//             })
//         }

//         for (var i = 0; i<markers.length; i++){
//             addMarker(markers[i]);
//         }

//         function addMarker(props){
//             var marker = new google.map.Marker({
//                 position: props.cords,
//                 map:map
//             });
//         }

//         if(props.iconImage)
//         {
//             marker.setIcon(props.iconImage);
//         }

//         if(props.content){
//             var infowindow = new google.maps.InfoWindow({
//                 content: props.content
//             });

//             marker.addListener('click', function(){
//                 infowindow.open(map, marker);
//             });
//         }

        
//     }
