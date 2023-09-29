<?php 
require_once "connectconfig.php"
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Hope UI | Responsive Bootstrap 5 Admin Dashboard Template</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico" />

        <!-- Library / Plugin Css Build -->
        <link rel="stylesheet" href="../assets/css/core/libs.min.css" />

        <!-- Hope Ui Design System Css -->
        <link rel="stylesheet" href="../assets/css/hope-ui.min.css?v=2.0.0" />

        <!-- Custom Css -->
        <link rel="stylesheet" href="../assets/css/custom.min.css?v=2.0.0" />

        <!-- Dark Css -->
        <link rel="stylesheet" href="../assets/css/dark.min.css" />

        <!-- Customizer Css -->
        <link rel="stylesheet" href="../assets/css/customizer.min.css" />

        <!-- RTL Css -->
        <link rel="stylesheet" href="../assets/css/rtl.min.css" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </head>

    <body>


        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->

                <!-- Content -->
                <main class="">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                    </div>

                    <table class="table text-center bg-success" style="width:100vw">
                        <thead>
                            <tr>
                                <th scope="col">Order_id</th>
                                <th scope="col">Customer_id</th>
                                <th scope="col">Phone_No</th>
                                <th scope="col">Address</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Paymode</th>
                                <th scope="col">Orders Details</th>
                                <th scope="col">Is Delivered</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                    $query3 = "SELECT * FROM `orders`";
                    $user_results = mysqli_query($conn, $query3);
                    while ($user_fetch = mysqli_fetch_assoc($user_results)) {
                        echo "
                        <tr>
                            <td>$user_fetch[Order_id]</td>
                            <td>$user_fetch[CustomerID]</td>
                            <td>$user_fetch[phone]</td>
                            <td>$user_fetch[AddressID]</td>
                            <td>$user_fetch[TotalAmount]</td>
                            <td>$user_fetch[Pay_Mode]</td>
                            <td>
                                <button class='btn btn-primary' data-toggle='modal' data-target='#orderModal$user_fetch[Order_id]'>View Orders</button>
                            </td>
                            <td>$user_fetch[Is_delivered]</td>
                        </tr>
                        ";
                    }
                    ?>
                        </tbody>
                    </table>
                </main>
            </div>
        </div>

        <!-- Modal for each order -->
        <?php
$query3 = "SELECT * FROM `order_details`";
$user_results = mysqli_query($conn, $query3);
while ($user_fetch = mysqli_fetch_assoc($user_results)) {
    echo "
    <div class='modal fade' id='orderModal$user_fetch[order_id]' tabindex='-1' role='dialog' aria-labelledby='orderModalLabel' aria-hidden='true'>
        <div class='modal-dialog' role='document'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <h5 class='modal-title' id='orderModalLabel'>Order Details for Order ID: $user_fetch[order_id]</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
                <div class='modal-body'>
                    <table class='table text-center'>
                        <thead>
                            <tr>
                                <th scope='col'>Item_Name</th>
                                <th scope='col'>Price</th>
                                <th scope='col'>Quantity</th>
                                <th scope='col'>sub_total</th>
                            </tr>
                        </thead>
                        <tbody>";
    
    $Order_query = "SELECT * FROM `order_details` WHERE `order_id` = '$user_fetch[order_id]'";
    $Order_results = mysqli_query($conn, $Order_query);
    while ($Order_result = mysqli_fetch_assoc($Order_results)) {
        echo "<tr>
                <td scope='col'>$Order_result[product_name]</td>
                <td scope='col'>$Order_result[unite_price]</td>
                <td scope='col'>$Order_result[quantity]</td>
                <td scope='col'>$Order_result[sub_total]</td>
              </tr>";
    }
    
    echo "</tbody>
        </table>
    </div>
    <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
    </div>
</div>
</div>
</div>";
}
?>

    </body>

</html>