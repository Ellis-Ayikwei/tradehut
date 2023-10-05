<?php
require_once 'con2.php';

// Query to retrieve weight from the database
$weightQuery = "SELECT * FROM `weight`";
$weightResult = mysqli_query($conn, $weightQuery);

// Check if the query was successful
if ($weightResult) {
    $weight = [];
    while ($row = mysqli_fetch_assoc($weightResult)) {
        // Trim the value_name before adding it to the array
        $row['value_name'] = trim($row['value_name']);
        $weight[] = $row;
    }

    // Encode the entire array as JSON and echo it
    echo json_encode(['weights' => $weight]);
} else {
    // Handle the case where the query encountered an error
    echo json_encode(['error' => 'Database query error']);
}

// Close the database connection
mysqli_close($conn);
?>
