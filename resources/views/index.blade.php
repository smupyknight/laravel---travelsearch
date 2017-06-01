@extends('header')
@section('content')
        
    <div class="section1">
        <h1 class="text-big-home"> Where are you going next? </h1>
        <h4 class="text-medium-home"> Your dream trip available just in 3 clicks </h4>

        <form type="post">
            <div class="row">
                <div class="col-md-2 col-md-offset-2">
                    <p> Choose a destination </p>
                    <span class="location fa-bg"> <input type="text" class="location" placeholder="My location"> </span>
                </div>
                <div class="col-md-2">
                    <p> Pick a date </p>
                    <span class="calendar fa-bg"> <input type="text" placeholder="When will you travel"> </span>
                </div>
                <div class="col-md-2">
                    <p> Set a budget </p>
                    <span class="currency fa-bg"> <input type="text" placeholder="Budget"> </span>
                </div>
                <div class="col-md-2">
                    <p class="invisible"> Dummy </p>
                    <input type="submit" value="Search">
                </div>
            </div>
        </form>
    </div>
    <div class="section2">

    </div>
        <!-- <div class="flex-center position-ref full-height">
            <div class="content">
                <h1> Where are you going this month? </h1>
                <form method="post" action="routes">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input class="col-md-4 col-md-offset-4" type="text" placeholder="My location..." name="location">
                    <input class="col-md-4 col-md-offset-4" type="text" placeholder="Month..." name="month">
                    <input class="col-md-4 col-md-offset-4" type="text" placeholder="Max price..." name="max_price">
                    <input class="col-md-4 col-md-offset-4" type="text" placeholder="Maximum distance..." name="max_distance">
                    <input class="col-md-4 col-md-offset-4" type="hidden" placeholder="Latitude..." name="lat">
                    <input class="col-md-4 col-md-offset-4" type="hidden" placeholder="Longitude..." name="lon">
                    <button class="col-md-4 col-md-offset-4"> Search </button>
                </form>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            var apikey = "an806922804711966594325939997185";

            $(document).ready(function() {

                var myLocation = JSON.parse('<?php echo json_encode($myLocation); ?>');
                var loc = myLocation.loc.split(",");
                $("input[name='location']").val(myLocation.city + ", " + myLocation.region + ", " + myLocation.country);
                $("input[name='lat']").val(loc[0]);
                $("input[name='lon']").val(loc[1]);

                // var data = {
                //     "Country" : "UK",
                //     "Currency" : "GBP",
                //     "Locale" : "en-GB",
                //     "Adults" : 1,
                //     "Children" : 0,
                //     "Infants" : 0,
                //     "OriginPlace" : "EDI-sky",
                //     "DestinationPlace" : "BRS-sky",
                //     "OutboundDate" : "2017-01-01",
                //     "InboundDate" : "2017-01-07",
                //     "LocationSchema" : "Default",
                //     "CabinClass" : "Economy",
                //     "GroupPricing" : true,
                //     "apikey": "prtl6749387986743898559646983194"
                // }



                // $.get("http://partners.api.skyscanner.net/apiservices/pricing/v1.0", data)
                //     .done(function(response) {
                //         alert(JSON.stringify(response));
                //     });
                
                // $.get("http://partners.api.skyscanner.net/apiservices/pricing/v1.0/UK/GBP/en-GB/EDI-sky/BRS-sky/2017-01-01/2017-01-07?apikey=prtl6749387986743898559646983194")
                //     .done(function(response) {
                //         alert(JSON.stringify(response));
                //     });
            });
        </script> -->

@endsection
