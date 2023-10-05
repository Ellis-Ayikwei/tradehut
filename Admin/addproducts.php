<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "con2.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["add_product"])) {
        try {
            // Function to get the file type based on its MIME type
            function getFileType($file)
            {
                if (empty($file) || !file_exists($file)) {
                    return "Unknown"; // Handle the case where the file is empty or doesn't exist
                }

                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $mime = finfo_file($finfo, $file);
                finfo_close($finfo);

                return $mime;
            }

            // Function to determine the upload directory based on the selected subcategory
            function getUploadDirectory($selectedSubcategoryname)
            {
                return "uploads/" . $selectedSubcategoryname . "/";
            }

            function sanitizeInput($input)
            {
                // Trim whitespace and escape HTML characters
                return trim(htmlspecialchars($input, ENT_QUOTES, 'UTF-8'));
            }

            // Get the selected subcategory's ID from the hidden input field
            $selectedSubcategoryname = $_POST["selected_subcategory_name"];
            echo "Selected Subcategory Name: " . $selectedSubcategoryname;

            // Define the directory where you want to store the files based on their type
            $imageUploadDir = getUploadDirectory($selectedSubcategoryname) . "images/";
            $videoUploadDir = getUploadDirectory($selectedSubcategoryname) . "videos/";

            // Function to handle file uploads and return the file path
            function uploadFile($inputName, $uploadDir)
            {
                if (!isset($_FILES[$inputName])) {
                    return ""; // Return an empty string if the file doesn't exist
                }

                $target_dir = $uploadDir;
                $target_file = $target_dir . basename($_FILES[$inputName]["name"]);
                $fileType = getFileType($_FILES[$inputName]["tmp_name"]);

                // Define allowed file types (you can customize this list)
                $allowedImageTypes = ["image/jpeg", "image/png", "image/gif"];
                $allowedVideoTypes = ["video/mp4", "video/mpeg"];

                // Check the file type and move it to the appropriate directory
                if (in_array($fileType, $allowedImageTypes) && move_uploaded_file($_FILES[$inputName]["tmp_name"], $target_file)) {
                    return $target_file; // Return the file path for images
                } elseif (in_array($fileType, $allowedVideoTypes) && move_uploaded_file($_FILES[$inputName]["tmp_name"], $target_file)) {
                    return $target_file; // Return the file path for videos
                } else {
                    return ""; // Return an empty string if the file type is not allowed
                }
            }

            // Get and sanitize form inputs
            $category_id = isset($_POST["category_id"]) ? sanitizeInput($_POST["category_id"]) : "";
            $subcategory_id = isset($_POST["subcategory_id"]) ? sanitizeInput($_POST["subcategory_id"]) : "";
            $product_name = isset($_POST["product_name"]) ? sanitizeInput($_POST["product_name"]) : "";
            $keywords = isset($_POST["keywords"]) ? sanitizeInput($_POST["keywords"]) : "";
            $slug = isset($_POST["slug"]) ? sanitizeInput($_POST["slug"]) : "";
            $description = isset($_POST["description"]) ? sanitizeInput($_POST["description"]) : "";
            $price = isset($_POST["price"]) ? floatval($_POST["price"]) : 0.0;
            $stockquantity = isset($_POST["quantity"]) ? intval($_POST["quantity"]) : 0;
            $brand_id = isset($_POST["brand_id"]) ? intval($_POST["brand_id"]) : 0;
            $min_amount = isset($_POST["min_amount"]) ? intval($_POST["min_amount"]) : 0;

            // Get the uploaded main product image
            $main_product_image = uploadFile("main_product_image", $imageUploadDir);

            // Define an array to store any potential validation errors
            $errors = [];

            // You can add validation here, for example, check if required fields are empty or validate specific input types.

            // If there are no validation errors, insert the data into the database
            if (empty($errors)) {
                // Create a MySQLi connection

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "INSERT INTO products 
            (product_name, description, price, quantity, category_id, 
            sub_category_id, brand_id, keywords, slug, Main_product_image, min_amount) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($sql);

                // Bind parameters
                $stmt->bind_param(
                    "ssdiiiisssi",
                    $product_name,
                    $description,
                    $price,
                    $stockquantity,
                    $category_id,
                    $subcategory_id,
                    $brand_id,
                    $keywords,
                    $slug,
                    $main_product_image,
                    $min_amount
                );

                // Handle uploaded images and videos separately

                // Execute the statement
                if ($stmt->execute()) {
                    echo "Product and files uploaded successfully!";
                    $lastInsertedProductId = $stmt->insert_id;
                    $_SESSION['product_data'] = $_POST;
                    $_SESSION['product_added'] = true;
                    $_SESSION["product_id"] = $lastInsertedProductId;
                    $_SESSION["selected_subcategory_name"] =  $selectedSubcategoryname;


                    header("Location: variatis.php");
                } else {
                    echo "Error: " . $conn->error;
                }

                // Close the statement and connection
                $stmt->close();
                $conn->close();
            }
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        }
    } elseif (isset($_POST["save_draft"])) {
        echo "Draft saved successfully!";
    }



    if (isset($_POST["savechanges"])) {


        function sanitizeInput($input)
        {
            // Trim whitespace and escape HTML characters
            return trim(htmlspecialchars($input, ENT_QUOTES, 'UTF-8'));
        }



        var_dump('got to this point');
        $product_id = isset($_SESSION["product_id"]) ? intval($_SESSION["product_id"]) : 0;

        // Retrieve existing product data from the database
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();
        $stmt->close();

        // Check if the product exists
        if (!$product) {
            echo "Product not found.";
            exit;
        }

        // Get and sanitize form inputs
        $product_name = isset($_POST["product_name"]) ? sanitizeInput($_POST["product_name"]) : $product["product_name"];
        $description = isset($_POST["description"]) ? sanitizeInput($_POST["description"]) : $product["description"];
        $price = isset($_POST["price"]) ? floatval($_POST["price"]) : $product["price"];
        $quantity = isset($_POST["quantity"]) ? intval($_POST["quantity"]) : $product["quantity"];

        // Handle product image update
        $new_image = "";

        if (isset($_FILES["Main_product_image"]) && $_FILES["Main_product_image"]["error"] == 0) {
            // File upload was successful
            $new_image = uploadFile("main_product_image", $imageUploadDir);
        } else {
            // File upload was not attempted or failed; keep the existing image
            $new_image = $product["Main_product_image"];
        }

        // Update the product record in the database, including the image
        $update_sql = "UPDATE products SET product_name=?, description=?, price=?, quantity=?, Main_product_image=? WHERE product_id=?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssdiss", $product_name, $description, $price, $quantity, $new_image, $product_id);

        if ($update_stmt->execute()) {
            // Product updated successfully; you can redirect or send a response here
            echo "Product updated successfully!";
            // Redirect to a confirmation page if needed
            // header("Location: confirmation.php");
        } else {
            echo "Error updating product: " . $conn->error;
        }

        $update_stmt->close();
    }
}
