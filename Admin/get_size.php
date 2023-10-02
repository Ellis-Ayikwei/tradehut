<?php
require_once 'con2.php';

// Query to retrieve size from the database
$sizeQuery = "SELECT * FROM `size`";
$sizeResult = mysqli_query($conn, $sizeQuery);

// Check if the query was successful
if ($sizeResult) {
    $size = [];
    while ($row = mysqli_fetch_assoc($sizeResult)) {
        // Trim the value_name before adding it to the array
        $row['value_name'] = trim($row['value_name']);
        $size[] = $row;
    }

    // Encode the entire array as JSON and echo it
    echo json_encode(['sizes' => $size]);
} else {
    // Handle the case where the query encountered an error
    echo json_encode(['error' => 'Database query error']);
}

// Close the database connection
mysqli_close($conn);
?>
