<?php
require 'con.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the email and DOB from the form
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    // Validate the email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email, display an error message
        $error = "Invalid email address.";
    } else {
        // Check if the email and DOB match the values stored in the database
        $stmt = $conn->prepare('SELECT email FROM user_table WHERE email = ? AND date = ?');
        $stmt->bind_param('ss', $email, $dob);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {
            // Email and DOB match, redirect to password reset page with email value
            $location = 'reset_pass.php?value=' . urlencode($email);
            header("Location: $location");
            exit();
        } else {
            // Email and DOB do not match
            $error = "Invalid email address or date of birth.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="abd.css">
</head>
<body>
    <h2 class="forgot_password">Forgot Password</h2>
    <!-- the code below is for the error or success message  -->
    <?php if (isset($error)): ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php if (isset($success)): ?>
        <div style="color: green;"><?php echo $success; ?></div>
    <?php endif; ?>
    <!-- end of the messages  -->
    <div class="form-box forgot">
    <form action="forgot.php" method="post">
        <div class="input-box">
            <input type="email" name="email" placeholder="Email" required><br>
        </div>
        <div class="input-box">
            <input type="text" name="dob" placeholder="Date of Birth" required>
        </div>
        <button class="btn">Check</button>
    </form>
    </div>
</body>
</html>
