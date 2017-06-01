@extends('header')
@section('content')
    <div id="map">

    </div>

    <div id="calendarPanel">

    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiDRzH-JgVPUvCf09dThBg6VvtZX1hRKE"></script>
    <script>
        var overlay;
        USGSOverlay.prototype = new google.maps.OverlayView();

        function initMap() {
            var uluru = {lat: -25.363, lng: 131.044};
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: uluru
            });
            var marker = new google.maps.Marker({
              position: uluru,
              map: map
            });
        
            var bounds = new google.maps.LatLngBounds(
                new google.maps.LatLng(-28.363, 131.044),
                new google.maps.LatLng(-25.363, 131.044));
            var srcImage = "img/img_marker.png";
            overlay = new USGSOverlay(bounds, srcImage, map);
        }

        function USGSOverlay(bounds, image, map) {

            // Initialize all properties.
            this.bounds_ = bounds;
            this.image_ = image;
            this.map_ = map;

            this.div_ = null;

            // Explicitly call setMap on this overlay.
            this.setMap(map);
        }

        USGSOverlay.prototype.onAdd = function() {

            var div                 =   document.createElement('div');
            div.style.borderStyle   =   'none';
            div.style.borderWidth   =   '0px';
            div.style.position      =   'absolute';

            var img                 =   document.createElement('img');
            img.src                 =   this.image_;
            img.style.width         =   '100%';
            img.style.height        =   '100%';
            img.style.position      =   'absolute';
            div.appendChild(img);

            var txt                 =   document.createElement('p');
            txt.innerHTML           =   "Charleroi";
            txt.style.position      =   'absolute';
            txt.style.left          =   '90px';
            txt.style.top           =   '30px';
            txt.style.fontSize      =   '20px';
            div.appendChild(txt);

            this.div_ = div;

            var panes = this.getPanes();
            panes.overlayLayer.appendChild(div);

            this.getPanes().overlayMouseTarget.appendChild(div);
            google.maps.event.addDomListener(div, 'click', function() {
                
            });
        };

        USGSOverlay.prototype.draw = function() {
            var overlayProjection = this.getProjection();

            var sw = overlayProjection.fromLatLngToDivPixel(this.bounds_.getSouthWest());
            var ne = overlayProjection.fromLatLngToDivPixel(this.bounds_.getNorthEast());

            // Resize the image's div to fit the indicated dimensions.
            var div = this.div_;
            div.style.left = (sw.x - 90) + 'px';
            div.style.top = (ne.y - 95) + 'px';
            div.style.width = '288px';
            div.style.height = '111px';
        };

        USGSOverlay.prototype.onRemove = function() {
            this.div_.parentNode.removeChild(this.div_);
            this.div_ = null;
        };

        google.maps.event.addDomListener(window, 'load', initMap);
    </script>

