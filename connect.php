<?php 
    $lat = isset($_POST["coord"]["lat"]) ? $_POST["coord"]["lat"] : '';
    $long = isset($_POST["coord"]["lon"]) ? $_POST["coord"]["lon"] : '';
    $weather = isset($_POST["weather"][0]["main"]) ? $_POST["weather"][0]["main"] : '';
    $weather_desc = isset($_POST["weather"][0]["description"]) ? $_POST["weather"][0]["description"] : '';
    $temp = isset($_POST["main"]["temp"]) ? $_POST["main"]["temp"] : '';
    $min_temp = isset($_POST["main"]["temp_min"]) ? $_POST["main"]["temp_min"] : '';
    $max_temp = isset($_POST["main"]["temp_max"]) ? $_POST["main"]["temp_max"] : '';
    $pressure = isset($_POST["main"]["pressure"]) ? $_POST["main"]["pressure"] : '';
    $humidity = isset($_POST["main"]["humidity"]) ? $_POST["main"]["humidity"] : '';
    $wind_speed = isset($_POST["wind"]["speed"]) ? $_POST["wind"]["speed"] : '';
    $servername = "localhost";
    $user = "root";
    $pass = "";
    $db = "weather_report";
    try {
        $con = mysqli_connect($servername,$user, $pass, $db);
        $stmt = $con->prepare("INSERT INTO weather_data (lat,`long`,weather,weather_desc,temp,min_temp,max_temp,pressure,humidity,wind_speed) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssss", $lat , $long, $weather, $weather_desc, $temp, $min_temp, $max_temp, $pressure, $humidity, $wind_speed);
        $stmt->execute();
        $con->close(); 
        echo "Success: Weather data added to database successfully"; 
    }
    catch(Exception $e) {
        echo "Error: ".$e->getMessage();
    }         
?>