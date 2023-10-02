<?php
require_once "connectconfig.php"; // Replace with your database connection code

// Handle user input (order tracking number or order ID)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $trackingNumber = $_POST["tracking_number"]; // Change to match your form field name
    $userID = $_SESSION["user_id"]; // Assuming user is logged in and their ID is stored in the session

    // Query the database to fetch order details
    $query = "SELECT * FROM orders WHERE tracking_number = ? AND user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $trackingNumber, $userID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $order = $result->fetch_assoc();
        // Display order details (order status, shipping info, etc.)
        // You can customize the HTML structure to match your design
        echo "<h2>Order Tracking Results</h2>";
        echo "<p>Order Status: " . $order["order_status"] . "</p>";
        echo "<p>Shipping Address: " . $order["shipping_address"] . "</p>";
        // Add more order details as needed
    } else {
        echo "Order not found.";
    }
}
?>
<!-- HTML Form for Order Tracking -->
<form method="POST" action="">
    <label for="tracking_number">Enter Tracking Number or Order ID:</label>
    <input type="text" name="tracking_number" required>
    <button type="submit">Track Order</button>
</form>




<?php
// user order history

// // Get the logged-in user's ID (Assuming user is logged in and their ID is stored in the session)
// $userID = $_SESSION["user_id"];

// // Query the database to fetch the user's order history
// $query = "SELECT * FROM orders WHERE user_id = ? ORDER BY order_date DESC";
// $stmt = $conn->prepare($query);
// $stmt->bind_param("i", $userID);
// $stmt->execute();
// $result = $stmt->get_result();

// if ($result->num_rows > 0) {
//     echo "<h2>Order History</h2>";
//     echo "<table>";
//     echo "<tr><th>Order ID</th><th>Order Date</th><th>Order Status</th></tr>";
//     while ($row = $result->fetch_assoc()) {
//         echo "<tr>";
//         echo "<td><a href='order_details.php?order_id=" . $row["order_id"] . "'>" . $row["order_id"] . "</a></td>";
//         echo "<td>" . $row["order_date"] . "</td>";
//         echo "<td>" . $row["order_status"] . "</td>";
//         echo "</tr>";
//     }
//     echo "</table>";
// } else {
//     echo "No orders found.";
// }
?>
