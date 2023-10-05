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

        // Query to retrieve brands for the selected category
        $brandQuery = "SELECT brand_id, brand_name FROM brands WHERE CategoryID = ?";
        $brandStmt = mysqli_prepare($conn, $brandQuery);

        if ($brandStmt) {
            mysqli_stmt_bind_param($brandStmt, 'i', $categoryID);

            if (mysqli_stmt_execute($brandStmt)) {
                $brands = [];
                $brandResult = mysqli_stmt_get_result($brandStmt);
                while ($brandRow = mysqli_fetch_assoc($brandResult)) {
                    $brands[] = $brandRow;
                }
                echo json_encode(['subcategories' => $subcategories, 'brands' => $brands]);
            } else {
                echo json_encode(['error' => 'Database query error']);
            }

            mysqli_stmt_close($brandStmt);
        } else {
            echo json_encode(['error' => 'Database query error']);
        }
    } else {
        echo json_encode(['error' => 'Database query error']);
    }

    mysqli_stmt_close($subCategoryStmt);
} else {
    echo json_encode(['error' => 'Database query error']);
}

mysqli_close($conn);
?>