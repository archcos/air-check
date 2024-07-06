<?php

$servername = "localhost";
$dbname = "id21995682_checkairdb";
$username = "id21995682_checkairdb";
$password = "Charcos123!";

$device_id = $location = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $device_id = test_input($_POST["device_id"]);
    $location = test_input($_POST["location"]);
    
    // Set your timezone
    date_default_timezone_set('Asia/Manila');
    
    // Get the current time in 12-hour format with AM/PM
    $current_time = date('Y-m-d H:i:s');

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // Update the location based on device_id
    $sql = "UPDATE tbldevice SET location='$location', location_updated='$current_time' WHERE device_id='$device_id'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: locations.php?updated=true");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
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
