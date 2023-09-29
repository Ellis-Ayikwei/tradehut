<?php
require_once 'con2.php';

// Get the selected attribute ID from the query string
$attributeID = isset($_GET['attribute_id']) ? $_GET['attribute_id'] : null;

if ($attributeID === null) {
    echo json_encode(['error' => 'Attribute ID is missing']);
    exit();
}

// Query to retrieve attribute values for the selected attribute
$attributeValuesQuery = "SELECT * FROM `attribute_values` WHERE attribute_id = ?";
$attributeValuesStmt = mysqli_prepare($conn, $attributeValuesQuery);

if ($attributeValuesStmt) {
    mysqli_stmt_bind_param($attributeValuesStmt, 'i', $attributeID);

    if (mysqli_stmt_execute($attributeValuesStmt)) {
        $attributeValues = [];
        $result = mysqli_stmt_get_result($attributeValuesStmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $attributeValues[] = $row;
        }
        echo json_encode(['attribute_values' => $attributeValues]);
    } else {
        echo json_encode(['error' => 'Database query error']);
    }

    mysqli_stmt_close($attributeValuesStmt);
} else {
    echo json_encode(['error' => 'Database query error']);
}

mysqli_close($conn);
?>