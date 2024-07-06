<?php
// Redirect to setlocation.php if not accessed directly
// Redirect to setlocation.php if not accessed directly, unless coming from setloc.php
if (!isset($_SERVER['HTTP_REFERER']) || basename($_SERVER['HTTP_REFERER']) !== 'set-location.php') {
    // Allow access if coming from setloc.php after update
    if (!isset($_GET['updated']) || $_GET['updated'] !== 'true') {
        header("Location: set-location.php");
        exit();
    }
}

$servername = "localhost";

// REPLACE with your Database name
$dbname = "id21995682_checkairdb";
// REPLACE with Database user
$username = "id21995682_checkairdb";
// REPLACE with Database user password
$password = "Charcos123!";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbldevice";
$result = $conn->query($sql);

$devices = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $devices[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Location</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Device Locations</h1>
        <table>
            <tr>
                <th>Device ID</th>
                <th>Location</th>
            </tr>
            <?php foreach ($devices as $device): ?>
            <tr>
                <td><?php echo $device['device_id']; ?></td>
                <td><?php echo $device['location']; ?></td>
               
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div>
    <form action="location-update.php" method="post">
              <h2>Update Device Location</h2>

            <label for="device_id">Select Device ID:</label>
            <select name="device_id" required>
                <?php foreach ($devices as $device): ?>
                    <option value="<?php echo $device['device_id']; ?>"><?php echo $device['device_id']; ?></option>
                <?php endforeach; ?>
            </select><br>

            <label for="location">Location:</label>
            <input type="text" name="location" required><br>

            <input type="submit" value="Update Location">
    </form>
</div>
</body>
</html>
