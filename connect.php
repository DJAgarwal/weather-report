<?php 
    $servername = "localhost";
    $user = "root";
    $pass = "";
    $db = "weather_report";
    $lat = $_POST["coord"]["lat"];
    $long = $_POST["coord"]["lon"];
    $weather = $_POST["weather"][0]["main"];
    $weather_desc = $_POST["weather"][0]["description"];
    $temp = $_POST["main"]["temp"];
    $min_temp = $_POST["main"]["temp_min"];
    $max_temp = $_POST["main"]["temp_max"];
    $pressure = $_POST["main"]["pressure"];
    $humidity = $_POST["main"]["humidity"];
    $wind_speed = $_POST["wind"]["speed"];

    $con = new mysqli($servername,$user, $pass, $db);
    $stmt = $con->prepare("INSERT INTO weather_data (lat,`long`,weather,weather_desc,temp,min_temp,max_temp,pressure,humidity,wind_speed) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssssssss", $lat , $long, $weather, $weather_desc, $temp, $min_temp, $max_temp, $pressure, $humidity, $wind_speed);
    $stmt->execute();
    $con->close();        
?>