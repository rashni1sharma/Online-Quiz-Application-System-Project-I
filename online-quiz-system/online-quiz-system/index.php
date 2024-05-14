
<?php
session_start(); // Add this line to start the session
include ('./partials/header.php');
include ('./conn/conn.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quizzer</title>
<style>
  body {
    margin: 0;
    background-attachment: fixed;
    padding: 0;
    background: url("../online-quiz-system/download.jpg") center/cover fixed; /* Corrected path and background properties */
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

#myTable {
    border-collapse: collapse;
    width: 80%;
    max-width: 600px; /* Set a max-width for better responsiveness */
    border: 1px solid #000;
    margin-bottom: 20px;
    left:20px;
    bottom: 20px;
}

#myTable td {
    padding: 20px;
}

.intro {
    text-align: center;
}

.intro h1 {
    font-size: 80px;
    margin-bottom: 20px;
}

.intro .btn {
    display: inline-block;
    padding: 10px 20px;
    margin: 0 10px;
    border: 2px solid black;
    text-transform: uppercase;
    font-size: 16px;
    font-weight: bold;
    color: black;
    text-decoration: none;
}

.intro .btn:hover {
    color: black;
    border-color: red;
    background-color: green;
}

.intro h2 {
    font-size: 24px;
}
  </style>
</head>
<body>
    <div class="container">
        <table border="1" id="myTable">
            <tr>
                <td>
                    <h2>Are you ready to test your knowledge and have some fun?</h2><br>
                    Look no further! Here is to challenge you with a variety of exciting quizzes,
                    covering a wide range of topics. Whether you're a history buff, a science enthusiast,
                    a pop culture aficionado, or just someone who loves a good brain teaser, we have something for everyone.
                </td>
            </tr>
        </table>
        <div class="intro">
            <h1>Online Quiz System</h1>
            <a href="login.php" class="btn">Login</a> &emsp;
            <a href="registration.php" class="btn">Register</a>
            <h2>Good Luck.</h2>
        </div>
    </div>

    <?php include ('./partials/footer.php') ?>
</body>
</html>
