

<?php
include 'con.php'; // Include your database connection

session_start();


    // Check if the user is logged in
    if (!isset($_SESSION['user_id'])) {
        // Redirect to the login page or display an error message
        header("Location: login.php"); // Replace with your login page URL
        exit(); // Stop further script execution
    }

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the variables are set
if (isset($_POST['totalPrice'], $_POST['foodData'], $_POST['quantityData'], $_POST['priceData'])) {
    // Get the values from the form
    $totalPrice = $_POST['totalPrice'];
    $foodDataJSON = $_POST['foodData'];
    $quantityDataJSON = $_POST['quantityData'];
    $priceDataJSON = $_POST['priceData'];
    $userId = $_SESSION['user_id']; // Assuming the user's id is stored in the session as 'id'


    // Decode the JSON data into arrays
    $foodData = json_decode($foodDataJSON, true);
    $quantityData = json_decode($quantityDataJSON, true);
    $priceData = json_decode($priceDataJSON, true);

    // Check if the decoded data is valid arrays
    if (is_array($foodData) && is_array($quantityData) && is_array($priceData)) {
        // Loop through the arrays
        for ($i = 0; $i < count($foodData); $i++) {
            $food = $foodData[$i];
            $quantity = $quantityData[$i];
            $price = $priceData[$i];

            // Validate the quantity as a positive integer
            if (is_numeric($quantity) && intval($quantity) > 0) {
                // Convert the quantity to an integer
                $quantity = intval($quantity);

                // Insert data into the database
                $sql = "INSERT INTO food (food, quantity, price, total_price, user_id) VALUES ('$food', '$quantity', '$price', '$totalPrice', '$userId')";

                if ($conn->query($sql) === TRUE) {
                    echo "Order placed successfully for $food!";
                  
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Error: Invalid quantity value for $food.";
            }
        }  ?><br><br> <button  onclick="location.href = 'home.php'">Go Back to Menu</button><?php

    } else {
        echo "Error: Invalid data received.";
    }
} else {
    echo "Error: One or more required variables are not set.";
}

// Close the database connection
$conn->close();
?>

