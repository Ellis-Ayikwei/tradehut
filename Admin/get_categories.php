<?php
require_once 'con2.php';

// Query to retrieve categories from the database
$categoryQuery = "SELECT CategoryID, CategoryName FROM Categories";
$categoryResult = mysqli_query($conn, $categoryQuery);

// Check if the query was successful
if ($categoryResult) {
    $categories = [];
    while ($row = mysqli_fetch_assoc($categoryResult)) {
        $categories[] = $row;
    }
    echo json_encode(['categories' => $categories]);
} else {
    echo json_encode(['error' => 'Database query error']);
}

mysqli_close($conn);
?>
