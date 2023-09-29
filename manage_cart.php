<!-- <?php
// Start a new or resume an existing session
session_start();

// Check if the server received a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if the "Add_To_Cart" form was submitted
    if (isset($_POST['Add_To_Cart'])) {
        // Validate and sanitize input data
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $item_image = $_POST['image'];
        $product_id = $_POST['product_id'];
        $itemName = htmlspecialchars($_POST['Item_Name']);
        $price = floatval($_POST['Price']);

        // Check if the "cart" session variable exists
        if (isset($_SESSION['cart'])) {
            // Get an array of item names from the cart
            $itemNames = array_column($_SESSION['cart'], 'Item_Name');

            // Check if the item is already in the cart
            if (in_array($itemName, $itemNames)) {
                // Display a message to the user
                $message = "Item already added";
            } else {
                // Add the item to the cart
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array(
                   
                    'product_id' => $product_id,
                    'description' => $description,
                    'image' => $item_image,
                    'Item_Name' => $itemName,
                    'Price' => $price,
                    'Quantity' => $quantity
                );
                // Display a message to the user
                $message = "Item added";
            }
        } else {
            // Create the cart if it doesn't exist
            $_SESSION['cart'][0] = array(
                'Item_Name' => $itemName,
                'Price' => $price,
                'Quantity' => 1
            );
            // Display a message to the user
            $message = "Item added";
        }

        // Redirect to a different page with a message
        header("Location: HOME2copy.php?message=" . urlencode($message));
        exit();
    }

    // Check if the "Remove_Item" form was submitted
    if (isset($_POST['Remove_Item'])) {
        // Loop through items in the cart
        foreach ($_SESSION['cart'] as $key => $value) {
            // Check if the item name matches the one to be removed
            if ($value['Item_Name'] == $_POST['Item_Name']) {
                // Remove the item from the cart
                unset($_SESSION['cart'][$key]);
                // Reindex the array to eliminate gaps in keys
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                // Display a message to the user
                $message = "Removed";
            }
        }
        // Redirect to a different page with a message
        header("Location: CART2.php?message=" . urlencode($message));
    }

    // Check if the "Mod_Quantity" form was submitted
    if (isset($_POST['Mod_Quantity'])) {
        // Loop through items in the cart
        foreach ($_SESSION['cart'] as $key => $value) {
            // Check if the item name matches the one for which quantity should be modified
            if ($value['Item_Name'] == $_POST['Item_Name']) {
                // Update the quantity for the specific item
                $_SESSION['cart'][$key]['Quantity'] = $_POST['Mod_Quantity'];
                // Redirect to the shopping cart page
                echo "<script>window.location.href='CART2.php'</script>";
            }
        }
    }
    
}


// // Adding items to the cart (simplified example)
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     if (isset($_POST['add_to_cart'])) {
//         // Get the user's CartID (you'll need to implement this logic)
//         $cart_id = getUserCartID($_SESSION['user_id']); // Implement this function to get the CartID

//         $product_id = $_POST['product_id'];
//         $quantity = $_POST['quantity'];
//         $totalproductprice = $quantity * getProductPrice($product_id); // Implement this function to get the product price

//         // Insert the item into the Cart Item table
//         $query = "INSERT INTO `cart_item` (`CartID`, `product_id`, `Quantity`, `totalproductprice`) VALUES (?, ?, ?, ?)";
//         $stmt = mysqli_prepare($conn, $query);
//         mysqli_stmt_bind_param($stmt, "iiid", $cart_id, $product_id, $quantity, $totalproductprice);
//         mysqli_stmt_execute($stmt);
//     }
// }

// // Retrieving cart data when the user logs in
// if (isset($_SESSION['user_id'])) {
//     // Get the user's CartID
//     $cart_id = getUserCartID($_SESSION['user_id']); // Implement this function to get the CartID

//     // Query the Cart Item table to retrieve items in the user's cart
//     $query = "SELECT `product_id`, `Quantity`, `totalproductprice` FROM `cart_item` WHERE `CartID` = ?";
//     $stmt = mysqli_prepare($conn, $query);
//     mysqli_stmt_bind_param($stmt, "i", $cart_id);
//     mysqli_stmt_execute($stmt);
//     mysqli_stmt_bind_result($stmt, $product_id, $quantity, $totalproductprice);

//     // Populate the user's session cart with the retrieved data
//     $_SESSION['cart'] = array();

//     while (mysqli_stmt_fetch($stmt)) {
//         $_SESSION['cart'][] = array(
//             'product_id' => $product_id,
//             'quantity' => $quantity,
//             'totalproductprice' => $totalproductprice
//         );
//     }

//     mysqli_stmt_close($stmt);
// }


?>