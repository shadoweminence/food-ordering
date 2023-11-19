<?php include'header1.php'; ?>

<?php
session_start();

// remove all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the login page or any other page you prefer
header("Location: start.php");
exit;
?>