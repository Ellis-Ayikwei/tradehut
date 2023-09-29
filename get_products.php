<?php 


// include_once "connectconfig.php";

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// // SQL query to fetch items from the database
// $sql = "SELECT * FROM products";
// $result = $conn->query($sql);
// $row = $result->fetch_assoc();

// if ($result->num_rows > 0) {
//     // Loop through the result set and store each row in the $data array
//     while ($row = $result->fetch_assoc()) {
//         $data[] = $row;
//     }
// } else {
//     // Handle the case where no items are found
//     echo "No items found in the database.";
// }










include_once "connectconfig.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch items from the database with category name
// $sql = "SELECT
//             p.*,
//             c.Sub_category_name AS category_name
//         FROM
//             products p
//         LEFT JOIN
//             Category c ON p.category_id = c.Sub_category_id"; // Replace "your_table_name" with your actual table name



$sql = "SELECT 
            products.*, 
            sub_category.Sub_category_name AS Sub_category_name
        FROM 
            products
        LEFT JOIN 
            sub_category ON products.Sub_category_id = sub_category.Sub_category_id";

$result = $conn->query($sql);
?>


