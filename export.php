<?php

$servername = "localhost";
// REPLACE with your Database name
$dbname = "id21995682_checkairdb";
// REPLACE with Database user
$username = "id21995682_checkairdb";
// REPLACE with Database user password
$password = "Charcos123!";

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=particulate_matter_data.xls');

echo "ID\tTimestamp\tDevice ID\tLocation\tPM2.5\tPM10\tPM2.5 Remarks\tPM10 Remarks\n";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Modify the SQL query to join tblparticulate_matter and tbldevice
$sql = "SELECT particulate_matter_id, timestamp, device_id, location, pm25, pm10, pm25remarks, pm10remarks 
        FROM tblparticulate_matter
        ORDER BY particulate_matter_id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row["particulate_matter_id"] . "\t" . $row["timestamp"] . "\t" . $row["device_id"] . "\t" . $row["location"] . "\t" . $row["pm25"] . "\t" . $row["pm25remarks"] . "\t" ."\t" . $row["pm10"] .  $row["pm10remarks"] . "\n";
    }
}

$conn->close();

?>
