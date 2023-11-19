<?php
require 'con.php';

$email = '';

if (isset($_GET['value'])) {
    $email = $_GET['value'];
} elseif (isset($_POST['email'])) {
    $email = $_POST['email'];
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the new password from the form
    $newPassword = $_POST['new_password'];

    $hashed_password = password_hash($newPassword, PASSWORD_BCRYPT);

    // Update the password in the database
    $stmt = $conn->prepare('UPDATE user_table SET password = ? WHERE email = ?');
    $stmt->bind_param('ss', $hashed_password, $email);
    $stmt->execute();

    if ($stmt->affected_rows === 1) {
        // Password updated successfully
        $resetSuccess = "Password has been reset successfully.";
    } else {
        // Failed to update the password
        $resetError = "Failed to reset password. Please try again.";
    }
}
?>
<!-- end of php  -->

<!-- start of html  -->
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="abd.css">
</head>
<body>
    <h2 class="forgot_password">Reset Password</h2>
    <div class="form-box forgot">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
            <div class="input-box">
                <input type="password" name="new_password" placeholder="New Password" required>
            </div>
            <!-- for the error  -->
            <?php if (isset($resetError)): ?>
                <div style="color: red;"><?php echo $resetError; ?></div>
            <?php endif; ?>
            <!-- the error code is done and the code below is for the successful reset of password  -->
            <?php if (isset($resetSuccess)): ?>
                <div style="color: green;"><?php echo $resetSuccess; ?></div>
                <button class="btn1" onclick="location.href = 'login.php'">Go to Login page</button>
            <?php else: ?>
                <button class="btn1">Reset Password</button>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>