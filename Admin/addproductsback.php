<?php
require_once "con2.php";

// Query to retrieve category options from the database
$categoryQuery = "SELECT CategoryID, CategoryName FROM Categories";
$categoryResult = mysqli_query($conn, $categoryQuery);

// Check if the query was successful
if ($categoryResult) {
    // Create an array to store category options
    $categoryOptions = array();

    // Fetch category options and store them in the array
    while ($row = mysqli_fetch_assoc($categoryResult)) {
        $categoryOptions[$row['CategoryID']] = $row['CategoryName'];
    }
} else {
    // Handle database query error
    echo "Error: " . mysqli_error($conn);
}

// Query to retrieve subcategory options from the database
$subcategoryQuery = "SELECT Sub_category_id, Sub_category_name, CategoryID FROM `sub_category`";
$subcategoryResult = mysqli_query($conn, $subcategoryQuery);

// Check if the query was successful
if ($subcategoryResult) {
    // Create an array to store subcategory options
    $subcategoryOptions = array();

    // Fetch subcategory options and store them in the array
    while ($row = mysqli_fetch_assoc($subcategoryResult)) {
        $subcategoryOptions[$row['Sub_category_id']] = [
            'SubCategoryName' => $row['Sub_category_name'],
            'CategoryID' => $row['CategoryID']
        ];
    }
} else {
    // Handle database query error
    echo "Error: " . mysqli_error($conn);
}

// Encode both category and subcategory options as JSON
$categoryAndSubcategoryData = [
    'categories' => $categoryOptions,
    'subcategories' => $subcategoryOptions
];
$categoryAndSubcategoryDataJson = json_encode($categoryAndSubcategoryData);
?>

<!-- Pass the JSON-encoded data to JavaScript -->
<script>
const categoryAndSubcategoryData = <?php echo $categoryAndSubcategoryDataJson; ?>;
</script>


<?php
require_once "con2.php";

// ... (previous code)

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Establish a new database connection since the previous one is closed

    // Function to get the file type based on its MIME type
    function getFileType($file) {
        if (empty($file) || !file_exists($file)) {
            return "Unknown"; // Handle the case where the file is empty or doesn't exist
        }
    
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file);
        finfo_close($finfo);
    
        return $mime;
    }
    
    // Function to determine the upload directory based on the selected subcategory
    function getUploadDirectory($selectedSubcategoryname) {
        return "uploads/" . $selectedSubcategoryname . "/";
    }

    // Get the selected subcategory's ID from the hidden input field
    $selectedSubcategoryname = $_POST["selected_subcategory_name"];

    // Define the directory where you want to store the files based on their type
    $imageUploadDir = getUploadDirectory($selectedSubcategoryname) . "images/";
    $videoUploadDir = getUploadDirectory($selectedSubcategoryname) . "videos/";

    // Function to handle file uploads and return the file path
    function uploadFile($inputName, $uploadDir) {
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
            return "the media not inerted"; // Return an empty string if the file type is not allowed
        }
    }

    // Handle product information
    $product_name = $_POST["product_name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $stockquantity = $_POST["stockquantity"];
    $category_id = $_POST["category_id"];
    $sub_category_id = $_POST["subcategory_id"];
    $brand_id = $_POST["brand_id"];
    $sku = $_POST["sku"];

    // Handle uploaded images and videos separately
    $main_product_image = uploadFile("main_product_image", $imageUploadDir);
    $second_product_image = uploadFile("second_product_image", $imageUploadDir);
    $third_product_image = uploadFile("third_product_image", $imageUploadDir);
    $fourth_product_image = uploadFile("fourth_product_image", $imageUploadDir);
    $main_product_video = uploadFile("main_product_video", $videoUploadDir);
    $second_product_video = uploadFile("second_product_video", $videoUploadDir);
    $third_product_video = uploadFile("third_product_video", $videoUploadDir);
    $fourth_product_video = uploadFile("fourth_product_video", $videoUploadDir);

    // Create a MySQLi connection
    $mysqli = new mysqli("localhost:4022", "root", "Ellis@Monique123", "tradehut");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare the SQL statement
    $sql = "INSERT INTO products 
            (product_name, description, price, stockquantity, category_id, 
            sub_category_id, brand_id, main_product_image, 
            2nd_product_image, 3rd_product_image, 4th_product_image, 
            main_product_video, 2nd_product_video, 3rd_product_video, 
            4th_product_video) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $mysqli->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssdiiiissssssss",
        $product_name,
        $description,
        $price,
        $stockquantity,
        $category_id,
        $sub_category_id,
        $brand_id,
        $main_product_image,
        $second_product_image,
        $third_product_image,
        $fourth_product_image,
        $main_product_video,
        $second_product_video,
        $third_product_video,
        $fourth_product_video
    );

    // Execute the statement
    if ($stmt->execute()) {
        echo "Product and files uploaded successfully!";
    } else {
        echo "Error: " . $mysqli->error;
    }

    // Close the statement and connection
    $stmt->close();
    $mysqli->close();
}
?>
