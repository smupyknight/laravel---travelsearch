<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="css/main.css" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <style>

            .route-name table, .route-name table td {
                border: 1px solid #444;
                text-align: center;
            }

            .date-range span, .route span:nth-child(1), .price {
                font-weight: 700;
            }

            .date-range {
                background-color: #888;
            }

            .route span:nth-child(1), .price {
                font-size: 30px;
            }

            .detail-panel td {
                font-weight: 700;
                font-size: 17px;
            }

            .one-route {
                margin-bottom: 25px;
            }

            .tab-panel {
                margin-top: 30px;
                margin-bottom: 30px;
                margin-left: calc(16.666666% + 40px);
            }

            .tab-panel input {
                background-color: #aaa;
                border: 1px solid #222 !important;
                font-weight: 700;
                font-size: 15px;
                padding: 5px 10px;
            }

            .tab-panel input.active {
                background-color: #666;
            }

            .route-name {
                margin-top: 150px;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="route-name row">
                <table class="col-md-8 col-md-offset-2">
                    <tr>
                        <td class="date-range"> <span> 27-01 </span> <br> - <br> <span> 30-01 </span> </td>
                        <td class="route"> <span> CONVENTORY -> SOFIA </span> <br> <span> National Express, Ryanair </span> </td>
                        <td class="price"> $39 </td>
                        <td class="time"> <span> 7hr </span> <br> <span> 6hr </span> </td>
                    </tr>
                </table>
            </div>

            <div class="route-detail row">
                <div class="tab-panel col-md-offset-2">
                    <input type="button" value="Way there">
                    <input type="button" value="Way back">
                </div>

                <div class="detail-panel">
                    <table class="one-route col-md-6 col-md-offset-3">
                        <tr> 
                            <td class="from"> Conventory Pool Meads Bus Station </td>
                            <td class="time"> 09:00 </td>
                        </tr>
                        <tr> 
                            <td class="carrier"> <img src="img/down-arrow.png">  National Express, Bus 271 </td>
                            <td class="book"> <input type="button" value="BOOK HERE"> </td>
                        </tr>
                        <tr> 
                            <td class="to"> Manchester Airport </td>
                            <td class="time"> 11:30 </td>
                        </tr>
                    </table>

                    <table class="one-route col-md-6 col-md-offset-3">
                        <tr> 
                            <td class="from"> Conventory Pool Meads Bus Station </td>
                            <td class="time"> 09:00 </td>
                        </tr>
                        <tr> 
                            <td class="carrier"> <img src="img/down-arrow.png">  National Express, Bus 271 </td>
                            <td class="book"> <input type="button" value="BOOK HERE"> </td>
                        </tr>
                        <tr> 
                            <td class="to"> Manchester Airport </td>
                            <td class="time"> 11:30 </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(".tab-panel input").click(function() {
                $(".tab-panel input").removeClass("active");
                $(this).addClass("active");
            });
        </script>
    </body>
</html>
