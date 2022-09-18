<?php 
    $servername = "localhost";
    $user = "root";
    $pass = "";
    $db = "weather_report";
    try {
        $con = mysqli_connect($servername,$user, $pass, $db);
        $sql = "SELECT * FROM weather_data";
        $result = $con->query($sql);
    }
    catch(Exception $e) {
        echo "Error: ".$e->getMessage();
    }         
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Weather Report</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="card">
            <div class="card-header">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-9">
                            <h5>Weather Details</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="col-lg-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="table-primary">
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Weather</th>
                                <th>Weather Description</th>
                                <th>Temperature(In Kelvin)</th>
                                <th>Min. Temperature</th>
                                <th>Max. Temperature</th>
                                <th>Pressure</th>
                                <th>Humidity</th>
                                <th>Wind Speed</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($result) && $result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        echo '<tr>'.
                                            '<td>'.$row["lat"].'</td>'.
                                            '<td>'.$row["long"].'</td>'.
                                            '<td>'.$row["weather"].'</td>'.
                                            '<td>'.$row["weather_desc"].'</td>'.
                                            '<td>'.$row["temp"].'</td>'.
                                            '<td>'.$row["min_temp"].'</td>'.
                                            '<td>'.$row["max_temp"].'</td>'.
                                            '<td>'.$row["pressure"].'</td>'.
                                            '<td>'.$row["humidity"].'</td>'.
                                            '<td>'.$row["wind_speed"].'</td>'.
                                            '</tr>';
                                    }
                                } else {
                                    echo "<tr><td colspan='10'>No Results Found</td></tr>";
                                }?>
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
    </body>
</html>