<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the entered PIN from the form
    $enteredPIN = isset($_POST['pin']) ? $_POST['pin'] : '';

    // Replace '1234' with your actual PIN
    if ($enteredPIN === '1234') {
        // Redirect to another PHP page
        header("Location: locations.php");
        exit(); // Ensure no further code execution
    } else {
        $errorMessage = 'Incorrect PIN. Try again.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Please Insert PIN</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input {
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        p {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form method="post">
        <?php if (isset($errorMessage)): ?>
            <p><?php echo $errorMessage; ?></p>
        <?php endif; ?>

        <h1>Enter PIN</h1>
        <label for="pin">PIN:</label>
        <input type="password" name="pin" id="pin" maxlength="4" required />
        <button type="submit">Submit</button>
    </form>
</body>
</html>
