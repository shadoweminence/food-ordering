<?php
include 'headear.php';
?>

<?php
require_once 'con.php'; 

require 'config.php';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Call the handle_register function from the included file
    $errors = handle_register($conn);}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="abd.css">
    <title>Document</title>
</head>
<body>
    <table class="signup_table">
        <form onsubmit="return validateRegForm()" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post" >
        <caption class="caption">Sign Up</caption>
        <tr>
            <td><label for="name">Username</label></td></tr>
            <tr>  <td><input type="text" name="name" id="name"></td> </tr>

        <tr><td><label for="email">Email</label></td></tr>
        <tr><td><input type="email" name="email" id="email"></td>  </tr>

    <tr>
        <td><label for="pass">Password</label></td></tr>
        <tr> <td><input type="password" name="pass" id="pass"></td>
    </tr>

    <tr>
        <td><label for="cpass">Confirm Password</label></td></tr>
        <tr><td><input type="password" name="cpass" id="cpass"></td>
    </tr>

    <tr>
        <td><label for="dob">Date of Birth</label></td></tr>
        <tr><td><input type="date" name="date" id="date"></td>
    </tr>
    <tr>
            <td><label for="location">Location</label></td></tr>
            <tr>  <td><input type="text" name="location" id="location"></td> </tr>

    <tr>
        <td><label for="number">Mobile Number</label></td></tr>
        <tr><td><input type="number" name="number" id="number"></td>
    </tr>

    <?php if (!empty($errors)): ?>
                        
                        <div style="color: red;">
                          <ul>
                            <?php foreach ($errors as $error): ?>
                              <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                          </ul>
                        </div>
                      <?php endif; ?>

<tr><td><input type="submit" value="Sign Up" ></td></tr>
<tr><td>Already have an account? <a href="login.php">Log In</a></td></tr>

    </form></table>

  <?php
  include 'footer.php';
  ?>

   <!-- this validates the register form through js  -->
   <script src="validateReg.js"></script>
</body>
</html>