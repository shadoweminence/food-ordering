<?php
// Create connection
$conn = new mysqli('localhost','root','','food_ordering');

// Check if the connection was successful
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
  }