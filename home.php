<?php
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    include 'header1.php';
}else{
    include 'header.php';
}
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
<div class="wrapper">
    <h1 style="color:red">Available Restaurants</h1> <br><br><br>
    <h2>Kathmandu Area</h2> <br><br><br>
    <div class="abcd">
        <div class="image-container">
            <ul>
                <li><a href="rest.php"><img src="pics/kantipur.png" alt="plumber"> <h2>Kantipur Restaurant</h2></a></li>
                <li><a href="rest.php"><img src="pics/thirdeye.png" alt="painter"><h2>Third Eye Restaurant</h2></a></li>
                <li><a href="rest.php"><img src="pics/kantipurfastfood.png" alt="electrician"><h2>Kantipur Fast Food</h2></a></li>
            </ul>
        </div>
    </div>

   
    <h2>Lalitpur Area</h2>
    <div class="abcd">
        <div class="image-container">
            <ul>
                <li><a href="rest.php"><img src="pics/theembersrestaurant.png" alt=""><h3>The Embers Restaurant</h3></a></li>
                <li><a href="rest.php"><img src="pics/cafedepatan.png" alt=""><h3>Cafe De Patan</h3></a></li>
                <li><a href="rest.php"><img src="pics/villagecafe.png" alt=""><h3>The Village Cafe</h3></a></li>
            </ul>
        </div>
    </div>



    <h2>Bhaktapur Area</h2>
    <div class="abcd">
        <div class="image-container">
            <ul>
                <li><a href="rest.php"><img src="pics/peacock.png" alt=""><h3>Peacock Restaurant</h3></a></li>
                <li> <a href="rest.php"> <img src="pics/degurkha.png" alt=""><h3>De Gurkhas Restaurant</h3></a></li>
                <li><a href="rest.php"><img src="pics/templeview.png" alt=""><h3>Temple View Palace Restaurant</h3></a></li>
                <li><a href="rest.php"><img src="pics/pagodarestro.png" alt=""><h3>Pagoda Guest House and Rooftop Restaurant</h3></a></li>
                <li><a href="rest.php"><img src="pics/cafedepatan.png" alt=""><h3>Cafe De Patan</h3></a></li>
            </ul>
        </div>
</div>

</div>

<?php include 'footer.php'; ?>
</body>
</html>