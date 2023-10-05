<?php

session_start();

include_once "con2.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_variant"])   && isset($_SESSION['product_id'])) {

    var_dump("reached this point");

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

    function uploadFile($inputName, $uploadDir, $key)
    {
        if (!isset($_FILES[$inputName]["tmp_name"][$key])) {
            return ""; // Return an empty string if the file doesn't exist
        }

        // Check if there was an error in the file upload
        if ($_FILES[$inputName]["error"][$key] !== UPLOAD_ERR_OK) {
            return ""; // Return an empty string if there was an error
        }

        $target_dir = $uploadDir;
        $target_file = $target_dir . basename($_FILES[$inputName]["name"][$key]);
        $fileType = getFileType($_FILES[$inputName]["tmp_name"][$key]);

        // Define allowed file types (you can customize this list)
        $allowedImageTypes = ["image/jpeg", "image/png", "image/gif"];
        $allowedVideoTypes = ["video/mp4", "video/mpeg"];

        // Check the file type and move it to the appropriate directory
        if (in_array($fileType, $allowedImageTypes) && move_uploaded_file($_FILES[$inputName]["tmp_name"][$key], $target_file)) {
            return $target_file; // Return the file path for images
        } elseif (in_array($fileType, $allowedVideoTypes) && move_uploaded_file($_FILES[$inputName]["tmp_name"][$key], $target_file)) {
            return $target_file; // Return the file path for videos
        } else {
            return ""; // Return an empty string if the file type is not allowed
        }
    }
    // Get the selected subcategory's ID from the hidden input field
    $selectedSubcategoryname = $_SESSION["selected_subcategory_name"];
    echo "Selected Subcategory Name: " . $selectedSubcategoryname;

    // Define the directory where you want to store the files based on their type
    $imageUploadDir = getUploadDirectory($selectedSubcategoryname) . "images/";
    $videoUploadDir = getUploadDirectory($selectedSubcategoryname) . "videos/";

    // Define your SQL query for insertion
    $sql = "INSERT INTO variants (product_id, variant_name, sku, quantity, min_buy_amount, color, size, speed, memory, generation, material, type, weight, price, image_1, image_2, image_3, image_4, video_1, video_2) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Initialize the $variants array
    $variants = [];

    // Check if form data is submitted and not empty
    if (isset($_POST["variant_name"]) && !empty($_POST["variant_name"])) {
        // Loop through the submitted variant_name field to create an array of variants
        foreach ($_POST["variant_name"] as $key => $variantName) {
            // Initialize an empty variant array
            $variant = [];

            // Add data to the variant array
            $variantName = sanitizeInput($variantName);
            $sku = sanitizeInput($_POST["sku"][$key]);
            $quantity = intval($_POST["quantity"][$key]);
            $minBuyAmount = intval($_POST["min_b"][$key]);
            $color = sanitizeInput($_POST["colorsSelect"][$key]);
            $size = sanitizeInput($_POST["sizeSelect"][$key]);
            $speed = sanitizeInput($_POST["speedSelect"][$key]);
            $memory = sanitizeInput($_POST["memorySelect"][$key]);
            $generation = sanitizeInput($_POST["GenerationSelect"][$key]);
            $material = sanitizeInput($_POST["materialSelect"][$key]);
            $type = sanitizeInput($_POST["typeSelect"][$key]);
            $price = floatval($_POST["price"][$key]);
            $weight = sanitizeInput($_POST["weightSelect"][$key]);

            $image1 = uploadFile("image0", $imageUploadDir, $key);
            $image2 = uploadFile("image1", $imageUploadDir, $key);
            $image3 = uploadFile("image2", $imageUploadDir, $key);
            $image4 = uploadFile("image3", $imageUploadDir, $key);
            $video1 = uploadFile("video", $videoUploadDir, $key);
            $video2 = uploadFile("video1", $videoUploadDir, $key);

            $variants[] = [
                'product_id' => $_SESSION["product_id"],
                'variant_name' => $variantName,
                'sku' => $sku,
                'quantity' => $quantity,
                'min_buy_amount' => $minBuyAmount,
                'color' => $color,
                'size' => $size,
                'speed' => $speed,
                'memory' => $memory,
                'generation' => $generation,
                'material' => $material,
                'type' => $type,
                'price' => $price,
                'weight' => $weight,
                'image1' => $image1,
                'image2' => $image2,
                'image3' => $image3,
                'image4' => $image4,
                'video1' => $video1,
                'video2' => $video2,
            ];
        }
    }

    // Loop through each variant and insert data into the table
    foreach ($variants as $variant) {
        // Bind parameters with values from the variant array
        $stmt->bind_param(
            "issiissssssssdssssss",
            $variant['product_id'],
            $variant['variant_name'],
            $variant['sku'],
            $variant['quantity'],
            $variant['min_buy_amount'],
            $variant['color'],
            $variant['size'],
            $variant['speed'],
            $variant['memory'],
            $variant['generation'],
            $variant['material'],
            $variant['type'],
            $variant['weight'],
            $variant['price'],
            $variant['image1'],
            $variant['image2'],
            $variant['image3'],
            $variant['image4'],
            $variant['video1'],
            $variant['video2']
        );

        // Execute the statement for inserting a variant
        if ($stmt->execute()) {
            echo "Data inserted successfully";
        } else {
            // Error occurred while inserting data
            echo "Error: " . $stmt->error;
        }
    }

    // Close the statement
    $stmt->close();

    if (isset($_SESSION['product_id'])) {
        // Get product_id from the hidden input field
        // Check if $_POST['itemInput'] is an array before imploding
        if (isset($_POST['itemInput']) && is_array($_POST['itemInput'])) {
            $items = implode(', ', $_POST['itemInput']);
        } else {
            $items = ''; // Default value if $_POST['itemInput'] is not set or not an array
        }

        $specification_checks = trim($items);
        $specification_checks = trim($items);

        // Sanitize and validate other input fields
        $specification = isset($_POST["Specification"]) ? sanitizeInput($_POST["Specification"]) : "";
        $shipping_info = isset($_POST["Shipping-info"]) ? sanitizeInput($_POST["Shipping-info"]) : "";
        $warranty = isset($_POST["Warranty-info"]) ? sanitizeInput($_POST["Warranty-info"]) : "";
        $seller_manufacturer_info = isset($_POST["Seller/Manufacturer-info"]) ? sanitizeInput($_POST["Seller/Manufacturer-info"]) : "";

        // Insert data into the 'about' table
        $sql = "INSERT INTO product_about (product_id, Specification, Shipping_info, warranty, Seller_info, specification_checks)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt1 = $conn->prepare($sql);
        $stmt1->bind_param("isssss", $_SESSION['product_id'], $specification, $shipping_info, $warranty, $seller_manufacturer_info, $specification_checks);

        if ($stmt1->execute()) {
            // About info inserted successfully
            echo "About info inserted successfully!";
        } else {
            // Error occurred while inserting data
            echo "Error: " . $stmt1->error;
        }

        // Close the statement
        $stmt1->close();
    }


    // Close the database connection
    $conn->close();


    unset($_SESSION['product_added']);
    unset($_SESSION['product_data']);
    unset($_SESSION['product_id']);
    unset($_SESSION['selected_subcategory_name']);
} else {
    echo "<script>alert('Please add the product information'); window.location.href='variatis.php';</script>";
}



// Loop through the session and echo out its contents
foreach ($_SESSION as $key => $value) {
    echo $key . ": ";
    // Check if the value is an array or an object
    if (is_array($value) || is_object($value)) {
        print_r($value); // Use print_r to display arrays and objects
    } else {
        echo $value; // Echo other data types
    }
    echo "<br>";
}
