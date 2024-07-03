<?php

$servername = "localhost";
$dbname = "id21995682_checkairdb";
$username = "id21995682_checkairdb";
$password = "Charcos123!";

header('Content-Type: application/json'); // Set the content type to JSON

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die(json_encode(array('message' => 'Connection failed: ' . $conn->connect_error)));
    }

    $selectedLocation = $_GET['location']; // Get the location parameter from the URL
    
    // SQL query to fetch the latest data for the specified location
    $sql = "SELECT t1.particulate_matter_id, t1.timestamp, t1.device_id, t1.location, t1.pm25, t1.pm10, t1.pm25remarks, t1.pm10remarks 
            FROM tblparticulate_matter t1
            INNER JOIN (
                SELECT location, MAX(timestamp) as max_timestamp
                FROM tblparticulate_matter
                GROUP BY location
            ) t2 ON t1.location = t2.location AND t1.timestamp = t2.max_timestamp
            WHERE t1.location = '$selectedLocation' // Filter results by the specified location
            ORDER BY t1.particulate_matter_id ASC";

    $result = $conn->query($sql);

    $data = array(); // Initialize an array to store the data

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Add each row to the data array
            $data[] = array(
                'id' => $row["particulate_matter_id"],
                'timestamp' => $row["timestamp"],
                'device_id' => $row["device_id"],
                'location' => $row["location"], // Include location in the data array
                'pm25' => $row["pm25"],
                'pm10' => $row["pm10"],
                'pm25remarks' => $row["pm25remarks"],
                'pm10remarks' => $row["pm10remarks"]
            );
        }
        echo json_encode($data); // Output the data array as JSON
    } else {
        echo json_encode(array('message' => 'No results'));
    }

    $conn->close();

} else {
    echo json_encode(array('message' => 'No data retrieved with HTTP GET.'));
}
?>
