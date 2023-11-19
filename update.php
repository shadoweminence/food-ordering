<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require 'con.php';


$name = $email = $DOB = $password = $location = $number ='';
$nameErr = ''; $emailErr = ''; $DOBErr = '';

if(isset($_POST['submit'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    if(empty($_POST['name'])){
        $nameErr = "Required";
    }
    
    $email = $_POST['email'];
    if(empty($_POST['email'])){
        $emailErr = "Required";
    }

    $DOB = $_POST['DOB'];
    if(empty($_POST['DOB'])){
        $DOBErr = "Required";
    }
    
    $location = $_POST['location'];
    $number = $_POST['number'];
    
    if ($emailErr == '' && $DOBErr == '' && $nameErr == '') {
        $sql = "UPDATE user_table SET username='$name', email='$email', date='$DOB', location='$location', number='$number' WHERE id='$id'";

        $result = mysqli_query($conn, $sql);
        if($result){
            header('location:admin.php');
        } else {
            die(mysqli_error($conn));
        }
    }
}
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<label for="name">Name</label>
<input type="text" name="name" /> 
<span class="error">* <?php echo $nameErr; ?> </span><br>

<label class="form-label">DOB</label>
<input class="form-control" type="date" name="DOB" value="<?php echo $DOB; ?>">
<span class="error">* <?php echo $DOBErr; ?> </span>
<br>

<label for="email">Email</label>
<input type="text" name="email" /><span class="error">* <?php echo $emailErr; ?> </span><br>

<label for="location">Location</label>
<input type="text" name="location" /><br>

<label for="number">Number</label>
<input type="number" name="number" /><br><br>

<input type="submit" name="submit" value="Submit" >
</form>
</body>
</html>