<!--        <script type="text/javascript">

            var places = [];
            var carriers = [];
            var apiKey = 'an806922804711966594325939997185';

            var details = JSON.parse('<?php echo json_encode($details); ?>');
            var year = details.month.split('-')[0];
            var month = details.month.split('-')[1];
            var allAirRoutes = [];

            alert(JSON.stringify(details));

            function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
                var R = 6371; // Radius of the earth in km
                var dLat = deg2rad(lat2-lat1);  // deg2rad below
                var dLon = deg2rad(lon2-lon1); 
                var a = 
                    Math.sin(dLat/2) * Math.sin(dLat/2) +
                    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
                    Math.sin(dLon/2) * Math.sin(dLon/2); 
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
                var d = R * c; // Distance in km
                return d;
            }

            function deg2rad(deg) {
                return deg * (Math.PI/180)
            }

            function saveResponse(response) {

                for (i = 0; i < response.Quotes.length; i++) {
                    allAirRoutes.push(response.Quotes[i]);
                }

                for (i = 0; i < response.Places.length; i++) {
                    places.push(response.Places[i]);
                }

                for (i = 0; i < response.Carriers.length; i++) {
                    carriers.push(response.Carriers[i]);
                }
                
            }

            function sortPlaces() {

                for (i = 0; i < places.length; i++) {
                    for (j = i + 1; j < places.length; j++) {
                        if (places[i].PlaceId == places[j].PlaceId) {
                            console.log("Removed");
                            places.splice(j, 1);
                        }
                    }
                }

                for (i = 0; i < places.length; i++) {
                    var minId = i;
                    var minValue = places[i].PlaceId;
                    for (j = i + 1; j < places.length; j++) {
                        if (places[j].PlaceId < minValue) {
                            minId = j;
                            minValue = places[j].PlaceId;
                        }
                    }

                    var tmp = {PlaceId: places[minId].PlaceId, Name: places[minId].Name, Type: places[minId].Type, SkyscannerCode: places[minId].SkyscannerCode};
                    places[minId] = {PlaceId: places[i].PlaceId, Name: places[i].Name, Type: places[i].Type, SkyscannerCode: places[i].SkyscannerCode};
                    places[i] = {PlaceId: tmp.PlaceId, Name: tmp.Name, Type: tmp.Type, SkyscannerCode: tmp.SkyscannerCode};
                }

            }

            function sortCarriers() {

                for (i = 0; i < carriers.length; i++) {
                    for (j = i + 1; j < carriers.length; j++) {
                        if (carriers[i].CarrierId == carriers[j].CarrierId) {
                            console.log("Removed");
                            carriers.splice(j, 1);
                        }
                    }
                }

                for (i = 0; i < carriers.length; i++) {
                    var minId = i;
                    var minValue = carriers[i].CarrierId;
                    for (j = i + 1; j < carriers.length; j++) {
                        if (carriers[j].CarrierId < minValue) {
                            minId = j;
                            minValue = carriers[j].CarrierId;
                        }
                    }

                    var tmp = {CarrierId: carriers[minId].CarrierId, Name: carriers[minId].Name};
                    carriers[minId] = {CarrierId: carriers[i].CarrierId, Name: carriers[i].Name};
                    carriers[i] = {CarrierId: tmp.CarrierId, Name: tmp.Name};
                }

            }

            function removeFarAirports(routes) {

                allAirRoutes = [];
                for (i = 0; i < routes.length; i++) {
                    var distance = getDistanceFromLatLonInKm(parseFloat(details.lat), parseFloat(details.lon), parseFloat(routes[i].Latitude), parseFloat(routes[i].Longitude));
                    if ( distance < parseInt(details.max_distance)) {
                        allAirRoutes.push(routes[i]);
                    }
                }

                for (i = 0; i < allAirRoutes.length; i++) {
                    var OutboundLeg = allAirRoutes[i].OutboundLeg;
                    var InboundLeg = allAirRoutes[i].InboundLeg;

                    // if (typeof places[OutboundLeg.OriginId] === "undefined" || typeof places[OutboundLeg.DestinationId] === "undefined" ||
                    //     typeof OutboundLeg === "undefined" || typeof OutboundLeg.CarrierIds[0] === "undefined") {
                    //     alert(JSON.stringify(allAirRoutes[i]));
                    //     //continue;
                    // }

                    var append_string = '<tr>';
                    append_string += "<td class='date-range'> <span>" + OutboundLeg.DepartureDate + "</span> <br> - <br>" ;
                    append_string += "<span>" + InboundLeg.DepartureDate + "</span> </td>";
                    append_string += "<td class='route'> <span>" + places[OutboundLeg.OriginId].Name + "->" + places[OutboundLeg.DestinationId].Name + "</span>";

                    if (OutboundLeg.CarrierIds.length != 0) {
                        append_string += "<br> <span>" + carriers[OutboundLeg.CarrierIds[0]].Name + "</span> </td>";
                    }
                    else {
                        append_string += "<br> <span> </span> </td>";   
                    }
                    append_string += "<td class='price'> $" + allAirRoutes[i].MinPrice + "</td>";
                    append_string += "<td class='time'> <span> 7hr </span> <br> <span> 6hr </span> </td>";

                    $(".routes").append(append_string);
                }
            }

            function filterRoutes(routes) {

                allAirRoutes = [];
                var departureDate, arrivalDate;
                for (i = 0; i < routes.length; i++) {
                    var route = routes[i];

                    departureDate = new Date(route.OutboundLeg.DepartureDate);
                    arrivalDate = new Date(route.InboundLeg.DepartureDate);

                    var timeDiff = Math.abs(departureDate.getTime() - arrivalDate.getTime());
                    var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 

                    if (diffDays <= 7 && parseInt(route.MinPrice) <= parseInt(details.max_price)) {
                        allAirRoutes.push({QuoteId: route.QuoteId, MinPrice: route.MinPrice, Direct: route.Direct,
                            OutboundLeg: route.OutboundLeg, InboundLeg: route.InboundLeg, QuoteDateTime: route.QuoteDateTime});
                    }
                }
                var count = 0;

                for (i = 0; i < allAirRoutes.length; i++) {
                    $.ajax({
                        url: "http://iatageo.com/getLatLng/" + places[allAirRoutes[i].OutboundLeg.OriginId].SkyscannerCode,
                        type: "GET",
                        success: function(response) {

                            for (j = 0; j < allAirRoutes.length; j++) {
                                if (places[allAirRoutes[j].OutboundLeg.OriginId].SkyscannerCode == response.code) {
                                    var route = allAirRoutes[j];
                                    allAirRoutes[j] = {QuoteId: route.QuoteId, MinPrice: route.MinPrice, Direct: route.Direct,
                                                    OutboundLeg: route.OutboundLeg, InboundLeg: route.InboundLeg, QuoteDateTime: route.QuoteDateTime, 
                                                    Latitude: response.latitude, Longitude: response.longitude};
                                }
                            }
                            count ++;

                            if (count == allAirRoutes.length) {
                                removeFarAirports(allAirRoutes);
                            }
                            
                        },
                        error: function(response) {
                            alert(JSON.stringify(response));
                        }
                    });
                }

            }

            $(document).ready(function() {
                $.ajax({
                    url:  "http://partners.api.skyscanner.net/apiservices/browsequotes/v1.0/GB/GBP/en-GB/HK/anywhere/" 
                        + year + "-" + month + "/"
                        + year + "-" + month + "/"
                        + "?apiKey=" + apiKey,
                    type: "GET",
                    success: function(response) { 

                        saveResponse(response);

                        var strYear = parseInt(year);
                        var strMonth = parseInt(month) + 1;

                        if (month == "12") {
                            strMonth = "01";
                            strYear += 1;
                        }
                        else {
                            if (strMonth < 10) {
                                strMonth = "0" + strMonth;
                            }
                        }

                        $.ajax({
                            url:  "http://partners.api.skyscanner.net/apiservices/browseroutes/v1.0/GB/GBP/en-GB/HK/anywhere/" 
                                + strYear + "-" + month + "/"
                                + strYear + "-" + strMonth + "/"
                                + "?apiKey=" + apiKey,
                            type: "GET",
                            success: function(response) { 

                                saveResponse(response);

                                for (i = 0; i < response.Places.length; i++) {
                                    if (response.Places[i].Type != "Country") {
                                        alert(JSON.stringify(response.Places[i]));
                                        break;
                                    }
                                }
                                alert(JSON.stringify(response.Places));

                                sortPlaces();
                                storePlaces(places);

                                sortCarriers();
                                storeCarriers(carriers);

                                filterRoutes(allAirRoutes);

                            },
                            error: function(response) {

                            }
                        });
                    },
                    error: function(response) {
                        alert("Error occurred. Please try again later");
                    }
                });
            });

            $(document).ready(function() {
                $("table tr").click(function() {
                    $("#detail").submit();
                });
                
                // $.ajax({
                //      url: "http://partners.api.skyscanner.net/apiservices/browsequotes/v1.0/GB/GBP/en-GB/UK/anywhere/2017-01/2017-02/?apiKey=an806922804711966594325939997185",
                //      type: "GET",
                //      beforeSend: function(xhr){
                //         xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                //      },
                //      success: function(response) { 
                //         var quotes = response.Quotes;
                //         allAirRoutes = quotes;

                //         //alert(JSON.stringify(quotes));
                //         //alert(quotes.length);

                //         storePlaces(response.Places);
                //         storeCarriers(response.Carriers);

                //         for (i = 0; i < quotes.length; i++) {
                //             var OutboundLeg = quotes[i].OutboundLeg;
                //             var InboundLeg = quotes[i].InboundLeg;

                //             if (typeof places[OutboundLeg.OriginId] === "undefined" || typeof places[OutboundLeg.DestinationId] === "undefined") {
                //                 alert(JSON.stringify(quotes[i]));
                //                 //continue;
                //             }

                //             var append_string = '<tr>';
                //             append_string += "<td class='date-range'> <span>" + OutboundLeg.DepartureDate + "</span> <br> - <br>" ;
                //             append_string += "<span>" + InboundLeg.DepartureDate + "</span> </td>";
                //             append_string += "<td class='route'> <span>" + places[OutboundLeg.OriginId].Name + "->" + places[OutboundLeg.DestinationId].Name + "</span>";

                //             if (OutboundLeg.CarrierIds.length != 0) {
                //                 append_string += "<br> <span>" + carriers[OutboundLeg.CarrierIds[0]].Name + "</span> </td>";
                //             }
                //             else {
                //                 append_string += "<br> <span> </span> </td>";   
                //             }
                //             append_string += "<td class='price'> $" + quotes[i].MinPrice + "</td>";
                //             append_string += "<td class='time'> <span> 7hr </span> <br> <span> 6hr </span> </td>";

                //             $(".routes").append(append_string);
                //         }
                //     },
                //     error: function(response) {

                //     }
                // });
            });

            function storePlaces(data) {
                var maxId = data[data.length - 1].PlaceId;
                var placeIndex = 0;

                places = [];
                for (i = 0; i <= maxId; i++) {
                    if (data[placeIndex].PlaceId != i) {
                        places.push({});
                    }
                    else {
                        places.push(data[placeIndex ++]);
                    }
                }
            }

            function storeCarriers(data) {
                var maxId = data[data.length - 1].CarrierId;
                var carrierIndex = 0;

                carriers = [];
                for (i = 0; i <= maxId; i++) {
                    if (data[carrierIndex].CarrierId != i) {
                        carriers.push({});
                    }
                    else {
                        carriers.push(data[carrierIndex++]);
                    }
                }
            } -->

@endsection