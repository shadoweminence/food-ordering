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
    <script src="price.js"></script>
    <link rel="stylesheet" href="acc.css">
    <title>Food Menu</title>
</head>
<body>
    <br><br>
    <h1>Food Menu</h1>
    <br><br><br>
    <div class="container">
    <div id="menu">
    <h2>Burger Items</h2>
    <ul>
    <li>
                <span>Ham Burger - Rs 140</span>
                <button onclick="addItem('Ham Burger', 140)">Add</button>
            </li>
            <li>
                <span>Chicken Burger - Rs 145</span>
                <button onclick="addItem('Chicken Burger', 145)">Add</button>
            </li>
            <li>
                <span>Cheese Burger - Rs 120</span>
                <button onclick="addItem('Cheese Burger', 120)">Add</button>
            </li>
            <li>
                <span>Veg Burger - Rs 110</span>
                <button onclick="addItem('Veg Burger', 110)">Add</button>
            </li>
    </ul>

    <h2>Pizza Items</h2>
    <ul>
    <li>
                <span>Chicken Pizza - Rs 280</span>
                <button onclick="addItem('Chicken Pizza', 280)">Add</button>
            </li>
            <li>
                <span>Mushroom Pizza - Rs 250</span>
                <button onclick="addItem('Mushroom Pizza', 250)">Add</button>
            </li>
            <li>
                <span>Paneer Pizza - Rs 300</span>
                <button onclick="addItem('Paneer Pizza', 300)">Add</button>
            </li>
            <li>
                <span>Cheese Pizza - Rs 240</span>
                <button onclick="addItem('Cheese Pizza', 240)">Add</button>
            </li>
    </ul>


    <h2>Khana Set</h2>
    <ul>
    <li>
                <span>Veg Khana set - Rs 250</span>
                <button onclick="addItem('Veg Khana set', 250)">Add</button>
            </li>
            <li>
                <span>Broiler Chicken Khana set - Rs 300</span>
                <button onclick="addItem('Broiler Chicken Khana set', 300)">Add</button>
            </li>
            <li>
                <span>Local Chicken Khana set - Rs 350</span>
                <button onclick="addItem('Local Chicken Khana set', 50)">Add</button>
            </li>
            <li>
                <span>Local Chicken Khana set - Rs 350</span>
                <button onclick="addItem('Local Chicken Khana set', 50)">Add</button>
            </li>
    </ul>

    <h2>Khaja Set</h2>
    <ul>
    <li>
                <span>Veg Khaja set - Rs 150</span>
                <button onclick="addItem('Veg Khaja set', 150)">Add</button>
            </li>
            <li>
                <span>Chicken Khaja set - Rs 200</span>
                <button onclick="addItem('Chicken Khaja set', 200)">Add</button>
            </li>
            <li>
                <span>Buff Khaja set - Rs 180</span>
                <button onclick="addItem('Buff Khaja set', 180)">Add</button>
            </li>
            <li>
                <span>Mutton Khaja set - Rs 2800</span>
                <button onclick="addItem('Mutton Khaja set', 280)">Add</button>
            </li>
    </ul>

    <h2>Fast Food</h2>
    <h3>Momo Items</h3>
    <ul>
    <li>
                <span>Buff Momo - Rs 120</span>
                <button onclick="addItem('Buff Momo', 120)">Add</button>
            </li>
            <li>
                <span>Chicken Momo - Rs 150</span>
                <button onclick="addItem('Chicken Momo', 150)">Add</button>
            </li>
       
    </ul>

    </div>




    <form action="orderdb.php" method="POST">
    <div id="orderSummary">
        <h2>Order Summary</h2>
        <ul id="orderedItems">
            <!-- Ordered items will be displayed here -->
        </ul>
        <p>Total Price: Rs <span id="totalPrice">0.00</span></p>
    </div>
    
    <!-- Hidden input fields to store data -->
    <input type="hidden" id="foodData" name="foodData">
    <input type="hidden" id="quantityData" name="quantityData">
    <input type="hidden" id="priceData" name="priceData">
    <input type="hidden" id="totalPrice" name="totalPrice">


    <button type="submit">Place Order</button>
</form>

      <!-- Order Form -->
    
<br> <br>



    <div id="decorative">
        <img src="pics/cheesepizza.png" alt="Decorative Image 1">
        <br><br>
        <img src="pics/hamburger.png" alt="Decorative Image 2">
    </div>
</div>

   



    <?php
    include 'footer.php';
    ?>
</body>
</html>
