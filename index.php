<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Weather Report</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <?php
            // if(isset($_SERVER['REMOTE_ADDR'])) {
            //     $ip = $_SERVER['REMOTE_ADDR'];
            // } else {
                $ip= "49.36.232.208";
            // }
            $ipData = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            $countryName = $ipData->geoplugin_countryName;
            $countryCode = $ipData->geoplugin_countryCode; 
            $latitude= $ipData->geoplugin_latitude;
            $longitude = $ipData->geoplugin_longitude;   
        ?>
        <div class="card">
            <div class="card-header">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3">
                            <h5 class="float-start">Welcome user, <?php echo $countryName; ?></h5>
                            <img src="https://flagcdn.com/w40/<?php echo strtolower($countryCode)?>.png" width="40" alt="Flag Image" class="ms-2">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <button type="button" onclick="getUser()" class="btn btn-primary mb-2">Click to create random user</button>
                <div class="col-lg-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone No.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="edit">
                            <tr>
                        </tbody>
                    </table>
                </div> 
                <button type="button" onclick="getWeather()" class="btn btn-primary mb-2">Click to get current weather data</button> 
                <div class="col-lg-6">
                    <table class="table table-bordered">
                        <tbody id="editWeather"></tbody>
                    </table>
                </div> 
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            function getUser() {
                var username = Math.random().toString(36).substr(2, 9);
                var phone = Math.random().toString().slice(2,11);
                $.ajax({
                    url: "https://reqres.in/api/users",
                    type: "POST",
                    data: {
                        name: username,
                        email: username+"@gmail.com",
                        phone: phone
                    },
                    success: function(response){
                        var newRow = '<tr id="edit"><td>'+response.name+'</td><td>'+response.email+'</td><td>'+response.phone+'</td></tr>';
                        $('#edit').replaceWith(newRow);
                    }
                });
            }
            function getWeather() {
                $.ajax({
                    url: "https://api.openweathermap.org/data/2.5/weather?lat="+<?php echo $latitude ?>+"&lon="+<?php echo $longitude ?>+"&appid=9222e51f6344f4403b37658c814acdbf",
                    type: "POST",
                    success: function(response){
                        console.log(response);
                        var newWeatherRow = '<tbody id="editWeather">'+
                                     '<tr><th>Latitude</th><td>'+response.coord.lat+'</td></tr>'+
                                     '<tr><th>Longitude</th><td>'+response.coord.lon+'</td></tr>'+
                                     '<tr><th>Weather</th><td>'+response.weather[0].main+'</td></tr>'+
                                     '<tr><th>Weather Description</th><td>'+response.weather[0].description+'</td></tr>'+
                                     '<tr><th>Temperature(In Kelvin)</th><td>'+response.main.temp+'</td></tr>'+
                                     '<tr><th>Min Temperature(In Kelvin)</th><td>'+response.main.temp_min+'</td></tr>'+
                                     '<tr><th>Max Temperature(In Kelvin)</th><td>'+response.main.temp_max+'</td></tr>'+
                                     '<tr><th>Pressure</th><td>'+response.main.pressure+'</td></tr>'+
                                     '<tr><th>Humidity</th><td>'+response.main.humidity+'</td></tr>'+
                                     '<tr><th>Wind Speed</th><td>'+response.wind.speed+'</td></tr>'+
                                     '</tbody>';
                        $('#editWeather').replaceWith(newWeatherRow);
                        $.ajax({
                            type: "POST",
                            url: "/weather-report/connect.php",
                            data: response,
                            success: function(data) {
                                console.log(data);
                            }
                        });
                    }
                });
            }
        </script>
    </body>
</html>



