<?php
require 'con.php';



// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// make a function 
function handle_login($conn){
// Check if there was a login attempt
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the email and password from the login form
  $email = $_POST['email'];
  $password = $_POST['pass'];



  if ($email === "admin23@gmail.com" && $password === "prashant123") {
    // Authentication successful, display the result
    header('Location:admin.php');



} else {


  // Perform validation
  $errors = [];

  // Validate email
  if (empty($email)) {
    $errors[] = "Please enter an email address.";
  }

  // Validate password
  if (empty($password)) {
    $errors[] = "Please enter a password.";
  }

  // If there are no errors, perform login logic
  if (empty($errors)) {
    // Prepare a SQL statement to check if the email and password match a row in the users table
    $stmt = $conn->prepare('SELECT id, username, email, password FROM user_table WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row was found
    if ($result->num_rows == 1) {
      // Fetch the row as an associative array
      $row = $result->fetch_assoc();

      // Check if the password is correct
      if (password_verify($password, $row['password'])) {
        // Start a session
   session_start();
        // Password is correct, so set session variables and redirect to the dashboard
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        header('Location: start.php');
        exit;
      } else {
        // Password is incorrect, so store the error in a session variable
        $_SESSION['loginError'] = 'Incorrect password.';
      }
    } else {
      // No row was found, so store the error in a session variable
      $_SESSION['loginError'] = 'Email not found.';
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
  }
}
}}
 