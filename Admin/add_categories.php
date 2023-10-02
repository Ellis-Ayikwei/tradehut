<?php
require_once 'con2.php';

// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the submitted form
    $categoryName = $_POST["data"]; // Access the "data" field sent from JavaScript

    // Define the INSERT statement
    $insertQuery = "INSERT INTO categories (CategoryName) VALUES (?)";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $insertQuery);

    if ($stmt) {
        // Bind the parameter
        mysqli_stmt_bind_param($stmt, "s", $categoryName);

        // Execute the statement
        $success = mysqli_stmt_execute($stmt);

        // Define the response array
        $response = [];

        if ($success) {
            $response['success'] = 'Category added successfully';
        } else {
            $response['error'] = 'Category addition failed: ' . mysqli_error($conn);
        }

        // Set the content type to JSON
        header('Content-Type: application/json');

        // Send the JSON response
        echo json_encode($response);

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['error' => 'Database query error: ' . mysqli_error($conn)]);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}

mysqli_close($conn);
?>
