<?php
require_once 'con2.php';

// Query to retrieve speed from the database
$speedQuery = "SELECT * FROM `speed`";
$speedResult = mysqli_query($conn, $speedQuery);

// Check if the query was successful
if ($speedResult) {
    $speed = [];
    while ($row = mysqli_fetch_assoc($speedResult)) {
        // Trim the value_name before adding it to the array
        $row['value_name'] = trim($row['value_name']);
        $speed[] = $row;
    }

    // Encode the entire array as JSON and echo it
    echo json_encode(['speeds' => $speed]);
} else {
    // Handle the case where the query encountered an error
    echo json_encode(['error' => 'Database query error']);
}

// Close the database connection
mysqli_close($conn);
?>
