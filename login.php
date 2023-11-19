


<?php
include 'headear.php';
?>
<?php
// importing the connection to the database 
require_once 'con.php'; 
// importing the login file 
require 'logconfig.php';
// calling the login function 
handle_login($conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="abd.css">
    <title>login</title>
</head>
<body>
    <table class="login_table">
    <form action="" method="post">
        <caption class="caption">Log In</caption>
    
        
   <tr> 
    <td><label for="username">Email</label></td></tr>
    <tr> <td><input type="email" name="email" id="email" required></td> </tr>

   <tr><td> <label for="pass">Password</label></td></tr>
   <tr> <td>  <input type="password" name="pass" id="pass"></td></tr>

   <tr><td><a href="forgot.php">Forgot Password</a></td></tr>

    <tr><td><input type="submit" value="Log In" id="submit"></td></tr>
   <!-- this provides the error in red color  -->
   <?php if (isset($_SESSION['loginError'])): ?>
                        <div style="color: red;"><?php echo $_SESSION['loginError']; ?></div>
                         <?php unset($_SESSION['loginError']); ?>
                    <?php endif; ?>
                    <!-- end of php for the error in login page  -->
    <tr><td>

       Don't have an account? <a href="signup.php">Create Now</a>
    </td></tr>
    </form>

    </table>
   
   
   <?php
   include 'footer.php';
   ?>
</body>
</html>