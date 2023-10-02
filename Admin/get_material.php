<?php
require_once 'con2.php';

// Query to retrieve material from the database
$materialQuery = "SELECT * FROM `material`";
$materialResult = mysqli_query($conn, $materialQuery);

// Check if the query was successful
if ($materialResult) {
    $material = [];
    while ($row = mysqli_fetch_assoc($materialResult)) {
        // Trim the value_name before adding it to the array
        $row['value_name'] = trim($row['value_name']);
        $material[] = $row;
    }

    // Encode the entire array as JSON and echo it
    echo json_encode(['materials' => $material]);
} else {
    // Handle the case where the query encountered an error
    echo json_encode(['error' => 'Database query error']);
}

// Close the database connection
mysqli_close($conn);
?>
