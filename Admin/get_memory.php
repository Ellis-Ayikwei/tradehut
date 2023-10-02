<?php
require_once 'con2.php';

// Query to retrieve memory from the database
$memoryQuery = "SELECT * FROM `memory`";
$memoryResult = mysqli_query($conn, $memoryQuery);

// Check if the query was successful
if ($memoryResult) {
    $memory = [];
    while ($row = mysqli_fetch_assoc($memoryResult)) {
        // Trim the value_name before adding it to the array
        $row['value_name'] = trim($row['value_name']);
        $memory[] = $row;
    }

    // Encode the entire array as JSON and echo it
    echo json_encode(['memorys' => $memory]);
} else {
    // Handle the case where the query encountered an error
    echo json_encode(['error' => 'Database query error']);
}

// Close the database connection
mysqli_close($conn);
?>
