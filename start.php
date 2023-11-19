<?php
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    include 'header1.php';
}else{
    include 'header.php';
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="abd.css">
    <title>Aa Foods</title>
</head>
<body>

<div class="start">

    <h2>Start your day with Tasty foods.
    </h2>

<h3>high Class foods from different restaurants.</h3>
<h3>Choose your type of food. Healthy or Tasty.</h3><br><br>

<a href="home.php"><h2>Browse Foods</h2></a>

<br><br><br><br><br><br><br>
<br><br>
<img src="pics/start.png" alt="pic of a delicacy" id="food"></div>

<?php include 'footer.php'; ?>
</body>
</html>