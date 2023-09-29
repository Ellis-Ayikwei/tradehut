<?php
require_once 'con2.php';

// Get the selected category ID from the query string
$categoryID = isset($_GET['category_id']) ? $_GET['category_id'] : null;

if ($categoryID === null) {
    echo json_encode(['error' => 'Category ID is missing']);
    exit();
}

// Query to retrieve subcategories for the selected category
$subcategoryQuery = "SELECT Sub_category_id, Sub_category_name FROM sub_category WHERE CategoryID = ?";
$subCategoryStmt = mysqli_prepare($conn, $subcategoryQuery);

if ($subCategoryStmt) {
    mysqli_stmt_bind_param($subCategoryStmt, 'i', $categoryID);

    if (mysqli_stmt_execute($subCategoryStmt)) {
        $subcategories = [];
        $result = mysqli_stmt_get_result($subCategoryStmt);
        while ($row = mysqli_fetch_assoc($result)) {
            $subcategories[] = $row;
        }
        echo json_encode(['subcategories' => $subcategories]);
    } else {
        echo json_encode(['error' => 'Database query error']);
    }

    mysqli_stmt_close($subCategoryStmt);
} else {
    echo json_encode(['error' => 'Database query error']);
}

mysqli_close($conn);
?>
