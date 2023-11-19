
let orderList = [];
function addItem(itemName, itemPrice) {
    // Create an object representing the added item
    const newItem = {
        name: itemName,
        price: itemPrice,
        quantity: 1,
        totalPrice: itemPrice.toFixed(2)
    };

    // Add the item to the order list
    orderList.push(newItem);

    // Update the hidden input fields with the current order data
    updateHiddenInputs();

    // Update the order summary with the current order list
    updateOrderSummary();
}

function updateHiddenInputs() {
    // Get references to the hidden input fields
    const foodDataInput = document.getElementById("foodData");
    const quantityDataInput = document.getElementById("quantityData");
    const priceDataInput = document.getElementById("priceData");

    // Create arrays to store the data
    const foodArray = [];
    const quantityArray = [];
    const priceArray = [];

    // Populate the arrays with the data from the orderList
    for (const item of orderList) {
        foodArray.push(item.name);
        quantityArray.push(item.quantity);
        priceArray.push(item.price);
    }

    // Update the hidden input fields with JSON data
    foodDataInput.value = JSON.stringify(foodArray);
    quantityDataInput.value = JSON.stringify(quantityArray);
    priceDataInput.value = JSON.stringify(priceArray);
}

function updateOrderSummary() {
    const orderedItems = document.getElementById("orderedItems");
    orderedItems.innerHTML = ""; // Clear existing content

    let totalOrderPrice = 0;

    orderList.forEach((item, index) => {
        const listItem = document.createElement("li");
        listItem.innerHTML = `
            <span>${item.name} - Rs. ${item.price} x${item.quantity} = Rs. ${item.totalPrice}</span>
            <button onclick="removeItem(${index})">Remove</button>
        `;
        orderedItems.appendChild(listItem);

        totalOrderPrice += parseFloat(item.totalPrice);
    });

    // Display the total order price
    const totalPriceElement = document.getElementById("totalPrice");
    totalPriceElement.textContent = totalOrderPrice.toFixed(2);
}


// function to remove the item from order list 
function removeItem(index) {
    // Remove the item from the order list
    orderList.splice(index, 1);

    // Update the order summary
    updateOrderSummary();
}

