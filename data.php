<?php

$servername = "aws-0-ap-southeast-1.pooler.supabase.com";
$dbname = "postgres";
$username = "postgres.phlhxvertmsqskgofbug";
$password = "Aircheckqms1234!";
$port = 6543;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to fetch data and sort by particulate_matter_id
    $sql = "SELECT particulate_matter_id, timestamp, device_id, location, pm25, pm10, pm25remarks, pm10remarks 
            FROM tblparticulate_matter
            ORDER BY particulate_matter_id ASC";
    $result = $conn->query($sql);

    $data = array(); // Initialize an array to store the data
    $counter = 1;    // Initialize the counter

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            // Add each row to the data array
            $data[] = array(
                'id' => $counter,                    // Use the counter as the ID
                'timestamp' => $row["timestamp"],
                'device_id' => $row["device_id"],
                'location' => $row["location"],      // Include location in the data array
                'pm25' => $row["pm25"],
                'pm10' => $row["pm10"],
                'pm25remarks' => $row["pm25remarks"],
                'pm10remarks' => $row["pm10remarks"]
            );
            $counter++; // Increment the counter
        }
    } else {
        $data[] = array('message' => 'No results');
    }

    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Particulate Matter Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="title-container">
            <h1>Particulate Matter Data</h1>
            <form action="export.html" method="post">
                <input type="submit" value="Export to Excel">
            </form>
            <form action="set-location.html" method="get">
                <input type="submit" value="Update Locations">
            </form>
        </div>
        <table>
            <tr>
                <th>No.</th>
                <th>Timestamp</th>
                <th>Device ID</th>
                <th>Location</th> <!-- Add Location header -->
                <th>PM2.5</th>
                <th>PM2.5 Remarks</th>
                <th>PM10</th>
                <th>PM10 Remarks</th>
            </tr>
            <?php foreach ($data as $row): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['timestamp']; ?></td>
                <td><?php echo $row['device_id']; ?></td>
                <td><?php echo $row['location']; ?></td> <!-- Display location -->
                <td><?php echo $row['pm25']; ?></td>
                <td><?php echo $row['pm25remarks']; ?></td>
                <td><?php echo $row['pm10']; ?></td>
                <td><?php echo $row['pm10remarks']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>
    </div>
</body>
</html>
