<?php
session_start();

$servername = "localhost:4022";
$username = "root";
$password = "Ellis@Monique123";
$dbname = "tradehut";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_error()) {
    echo "<script>alert('Cannot connect to the database')
          window.location.href='CART2.php'
          </script>";
    exit();
}

$fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
$phone_no = isset($_POST['phone_no']) ? $_POST['phone_no'] : '';
$address = isset($_POST['address']) ? $_POST['address'] : '';
$pay_mode = isset($_POST['pay_mode']) ? $_POST['pay_mode'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['purchase'])) {
        // Calculate the total amount (gtotal)
        $gtotal = 0;
        foreach ($_SESSION['cart'] as $key => $value) {
            $gtotal += $value['Price'] * $value['Quantity'];
        }

        // Insert the order into the 'orders' table
        $query1 = "INSERT INTO `orders` (`OrderDate`, `TotalAmount`, `Pay_Mode`, `phone`) VALUES (NOW(), ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $query1);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sss", $gtotal, $pay_mode, $phone_no);
            if (mysqli_stmt_execute($stmt)) {
                $orderID = mysqli_insert_id($conn);

                // Insert individual items into the 'order_details' table
                $query2 = "INSERT INTO `order_details` (`order_id`, `product_id`, `product_name`, `unite_price`, `quantity`, `sub_total`) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_prepare($conn, $query2);

                if ($stmt) {
                    foreach ($_SESSION['cart'] as $key => $values) {
                        $sub_total = $values['Price'] * $values['Quantity'];
                        $product_id = $values['product_id'];
                        $itemName = $values['Item_Name'];
                        $Price = $values['Price'];
                        $Quantity = $values['Quantity'];
                        
                        mysqli_stmt_bind_param($stmt, "iisdis", $orderID, $product_id, $itemName, $Price, $Quantity, $sub_total);
                        mysqli_stmt_execute($stmt);
                    }

                    unset($_SESSION['cart']);

                    echo "<script>alert('Order placed')
                          window.location.href='CART2.php'
                          </script>";
                } else {
                    echo "<script>alert('SQL Query Prepare error')
                          window.location.href='CART2.php'
                          </script>";
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('SQL Query Prepare error')
                  window.location.href='CART2.php'
                  </script>";
        }
    }
}
?>