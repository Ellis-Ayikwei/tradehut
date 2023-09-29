<?php
require_once "con2.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand_name = $_POST['brand_name'];
    $category_id = 13;

    // Validation and Sanitization (You can add more validation rules as needed)
    $brand_name = mysqli_real_escape_string($conn, $brand_name);
    $category_id = mysqli_real_escape_string($conn, $category_id);

    // Check if both inputs are not empty before checking and inserting
    if (!empty($brand_name) && !empty($category_id)) {
        // Check if the brand name already exists in the database
        $check_sql = "SELECT COUNT(*) FROM `brands` WHERE `BrandName` = ?";
        $check_stmt = mysqli_prepare($conn, $check_sql);

        if ($check_stmt) {
            mysqli_stmt_bind_param($check_stmt, "s", $brand_name);
            mysqli_stmt_execute($check_stmt);
            mysqli_stmt_bind_result($check_stmt, $count);
            mysqli_stmt_fetch($check_stmt);
            mysqli_stmt_close($check_stmt);

            if ($count > 0) {
                echo "Brand name already exists!";
            } else {
                // Insert the brand if it doesn't exist
                $insert_sql = "INSERT INTO `brands` (`CategoryID`, `BrandName`) VALUES (?, ?)";
                $insert_stmt = mysqli_prepare($conn, $insert_sql);

                if ($insert_stmt) {
                    mysqli_stmt_bind_param($insert_stmt, "is", $category_id, $brand_name);
                    if (mysqli_stmt_execute($insert_stmt)) {
                        echo "Brand added successfully!";
                    } else {
                        echo "Error: " . mysqli_error($conn);
                    }
                    mysqli_stmt_close($insert_stmt);
                } else {
                    echo "Error in preparing SQL statement.";
                }
            }
        } else {
            echo "Error in preparing SQL statement.";
        }
    } else {
        echo "Both brand name and category ID are required.";
    }
}
?>


<?php
// require_once "con2.php";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $brand_name = $_POST['brand_name'];
//     $category_id = 15;

//     // Validation and Sanitization (You can add more validation rules as needed)
//     $brand_name = mysqli_real_escape_string($conn, $brand_name);
//     $category_id = mysqli_real_escape_string($conn, $category_id);

    
//     if (!empty($brand_name) && !empty($category_id)) {
//         // Check if the brand name already exists in the database
//         $check_sql = "SELECT COUNT(*) FROM `sub_category` WHERE `Sub_category_name` = ?";
//         $check_stmt = mysqli_prepare($conn, $check_sql);

//         if ($check_stmt) {
//             mysqli_stmt_bind_param($check_stmt, "s", $brand_name);
//             mysqli_stmt_execute($check_stmt);
//             mysqli_stmt_bind_result($check_stmt, $count);
//             mysqli_stmt_fetch($check_stmt);
//             mysqli_stmt_close($check_stmt);

//             if ($count > 0) {
//                 echo "Brand name already exists!";
//             } else {
//                 // Insert the brand if it doesn't exist

//                 $insert_sql = "INSERT INTO `sub_category` (`Sub_category_name`, `CategoryID`) VALUES (?, ?)";
//                 $insert_stmt = mysqli_prepare($conn, $insert_sql);

//                 if ($insert_stmt) {
//                     mysqli_stmt_bind_param($insert_stmt, "si", $brand_name,$category_id);
//                     if (mysqli_stmt_execute($insert_stmt)) {
//                         echo "Brand added successfully!";
//                     } else {
//                         echo "Error: " . mysqli_error($conn);
//                     }
//                     mysqli_stmt_close($insert_stmt);
//                 } else {
//                     echo "Error in preparing SQL statement.";
//                 }
//             }
//         } else {
//             echo "Error in preparing SQL statement.";
//         }
//     } else {
//         echo "Both brand name and category ID are required.";
//     }
// }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    </head>

    <body>
        <h1>Brand Uploader</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="brand_name">Brand Name:</label>
            <input type="text" name="brand_name" required><br><br>

            <!-- <label for="cat_id">Category ID:</label>
            <input type="text" name="cat_id" required><br><br> -->

            <input type="submit" name="submit" value="Submit"><br><br>
        </form>
    </body>

</html>