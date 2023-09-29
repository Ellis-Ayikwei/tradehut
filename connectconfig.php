<?php 



$servername = "localhost:4022";
$username = "root";
$password = "Ellis@Monique123";
$dbname = "tradehut";


$conn = mysqli_connect($servername, $username, $password, $dbname);



// if(isset($_GET["id"])){
//     $product_id = $_GET["id"];
// $sql = "SELECT * FROM cartitems WHERE product_id = $product_id";
// $result = $conn->query($sql);
// $total_cart = "SELECT * FROM cartitems";
// $total_cart_result = $conn-> query($total_cart);
// $cart_num = mysqli_num_rows($total_cart_result);

// if(mysqli_num_rows($result) > 0){
//     $in_cart = "already in the cart";
//     echo json_encode(["num_cart" => $cart_num, "in_cart" => $in_cart]);
// }else{
//     $insert = "INSERT INTO cartitems(product_id) VALUES($product_id)";
//     if($conn->query($insert) === true){
//         $in_cart = "added into cart";
//         echo json_encode(["num_cart" => $cart_num, "in_cart" => $in_cart]);

//     }else{
//         echo "<scriptjson_encode>alert ('it didn\'t insert')</script>";
//     }
// }

// }

// if(isset($_GET["cart_id"])){
//     $product_id = $_GET["cart_id"];
// $sql = "DELETE FROM cartitems WHERE product_id = $product_id";


// if($conn->query($sql) === true){
//     echo "Removed from cart";
// }
// }


// if(isset($_GET["cart_id"])){
//     $product_id = $_GET["cart_id"];
// $sql = "DELETE FROM cartitems WHERE product_id = $product_id";


// if($conn->query($sql) === true){
//     echo "Removed from cart";
// }
// }

?>