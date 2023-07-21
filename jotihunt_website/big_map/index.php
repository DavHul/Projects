<html>
    <head>
        <title>JotiHunt-JSG</title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
            integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
            crossorigin=""/>
        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
            integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
            crossorigin=""></script>
        
        <?php
            $json = file_get_contents('../src/data_groepen.json');
        ?>
        <script>
            var clubhuizen=<?php echo $json ?>;
            var clubhuis_icon = L.icon({
                iconUrl: './blokhut.png',
                iconSize:     [26, 26], // size of the icon
                iconAnchor:   [13, 13], // point of the icon which will correspond to marker's location
                popupAnchor:  [13, 13] // point from which the popup should open relative to the iconAnchor
            });
            var HQ_icon = L.icon({
                iconUrl: './HQ.png',
                iconSize:     [26, 26], // size of the icon
                iconAnchor:   [13, 13], // point of the icon which will correspond to marker's location
                popupAnchor:  [13, 13] // point from which the popup should open relative to the iconAnchor
            });
            var hunter_icon = L.icon({
                iconUrl: './hunter.png',
                iconSize:     [26, 26], // size of the icon
                iconAnchor:   [13, 13], // point of the icon which will correspond to marker's location
                popupAnchor:  [13, 13] // point from which the popup should open relative to the iconAnchor
            });

            var fox_alpha_icon = L.icon({
                iconUrl: './fox_alpha.png',
                iconSize:     [20, 20], // size of the icon
                iconAnchor:   [10, 10], // point of the icon which will correspond to marker's location
                popupAnchor:  [10, 10] // point from which the popup should open relative to the iconAnchor
            });
            var fox_bravo_icon = L.icon({
                iconUrl: './fox_bravo.png',
                iconSize:     [20, 20], // size of the icon
                iconAnchor:   [10, 10], // point of the icon which will correspond to marker's location
                popupAnchor:  [10, 10] // point from which the popup should open relative to the iconAnchor
            });
            var fox_charlie_icon = L.icon({
                iconUrl: './fox_charlie.png',
                iconSize:     [20, 20], // size of the icon
                iconAnchor:   [10, 10], // point of the icon which will correspond to marker's location
                popupAnchor:  [10, 10] // point from which the popup should open relative to the iconAnchor
            });
            var fox_delta_icon = L.icon({
                iconUrl: './fox_delta.png',
                iconSize:     [20, 20], // size of the icon
                iconAnchor:   [10, 10], // point of the icon which will correspond to marker's location
                popupAnchor:  [10, 10] // point from which the popup should open relative to the iconAnchor
            });
            var fox_echo_icon = L.icon({
                iconUrl: './fox_echo.png',
                iconSize:     [20, 20], // size of the icon
                iconAnchor:   [10, 10], // point of the icon which will correspond to marker's location
                popupAnchor:  [10, 10] // point from which the popup should open relative to the iconAnchor
            });
        </script>
    </head>
    <body>
        <div id="map" style="height: 100%;"></div>
        <script>
            var clubhuis_locaties = L.layerGroup();
            //console.log(clubhuizen[1]);
            for (let i = 0; i < clubhuizen.length; i++) {
                var marker = L.marker([clubhuizen[i]["lat"], clubhuizen[i]["long"]], {icon: clubhuis_icon})
                .bindPopup(clubhuizen[i]["name"]+"<br>"+clubhuizen[i]["street"]+" "+clubhuizen[i]["housenumber"]+"<br>"+clubhuizen[i]["postcode"]+" "+clubhuizen[i]["city"])
                .addTo(clubhuis_locaties);
            }
            
            var hunters_layer = L.layerGroup();
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //console.log(this.responseText);
                    let hunters = JSON.parse(this.responseText); // Assign the value to 'hunters'
                    for (let i = 0; i < hunters.length; i++) {
                        var marker = L.marker([hunters[i]["last_location_lat"], hunters[i]["last_location_long"]], { icon: hunter_icon })
                        .bindPopup("Name: "+hunters[i]["name"] + "<br>number of persons: " + hunters[i]["number_persons"] + "<br>status: " + hunters[i]["status"] + "<br>lat: " + hunters[i]["last_location_lat"] + "<br>long: " + hunters[i]["last_location_long"] + "<br>timestamp: " + hunters[i]["timestamp_last_location"] + "<br> number of hunts:" + hunters[i]["number_hunts"])
                        .addTo(hunters_layer);
                    }
                }
            };
            xmlhttp.open("GET", "../src/get_hunters.php?q=get_all", true);
            xmlhttp.send();

            var foxes_layer = L.layerGroup();
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let foxes = JSON.parse(this.responseText); // Assign the value to 'hunters'
                    //console.log(foxes[0][0]["location_lat"]);
                    var alpha_locations = [];
                    for (let i = 0; i < foxes[0].length; i++) {
                        alpha_locations.push([foxes[0][i]["location_lat"], foxes[0][i]["location_long"]]);
                        var marker = L.marker([foxes[0][i]["location_lat"], foxes[0][i]["location_long"]], { icon: fox_alpha_icon })
                        .bindPopup("Timestamp: " + foxes[0][i]["timestamp"] + "<br> hunter_id:" + foxes[0][i]["hunter_id"])
                        .addTo(foxes_layer);
                    }
                    var alpha_line = L.polyline(alpha_locations, {color: 'green'}).addTo(foxes_layer);

                    var bravo_locations = [];
                    for (let i = 0; i < foxes[1].length; i++) {
                        alpha_locations.push([foxes[1][i]["location_lat"], foxes[1][i]["location_long"]]);
                        var marker = L.marker([foxes[1][i]["location_lat"], foxes[1][i]["location_long"]], { icon: fox_bravo_icon })
                        .bindPopup("Timestamp: " + foxes[1][i]["timestamp"] + "<br> hunter_id:" + foxes[1][i]["hunter_id"])
                        .addTo(foxes_layer);
                    }
                    var bravo_line = L.polyline(bravo_locations, {color: 'red'}).addTo(foxes_layer);

                    var charlie_locations = [];
                    for (let i = 0; i < foxes[2].length; i++) {
                        alpha_locations.push([foxes[2][i]["location_lat"], foxes[2][i]["location_long"]]);
                        var marker = L.marker([foxes[2][i]["location_lat"], foxes[2][i]["location_long"]], { icon: fox_charlie_icon })
                        .bindPopup("Timestamp: " + foxes[2][i]["timestamp"] + "<br> hunter_id:" + foxes[2][i]["hunter_id"])
                        .addTo(foxes_layer);
                    }
                    var charlie_line = L.polyline(charlie_locations, {color: 'red'}).addTo(foxes_layer);

                    var delta_locations = [];
                    for (let i = 0; i < foxes[3].length; i++) {
                        alpha_locations.push([foxes[3][i]["location_lat"], foxes[3][i]["location_long"]]);
                        var marker = L.marker([foxes[3][i]["location_lat"], foxes[3][i]["location_long"]], { icon: fox_delta_icon })
                        .bindPopup("Timestamp: " + foxes[3][i]["timestamp"] + "<br> hunter_id:" + foxes[3][i]["hunter_id"])
                        .addTo(foxes_layer);
                    }
                    var delta_line = L.polyline(delta_locations, {color: '#00ffff'}).addTo(foxes_layer);

                    var echo_locations = [];
                    for (let i = 0; i < foxes[4].length; i++) {
                        alpha_locations.push([foxes[4][i]["location_lat"], foxes[4][i]["location_long"]]);
                        var marker = L.marker([foxes[4][i]["location_lat"], foxes[4][i]["location_long"]], { icon: fox_echo_icon })
                        .bindPopup("Timestamp: " + foxes[4][i]["timestamp"] + "<br> hunter_id:" + foxes[4][i]["hunter_id"])
                        .addTo(foxes_layer);
                    }
                    var echo_line = L.polyline(echo_locations, {color: '#ff00ff'}).addTo(foxes_layer);
                }
            };
            xmlhttp.open("GET", "../src/get_foxes.php?q=get_all", true);
            xmlhttp.send();

            <!-- kaartsoorten lagen --!>
            var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 20,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            });
            var map = L.map('map', {
                center: [51.968624302373165, 5.560770443088341 ],
                zoom: 9,
                layers: [osm, clubhuis_locaties, hunters_layer, foxes_layer]
            });	

            var HQ_marker = L.marker([51.968624302373165, 5.560770443088341 ], {icon: HQ_icon})
                .bindPopup("HQ")
                .addTo(map);
            var HQ_cirkel = L.circle([51.968624302373165, 5.560770443088341 ], {
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: 500
            }).addTo(map);

            <!-- extra kaartsoorten --!>
            var baseMaps = {
            "OpenStreetMap": osm
            };
            <!-- extra lagen --!>
            var overlayMaps = {
                "Clubhuis locaties": clubhuis_locaties,
                "Hunters": hunters_layer,
                "Vossen": foxes_layer
            };
            var layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);
            
            
        </script>   
    </body>
</html>