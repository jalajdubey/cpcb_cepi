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
                                                <h2>{{$piacount->totalpia}}</h2>
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
                                                <h2>{{$piacount->cpa}}</h2>
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
                                                <h2>{{$piacount->spa}}</h2>
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
                                                <h2>{{$piacount->opa}}</h2>
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
            <div id = "map" style = "width: 100%; height: 100%"></div>
            <div id="popup" class="ol-popup">
                <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                <div id="popup-content"></div>
            </div>
         </div>
        </div>
    </div>
    </div>    
</div>
  <!----footer---->
  @include('layouts.components.footerouter')
    <!----div end containerfluid end 2-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" 
integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src=" {{asset('dist/pages/piaList.js') }}"></script>
   <script src="{{asset('dist/pages/L.KML.js') }}"></script>
   <script>
    //Map initialize
    //var map = L.map('map').setView([20.5937, 78.9629], 5);
    var map = L.map('map').setView([21.7679, 78.8718], 7);
    
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
      
      //[20.5937, 78.9629]
      //marker 
     // var singlemarker = L.marker([20.5937, 78.9629], {icon:myIcon, draggable:true});
     // var popup = singlemarker.bindPopup('This is inida!'+ singlemarker.getLatLng()).openPopup();
      //popup.addTo(map);

        // multiple marker add to map
        var locations = [
        ["LOCATION_1", 20.5937, 78.9629],
        ["LOCATION_2", 21.5937, 79.9629],
        ["LOCATION_3", 30.417265, 78.259003],
        ["LOCATION_4", 23.5937, 79.0629],
        ["LOCATION_5", 24.5937, 83.0229],
        ["LOCATION_6", 25.5937, 81.9629],
        ["LOCATION_7", 25.0937, 84.9629],
        ["LOCATION_8", 15.523026, 79.312923],
        ["LOCATION_9", 23.105367, 75.329306],
        ["LOCATION_10", 18.389293, 73.901981],
        ["LOCATION_10", 26.111102, 75.010585],
        ["LOCATION_11", 23.087637, 75.971375],
        ["LOCATION_12", 24.574902, 79.592813],
        ["LOCATION_13", 25.4937, 82.0129],
        ["location_14", 20.287075, 75.924920],
        ["location_15", 19.410245, 77.478622],
        ["location_16", 20.825347, 81.006229],
        ["location_17", 23.195148, 77.813869],
        ["location_18", 21.983976, 78.072543],
        ["location_19", 33.441466, 74.466488],
        ["location_20", 18.657627, 82.706234],
        ["location_21", 12.261248, 76.917158],
        ["location_22", 9.085899, 76.761788],
        ["location_23", 16.265769, 74.959494],
        ["location_24", 23.209666, 72.319889],

        ];

        for (var i = 0; i < locations.length; i++) {
        marker = new L.marker([locations[i][1], locations[i][2]], {icon:myIcon, draggable:true})
            .bindPopup(locations[i][0])
            .addTo(map);
        }





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

   
   
   
   
   
   
   
   
   
   
   
   
   
    <!-- old code
    <link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
   <script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script>
    //Map initialize
    var attribution = new ol.control.Attribution({
        collapsible: false
        });

    var map = new ol.Map({
     controls: ol.control.defaults({attribution: false}).extend([attribution]),
     layers: [
         new ol.layer.Tile({
             source: new ol.source.OSM({
                 url: 'https://tile.openstreetmap.be/osmbe/{z}/{x}/{y}.png',
                 attributions: [ ol.source.OSM.ATTRIBUTION, 'Tiles courtesy of <a href="https://geo6.be/">GEO-6</a>' ],
                 maxZoom: 18
             })
            })
        ],
        target: 'map',
        view: new ol.View({
            center: ol.proj.fromLonLat([4.35247, 50.84673]),
            maxZoom: 18,
            zoom: 12
        })
    });
//25.678924, 78.118629
    //add marker
    var layer = new ol.layer.Vector({
        source: new ol.source.Vector({
            features: [
                new ol.Feature({
                    geometry: new ol.geom.Point(ol.proj.fromLonLat([4.35247, 50.84673]))
                })
            ]
        })
    });
    map.addLayer(layer);

    //initialize popup content section
    var container = document.getElementById('popup');
    var content = document.getElementById('popup-content');
    var closer = document.getElementById('popup-closer');

    var overlay = new ol.Overlay({
        element: container,
        autoPan: true,
        autoPanAnimation: {
            duration: 250
        }
    });
    map.addOverlay(overlay);

    closer.onclick = function() {
        overlay.setPosition(undefined);
        closer.blur();
        return false;
    };
    
    //function to open the popup
    map.on('singleclick', function (event) {
        if (map.hasFeatureAtPixel(event.pixel) === true) {
            var coordinate = event.coordinate;

            content.innerHTML = '<b>Hello world!</b><br />I am a popup.';
            overlay.setPosition(coordinate);
        } else {
            overlay.setPosition(undefined);
            closer.blur();
        }
    });

</script> -->
</body>
@endsection