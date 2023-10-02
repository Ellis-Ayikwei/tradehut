/**
 * Handles adding, removing, and modifying items in a shopping cart.
 *
 * @param array $_SESSION['cart'] The shopping cart stored in the session variable.
 * @param string $_POST['Add_To_Cart'] A form submission trigger for adding an item to the cart.
 * @param string $_POST['Remove_Item'] A form submission trigger for removing an item from the cart.
 * @param string $_POST['Mod_Quantity'] A form submission trigger for modifying the quantity of an item in the cart.
 *
 * @return void
 */


 <?php
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





?>