<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  // User is not logged in, redirect them to the login page
  header('Location: start.php');
  exit;
}
?>
<?php  include 'header1.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="abd.css">
    <title>Cart</title>
</head>
<body>
<div class="data">
<h1>My History</h1>
<br> <br><br><br><br>
<?php
include 'con.php';

$sql = "SELECT * FROM food WHERE user_id = {$_SESSION['user_id']}";
$result = mysqli_query($conn, $sql);

if (!empty($result) && mysqli_num_rows($result) > 0) {
    echo '
    <table class="table table-striped table-bordered" border="2">
        <thead>
            <tr>
            <th> S.No</th>
                <th>items</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $Item = $row["food"];
        $Quantity = $row["quantity"]; // Assuming 'id' is the primary key column name
        $Price = $row["price"];

        echo '<tr>
        <th scope="row">'.$id.'</th>
        <td>'.$Item.'</td>
        <td>'.$Quantity.'</td>
        <td>'.$Price.'</td>
        <td>
        <a href="delete.php?id='.$id.'">
        <button class="btn btn-danger">Cancel</button>
        </a>
        </td>
        </tr>';
    }

    echo '
        </tbody>
    </table>';
} else {
    echo "No data found.";
}
?>
</div>
</body>
</html>


