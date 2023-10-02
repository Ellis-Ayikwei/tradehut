<?php
// Database connection information
include "connectconfig.php";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch attribute names from the "attributes" table
$sql = "SELECT id, name FROM major_attributes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through each attribute
    while ($row = $result->fetch_assoc()) {
        $attribute_id = $row["id"];
        $attribute_name = $row["name"];
        
        // Generate the table name based on the attribute name
        $table_name = str_replace(' ', '_', $attribute_name);
        
        // Create the table if it doesn't exist
        $create_table_sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
            ${table_name}_id INT AUTO_INCREMENT PRIMARY KEY,
            value_id INT,
            attribute_id INT,
            value_name VARCHAR(255),
            FOREIGN KEY (value_id) REFERENCES attribute_values(value_id)
        )";
        
        if ($conn->query($create_table_sql) === TRUE) {
            // Populate the table with values from the "attribute_values" table
            $populate_table_sql = "INSERT INTO `$table_name` (value_id, attribute_id, value_name)
                SELECT value_id, $attribute_id, value_name FROM attribute_values WHERE Major_attribute_id = $attribute_id";
                
            if ($conn->query($populate_table_sql) !== TRUE) {
                echo "Error populating table: " . $conn->error;
            }
            
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }
   
        echo"<script>alert('table created succesully')
        widows.location.href='close'</script>";

} else {
    echo "No attributes found.";
}

// Close the database connection
$conn->close();
?>
