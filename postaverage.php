<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Data to PHP</title>
</head>
<body>

<form action="post_average.php" method="post">
    <label for="api_key">API Key:</label>
    <input type="text" id="api_key" name="api_key" required><br><br>

    <label for="location">Location:</label>
    <input type="text" id="location" name="location" required><br><br>

    <label for="pm25_average">PM2.5 Average:</label>
    <input type="text" id="pm25_average" name="pm25_average" required><br><br>

    <label for="pm10_average">PM10 Average:</label>
    <input type="text" id="pm10_average" name="pm10_average" required><br><br>

    <label for="pm25_remarks">PM2.5 Remarks:</label>
    <input type="text" id="pm25_remarks" name="pm25_remarks" required><br><br>

    <label for="pm10_remarks">PM10 Remarks:</label>
    <input type="text" id="pm10_remarks" name="pm10_remarks" required><br><br>

    <label for="timestamp">Timestamp (YYYY-MM-DD HH:MM:SS):</label>
    <input type="text" id="timestamp" name="timestamp" placeholder="2022-01-01 12:00:00" required><br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
