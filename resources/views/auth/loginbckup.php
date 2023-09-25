@extends('layouts.app') @section('content')
<style>
.header-parana {
    height: 80px;
}

.navbar {
    height: 80px;
    z-index: 1;
    background-color: #fff;
}

#parana-message {
    color: #02007a !important;
    line-height: 20px;
}

li a {
    color: #fff !important;
}

.shadow-sm {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
}

.header-font,
body {
    font-family: sans-serif;
}

.ministry-style {
    font-size: 13px;
    line-height: 20px;
    font-weight: 600;
}

.prana-desc {
    white-space: nowrap;
}

.glance-body .card-header {
    border-top-left-radius: 13px;
    border-top-right-radius: 13px;
    background-color: #488a99 !important;
    color: #fff;
}

h4 {
    margin-bottom: 0.5rem;
    font-weight: 600;
    line-height: 1.2;
   
}
</style>
<style>
body {
    font-family: "Nunito", sans-serif;
}
</style>

<body class="antialiased">
    <div class="container-fluid">
      <div class="row mt-3">
         
         <div class="col-sm-6">

            <div class="card p-3 shadow-sm">
                <div class="card-body">
                    <h4 class="header-font">ABOUT CEPI</h4>
                    <p style="font-family: sans-serif; font-size: 16px; margin-bottom: 1rem; line-height: 28px;">
                        Comprehensive Environmental Pollution Index (CEPI) is a rational no., which ranges between
                        0-100 and captures overall quality of the environment covering ambient air, surface water
                        and land by following algorithm
                        of pollution sources, pathways and receptors. CEPI aims to measure the environmental
                        performance of industrial area/clusters. The industrial clusters having aggregated CEPI
                        score of 70 and above are considered as
                        critically polluted areas (CPAs), whereas the areas having CEPI score between 60-70 are
                        considered as severely polluted areas (SPAs) and areas having CEPI score less than 60 are
                        considered as other polluted areas
                        (OPAs).
                    </p>
                   
                </div>

                <div class="card-body">
                    <div class="" style="margin-top:10%">
                
                        <!-- four column div -->
                        <div class="card p-3 shadow-sm mt-4">
                            <div class="card-body p-0 glance-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="card h-100 shadow-sm pollutants-card">
                                            <div class="card-header text-center px-0">
                                                <div style="font-weight: 500;">
                                                    <h6 class="m-0">Total PIA</h6>
                                                </div>
                                            </div>
                                            <div class="card-body text-center">
                                                <h2>14</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card h-100 shadow-sm pollutants-card">
                                            <div class="card-header text-center px-0">
                                                <div style="font-weight: 500;">
                                                    <h6 class="m-0">Critical Poluted Areas</h6>
                                                </div>
                                            </div>
                                            <div class="card-body text-center">
                                                <h2>6</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card h-100 shadow-sm pollutants-card">
                                            <div class="card-header text-center px-0">
                                                <div style="font-weight: 500;">
                                                    <h6 class="m-0">Severely Polluted Areas</h6>
                                                </div>
                                            </div>
                                            <div class="card-body text-center">
                                                <h2>7</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="card h-100 shadow-sm pollutants-card">
                                            <div class="card-header text-center px-0">
                                                <div style="font-weight: 500;">
                                                    <h6 class="m-0">Other Polluted Areas</h6>
                                                </div>
                                            </div>
                                            <div class="card-body text-center">
                                                <h2>9</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
         </div>
         <div class="col-sm-6">
            <div id = "map" style = "width: 100%; height: 692px"></div>
         </div>
        </div>
    </div>
    </div>    
</div>
  <!----footer---->
  <div class="container-fluid" style="margin-top:5px">
    <div class="row" style="background-color: #1C4E80!important;
    color: #fff !important;
    height: 40px">
        <strong style="margin-top: 7px;">  Copyright &copy; 2023 - 2024 CPCB. All rights reversed. </strong>
    </div>
  </div>
    <!----div end containerfluid end 2-->
   
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" 
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="{{ asset('dist/pages/piaList.js') }}"></script>
   <script src="{{ asset('dist/pages/L.KML.js') }}"></script>
   <script>
    //Map initialize
    //var map = L.map('map').setView([20.5937, 78.9629], 5);
    var map = L.map('map').setView([21.7679, 78.8718], 4.5);
    
    //osm layer
      var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors' });
      var CyclOSM = L.tileLayer('https://{s}.tile-cyclosm.openstreetmap.fr/cyclosm/{z}/{x}/{y}.png', { maxZoom: 20, attribution:'<a href="#" title=""></a>'});
      var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', { maxZoom: 20, attribution:'<a href="#"></a>'});
      var googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'] });
      var googleHybrid = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}',{ maxZoom: 20, subdomains:['mt0','mt1','mt2','mt3'] });

      googleStreets.addTo(map);
    //custom icon 
      var myIcon = L.icon({
      iconUrl: "{{asset('dist/img/logo.png')}}",
      iconSize: [50, 50]      
      });
      
      [20.5937, 78.9629]
    //marker 
    var singlemarker = L.marker([20.5937, 78.9629], {icon:myIcon, draggable:true});
    var popup = singlemarker.bindPopup('This is inida!'+ singlemarker.getLatLng()).openPopup();
    popup.addTo(map);

    //var d = singlemarker.toGeoJSON();
    //console.log(JSON.stringify(d));
    //let result = d.map(({ coordinates }) => coordinates)
  
    var baseMaps = {
    "googleStreets": googleStreets,
    "googleHybrid": googleHybrid,
    "CyclOSM": CyclOSM,
    "OpenTopoMap": OpenTopoMap
     };

    var overlayMaps = {
        "Marker": singlemarker
    };


    var layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);

  
