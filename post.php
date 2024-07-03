<?php

$servername = "localhost";
$dbname = "id21995682_checkairdb";
$username = "id21995682_checkairdb";
$password = "Charcos123!";
$api_key_value = "tPmAT5Ab3j7F9";

$api_key = $device_id = $location = $pm25 = $pm10 = $pm25remarks = $pm10remarks = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if ($api_key == $api_key_value) {
        $device_id = test_input($_POST["device_id"]);
        $pm25 = test_input($_POST["pm25"]);
        $pm10 = test_input($_POST["pm10"]);
        $pm25remarks = test_input($_POST["pm25remarks"]);
        $pm10remarks = test_input($_POST["pm10remarks"]);
        
        date_default_timezone_set('Asia/Manila');
        $current_time = date('Y-m-d H:i:s');
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Fetch the location based on device_id
        $sql_location = "SELECT location FROM tbldevice WHERE device_id = '$device_id'";
        $result = $conn->query($sql_location);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $location = $row['location'];
        } else {
            echo "Device ID not found.";
            $conn->close();
            exit();
        }
        
        $sql = "INSERT INTO tblparticulate_matter (device_id, location, pm25, pm10, pm25remarks, pm10remarks, timestamp)
        VALUES ('$device_id', '$location', '$pm25', '$pm10', '$pm25remarks', '$pm10remarks', '$current_time')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $conn->close();
    } else {
        echo "Wrong API Key provided.";
    }
} else {
    echo "No data posted with HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
