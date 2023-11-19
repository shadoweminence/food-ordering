<?php
require 'con.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

function handle_register($conn) {
  // Perform validation
  $errors = [];

  // Check if the form is submitted
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['email'], $_POST['pass'], $_POST['cpass'], $_POST['date'], $_POST['location'], $_POST['number'])) {
    // Getting details
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];
    $DOB = $_POST['date'];
    $location = $_POST['location'];
    $number = $_POST['number'];

    // Validate username
    if (empty($name)) {
      $errors[] = "Please enter a username.";
    }

    // Validate email
    if (empty($email)) {
      $errors[] = "Please enter an email address.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Please enter a valid email address.";
    }

    // Validate password
    if (empty($password)) {
      $errors[] = "Please enter a password.";
    } elseif (strlen($password) < 6) {
      $errors[] = "Password must be at least 6 characters long.";
    }

    // Confirm password
    if ($password !== $cpassword) {
      $errors[] = "Passwords do not match.";
    }

    // Backup email
    if (empty($DOB)) {
      $errors[] = "Please enter a DOB.";
    }

    if (empty($location)) {
      $errors[] = "Please enter a location.";
    }

    //number
    if (empty($number)) {
      $errors[] = "Please enter a number.";
    }

    // If there are no errors, proceed with registration
    if (empty($errors)) {
      // Perform registration logic here

      // Making password hashed
      $hashed_password = password_hash($password, PASSWORD_BCRYPT);
      $stmt = $conn->prepare("INSERT INTO user_table (username, email, password, date,location ,number) VALUES (?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssss", $name, $email, $hashed_password, $DOB,$location, $number);
      $stmt->execute();
      if ($stmt->error) {
        $errors[] = "Error: " . $stmt->error;
      } else {
        // Retrieve the inserted user ID
    $user_id = $stmt->insert_id;
        session_start();
        $_SESSION['user_id'] = $user_id;
        header("Location: home.php");
        exit;
      }
    }
  }
  return $errors; // Return the errors array
}
?>