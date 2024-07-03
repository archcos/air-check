<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Form</title>
</head>
<body>
    <h2>Submit Data</h2>
    <form action="post.php" method="post">
        <!-- Add an input field for api_key -->
        <label for="api_key">API Key:</label>
        <input type="text" name="api_key" required><br>
        
        <label for="device_id">Device ID:</label>
        <input type="text" name="device_id" required><br>

        <label for="pm25">PM2.5:</label>
        <input type="text" name="pm25" required><br>

        <label for="pm10">PM10:</label>
        <input type="text" name="pm10" required><br>

        <label for="pm25remarks">PM2.5 Remarks:</label>
        <input type="text" name="pm25remarks" required><br>

        <label for="pm10remarks">PM10 Remarks:</label>
        <input type="text" name="pm10remarks" required><br>
        
        <!--<label for="timestamp">Timestamp (YYYY-MM-DD HH:MM:SS):</label>-->
        <!--<input type="text" name="timestamp" placeholder="2022-01-01 12:00:00" required><br>-->


        <input type="submit" value="Submit">
    </form>
</body>
</html>
