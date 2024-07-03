<?php

/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/

$servername = "localhost";

// REPLACE with your Database name
$dbname = "id21995682_aircheckdb";
// REPLACE with Database user
$username = "id21995682_aircheckdb";
// REPLACE with Database user password
$password = "Charcos123!";

header('Content-Type: application/json'); // Set the content type to JSON

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM average";
    $result = $conn->query($sql);

    $data = array(); // Initialize an array to store the data

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Add each row to the data array
            $data[] = array(
                'id' => $row["id"],
                'timestamp' => $row["timestamp"],
                'location' => $row["location"],
                'pm25' => $row["pm25_average"],
                'pm10' => $row["pm10_average"],
                'pm25remarks' => $row["pm25_remarks"],
                'pm10remarks' => $row["pm10_remarks"]
            );
        }
        // Encode the array as JSON and echo it
        echo json_encode($data, JSON_PRETTY_PRINT);
    } else {
        echo json_encode(array('message' => 'No results'));
    }

    $conn->close();

} else {
    echo json_encode(array('message' => 'No data retrieved with HTTP GET.'));
}
