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




    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Establish a new database connection since the previous one is closed


        // $mediaSql = "INSERT INTO `productmedia` (`product_id`, `Main_product_image`, `2nd_product_image`, `3rd_product_image`, `4th_product_image`, `Main_product_video`, `2nd_product_video`, `3rd_product_video`, `4th_product_video`) VALUES ( last_insert_id(), ?, ?, ?, ?, ?, ?, ?, ?)";

        // // Prepare the SQL statement for media insertion
        // $mediaStmt = mysqli_prepare($conn, $mediaSql);
       


        // // Get product data from the form
        // $product_name = $_POST['product_name'];
        // $description = $_POST['description'];
        // $price = $_POST['price'];
        // $stockquantity = $_POST['stockquantity'];
        // $category_id = $_POST['category_id'];
        // $sku = $_POST['sku'];


        // $media_id = $_POST['media_id'];

     
        // if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
        //     $product_image = $target_file;
        // } else {
        //     echo "Sorry, there was an error uploading your product image.<br>";
        //     exit;
        // }




        // $target_dir = "uploads/"; // Create a directory for image and video uploads
        // $uploaded_file_paths = array(); // Initialize an array to store the file paths
        
        // // Loop through each uploaded file
        // foreach ($_FILES["product_image"]["tmp_name"] as $key => $tmp_name) {
        //     $target_file = $target_dir . basename($_FILES["product_image"]["name"][$key]);
        
        //     if (move_uploaded_file($tmp_name, $target_file)) {
        //         $uploaded_file_paths[] = $target_file;
        //     } else {
        //         echo "Sorry, there was an error uploading one of your image files.";
        //         // Handle the error as needed
        //     }
        // }
        
        // Do the same for video files (adjust the file input name accordingly)
        
        // Establish a database connection (replace with your database details)
    

        // Define the SQL query for product insertion
      
       
            // Handle product information
            $product_name = $_POST["product_name"];
            $description = $_POST["description"];
            $price = $_POST["price"];
            $stockquantity = $_POST["stockquantity"];
            $category_id = $_POST["category_id"];
            $sub_category_id = $_POST["subcategory_id"];
            $brand_id = $_POST["brand_id"];
            $sku = $_POST["sku"];
        
            // Handle uploaded images and videos
            $main_product_image = uploadFile("main_product_image");
            $second_product_image = uploadFile("second_product_image");
            $third_product_image = uploadFile("third_product_image");
            $fourth_product_image = uploadFile("fourth_product_image");
            $main_product_video = uploadFile("main_product_video");
            $second_product_video = uploadFile("second_product_video");
            $third_product_video = uploadFile("third_product_video");
            $fourth_product_video = uploadFile("fourth_product_video");
        
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
        
        // Function to handle file uploads and return the file path
        function uploadFile($inputName) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES[$inputName]["name"]);
        
            if (move_uploaded_file($_FILES[$inputName]["tmp_name"], $target_file)) {
                return $target_file; // Return the file path
            } else {
                return ""; // Return an empty string if there was an error
            }
       






// Define the SQL query for variant insertion

// Close the database connection
mysqli_close($conn);
}
?>