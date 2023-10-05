<?php
require_once 'con2.php';

// Query to retrieve generation from the database
$generationQuery = "SELECT * FROM `generation`";
$generationResult = mysqli_query($conn, $generationQuery);

// Check if the query was successful
if ($generationResult) {
    $generation = [];
    while ($row = mysqli_fetch_assoc($generationResult)) {
        // Trim the value_name before adding it to the array
        $row['value_name'] = trim($row['value_name']);
        $generation[] = $row;
    }

    // Encode the entire array as JSON and echo it
    echo json_encode(['generations' => $generation]);
} else {
    // Handle the case where the query encountered an error
    echo json_encode(['error' => 'Database query error']);
}

// Close the database connection
mysqli_close($conn);
?>
