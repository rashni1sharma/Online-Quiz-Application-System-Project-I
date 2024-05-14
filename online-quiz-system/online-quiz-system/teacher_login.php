<?php
// Signup Validation
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    // Retrieve form data
    $form_username = $_POST["username"];
    $form_password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];

    // Perform validation
    if (empty($form_username) || empty($form_password) || empty($confirmPassword)) {
        echo "Please fill in all fields.";
    } elseif ($form_password != $confirmPassword) {
        echo "Passwords do not match.";
    } else {
        // Save user data to database or perform other actions
        $servername = "localhost";
        $db_username = "username";
        $db_password = "";
        $dbname = "online_quiz_db";

        // Create a new MySQLi connection
        $conn = mysqli_connect('localhost', 'root', '', 'online_quiz_db');

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Hash the password
        $hashed_password = password_hash($form_password, PASSWORD_DEFAULT);

        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");

        // Bind the parameters and execute the statement
        $stmt->bind_param("ss", $form_username, $hashed_password);
        $stmt->execute();

        // Check if the data was inserted successfully
        if ($stmt->affected_rows === 1) {
            header("Location: teacher.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
          }
        }
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url("../online-quiz-system/download.jpg") center/cover fixed;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
        }

        .form-container h2 {
            margin-bottom: 20px;
        }

        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            background: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container button:hover {
            background: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>Teacher login</h2>
            <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="confirm_password" placeholder="Confirm Password">
                <button type="submit" name="signup">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
