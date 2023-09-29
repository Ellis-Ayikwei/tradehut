<?php
require_once 'con2.php';

// Query to retrieve categories from the database

$attributesQuery = "SELECT * FROM `attributes`";
$attributesResult = mysqli_query($conn, $attributesQuery);

// Check if the query was successful
if ($attributesResult) {
    $Attributes = [];
    while ($row = mysqli_fetch_assoc($attributesResult)) {
        $Attributes[] = $row;
    }
    echo json_encode(['attributes' => $Attributes]);
} else {
    echo json_encode(['error' => 'Database query error']);
}






mysqli_close($conn);
?>