function onEachFeature(feature, layer) {
    // does this feature have a property named popupContent?
     if (feature.properties && feature.properties.popupContent) {
        layer.bindPopup(feature.properties.popupContent);
    }
}

    var geojsonFeature = {
        "type": "Feature",
        "properties": {
            "name": "Coors Field",
            "amenity": "Baseball Stadium",
            "popupContent": "This is where the Rockies play!"
            
        },
        "geometry": {
            "type": "Point",
            "coordinates": [28.665, 77.289]
        }
    };


    
    L.geoJSON(geojsonFeature, {
        pointToLayer: function (feature, latlng) {
        return L.marker(latlng, {icon: myIcon});},
        onEachFeature: onEachFeature
    }).addTo(map);


/*
    L.geoJSON(geojsonFeature,{
     pointToLayer: function (feature, latlng) {
     return L.marker(latlng, {icon: COIcon});},
     onEachFeature:onEachFeatureloc
}).addTo(map);
*/

    // Make basemap
    //const map = new L.Map('map', { center: new L.LatLng(58.4, 43.0), zoom: 11 });
    //const osm = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    //map.addLayer(osm);

    // Load kml file
   /* fetch('assets/India-State-and-Country-Shapefile-Updated-Jan-2020-master.kml')
        .then(res => res.text())
        .then(kmltext => {
            // Create new kml overlay
            const parser = new DOMParser();
            const kml = parser.parseFromString(kmltext, 'text/xml');
            const track = new L.KML(kml);
            map.addLayer(track);

            // Adjust map to show the kml
            const bounds = track.getBounds();
            map.fitBounds(bounds);
        });*/
      //end kml file


    //piaList= 
    /*  var mapOptions = {
            center: [21.7679, 78.8718],
            zoom: 5
         }
         // Creating a map object
         var map = new L.map('map', mapOptions);
         //var map = L.map('map').setView([21.7679, 78.8718], 5);
         // Creating a Layer object
         var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
         
         // Adding layer to the map
         map.addLayer(layer);

       // Icon options
       var iconOptions = {
            iconUrl: "<?php //echo base_url('logo.png');?>",
            iconSize: [50, 50]
         }
         // Creating a custom icon
         var customIcon = L.icon(iconOptions);
         
         // Creating Marker Options
         var markerOptions = {
            title: "MyLocation",
            clickable: true,
            draggable: true,
            icon: customIcon
         }*/
         // Creating a Marker
         //var marker_arr = [16.4782, 80.6757]
         //var marker = L.marker([17.438139, 78.395830], markerOptions);
         // Creating markers
        /* var hydMarker = new L.Marker([17.385044, 78.486671]);
         var vskpMarker = new L.Marker([17.686816, 83.218482]);
         var vjwdMarker = new L.Marker([16.506174, 80.648015]);

         var layerGroup = L.layerGroup([marker, hydMarker, vskpMarker, vjwdMarker], markerOptions);
         layerGroup.addTo(map);    // Adding layer group to map
      */
       /* var locations = [
       ["Locations 1", 16.4782, 80.6757],
       ["Locations 2", 17.7502, 83.2482],
       ["Locations 3", 26.0453, 91.8701],
       ["Locations 4", 27.3951, 95.626],
       ["Locations 5", 25.6942, 85.2424],
        ];

        //var popup = L.popup().setContent("I am a standalone popup.");
        //marker.bindPopup(popup).openPopup();

        for (var i = 0; i < locations.length; i++) {
            marker = new L.marker([locations[i][1], locations[i][2]],markerOptions)
                    .bindPopup(locations[i][0])
                    .addTo(map);
        }*/
       // L.marker([21.3548, 81.6701]).bindPopup('Your message').addTo(map).openPopup();
      </script>


</body>
@endsection