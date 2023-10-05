<?php
require_once 'con2.php';

// Query to retrieve type from the database
$typeQuery = "SELECT * FROM `type`";
$typeResult = mysqli_query($conn, $typeQuery);

// Check if the query was successful
if ($typeResult) {
    $type = [];
    while ($row = mysqli_fetch_assoc($typeResult)) {
        // Trim the value_name before adding it to the array
        $row['value_name'] = trim($row['value_name']);
        $type[] = $row;
    }

    // Encode the entire array as JSON and echo it
    echo json_encode(['types' => $type]);
} else {
    // Handle the case where the query encountered an error
    echo json_encode(['error' => 'Database query error']);
}

// Close the database connection
mysqli_close($conn);
?>
