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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM user_table WHERE id = '$id'";
    
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('location: admin.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>



</body>
</html>