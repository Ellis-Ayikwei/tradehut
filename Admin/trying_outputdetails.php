<!-- """
Retrieves a concatenated string of items from a database, splits it into individual items, and displays them as a list on a webpage.

Inputs:
- Database connection: Requires a valid database connection to retrieve the concatenated items.
- Table name: The name of the table in the database where the concatenated items are stored.

Outputs:
- HTML page: Generates an HTML page with a heading "Items List" and an unordered list containing the individual items retrieved from the database.
""" -->

<?php 

require_once 'con2.php'; // Include your database connection code here

// Retrieve the concatenated items from the database
$query = "SELECT value FROM varrr"; // Replace 'varrr' with your table name
$result = mysqli_query($conn, $query);

if (!$result) {
    echo 'Error fetching items from the database: ' . mysqli_error($conn);
    // You may choose to handle the error here
}

$concatenatedItems = mysqli_fetch_assoc($result)['value'];
// Split the concatenated string into individual items
$itemsArray = explode(', ', $concatenatedItems);

// Close the database connection
mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Items</title>
</head>
<body>
    <h1>Items List</h1>
    <ul>
        <?php
        // Loop through the items and display them as a list
        foreach ($itemsArray as $item) {
            echo '<li>' . htmlspecialchars($item) . '</li>';
        }
        ?>
    </ul>
</body>
</html>
