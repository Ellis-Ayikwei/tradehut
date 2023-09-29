<?php 
require_once "con2.php";
if ($_SERVER["REQUEST_METHOD"] === "POST") {


 $stmt->close();

 if ($stmt->execute()) {
     // Get the ID of the newly inserted product
     $product_id = $mysqli->insert_id;
 // Get the JSON data from the request body
     $data = json_decode(file_get_contents('php://input'));

     // Insert the data into the database (assuming you have a database connection)
     $attribute_id = $data->attribute_id;
     $value_id = $data->value_id;
     // Continue with inserting data into the second_table

     
     $sql2 = "INSERT INTO productvariant 
         (product_id, other_column) 
         VALUES (?, ?)";
 
     $stmt2 = $mysqli->prepare($sql2);
 
     // Bind parameters for second_table
     $other_column_value = "some_value"; // Replace with the actual value for the other column
     $stmt2->bind_param("is", $product_id, $other_column_value); // Assuming product_id is an integer
 
     // Execute the statement for second_table
     if ($stmt2->execute()) {
         echo "Data inserted into the second table successfully!";
     } else {
         echo "Error: " . $mysqli->error;
     }
 
     // Close the statement for the second_table
     $stmt2->close();
 } else {
     echo "Error: " . $mysqli->error;
 }
 
 // Close the statement and connection for the products table
 $stmt->close();

}
?>