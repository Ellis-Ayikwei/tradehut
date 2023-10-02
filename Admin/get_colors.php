<?php
require_once 'con2.php';

// Query to retrieve colors from the database
$colorsQuery = "SELECT color_id, value_name FROM `color`";
$colorsResult = mysqli_query($conn, $colorsQuery);

// Check if the query was successful
if ($colorsResult) {
    $colors = [];
    while ($row = mysqli_fetch_assoc($colorsResult)) {
        // Trim the value_name before adding it to the array
        $row['value_name'] = trim($row['value_name']);
        $colors[] = $row;
    }

    // Encode the entire array as JSON and echo it
    echo json_encode(['colors' => $colors]);
} else {
    // Handle the case where the query encountered an error
    echo json_encode(['error' => 'Database query error']);
}

// Close the database connection
mysqli_close($conn);
?>
