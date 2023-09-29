<?php 
require_once "con2.php";
?>
<?php 
require_once "addproductsback.php";
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the product name from the form
    $productName = $_POST["product_name"];

    // Extract the first three letters of the product name
    $firstThreeLetters = substr($productName, 0, 3);

    // Now you have $firstThreeLetters containing the first three letters of the product name

    // Rest of your code...
}


?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Hope UI | Responsive Bootstrap 5 Admin Dashboard Template</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico" />

        <!-- Library / Plugin Css Build -->
        <link rel="stylesheet" href="../assets/css/core/libs.min.css" />

        <!-- Hope Ui Design System Css -->
        <link rel="stylesheet" href="../assets/css/hope-ui.min.css?v=2.0.0" />

        <!-- Custom Css -->
        <link rel="stylesheet" href="../assets/css/custom.min.css?v=2.0.0" />

        <!-- Dark Css -->
        <link rel="stylesheet" href="../assets/css/dark.min.css" />

        <!-- Customizer Css -->
        <link rel="stylesheet" href="../assets/css/customizer.min.css" />

        <!-- RTL Css -->
        <link rel="stylesheet" href="../assets/css/rtl.min.css" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </head>

    <body>
        <h1>Upload Product</h1>
        <form action="addproducts.php" method="POST" enctype="multipart/form-data">
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" required><br><br>

            <label for="description">Description:</label><br>
            <textarea name="description" rows="4" required></textarea><br><br>

            <label for="price">Price:</label>
            <input type="text" name="price" required><br><br>

            <label for="stockquantity">Stock Quantity:</label>
            <input type="number" name="stockquantity" required><br><br>

            <form id="productForm" method="POST">
                <label for="categorySelect">Category:</label>
                <select name="category_id" id="categorySelect" required>
                    <option value="">Select a category</option>
                    <!-- Categories will be populated dynamically -->
                </select>

                <br>

                <label for="subcategorySelect">Subcategory:</label>
                <select name="subcategory_id" id="subcategorySelect" required>
                    <option value="">Select a subcategory</option>
                    <!-- Subcategories will be populated dynamically based on the selected category -->
                </select>


                <label for="subcategorySelect">Brand</label>
                <select name="brand_id" id="brandselect">
                    <option value="">Select a Brand</option>
                </select>







                <br><br>

                <table id="variant-table" class="table">
                    <tr class="variant-fields">
                        <td><label class="color">Color:</label></td>
                        <td><input type="text" name="color" placeholder="Color"></td>

                        <td><label class="size">Size:</label></td>
                        <td><input type="text" name="size" placeholder="Size"></td>
                    </tr>
                    <tr class="variant-fields">
                        <td><label class="material">Material:</label></td>
                        <td><input type="text" name="material" placeholder="Material"></td>

                        <td><label class="voltage">Voltage:</label></td>
                        <td><input type="text" name="voltage" placeholder="Voltage"></td>
                    </tr>
                    <tr class="variant-fields">
                        <td><label class="wattage">Wattage:</label></td>
                        <td><input type="text" name="wattage" placeholder="Wattage"></td>

                        <td><label class="plug-type">Plug Type:</label></td>
                        <td><input type="text" name="plug_type" placeholder="Plug Type"></td>
                    </tr>
                    <tr class="variant-fields">
                        <td><label class="weight">Weight (KG):</label></td>
                        <td><input type="text" name="weight" placeholder="Weight (KG)"></td>

                        <td><label class="dimensions">Dimensions:</label></td>
                        <td><input type="text" name="dimensions" placeholder="Dimensions"></td>
                    </tr>
                    <tr class="variant-fields">
                        <td><label class="os">Operating System:</label></td>
                        <td><input type="text" name="operating_system" placeholder="Operating System">
                        </td>

                        <td><label class="strage_capacity">Capacity:</label></td>
                        <td><input type="text" name="capacity" placeholder="Capacity"></td>
                    </tr>
                    <tr class="variant-fields">
                        <td><label class="resolution">Resolution:</label></td>
                        <td><input type="text" name="resolution" placeholder="Resolution"></td>

                        <td><label class="speed">Speed:</label></td>
                        <td><input type="text" name="speed" placeholder="Speed"></td>
                    </tr>
                    <tr class="variant-fields">
                        <td><label class="style">Style:</label></td>
                        <td><input type="text" name="style" placeholder="Style"></td>

                        <td><label class="pattern">Pattern:</label></td>
                        <td><input type="text" name="pattern" placeholder="Pattern"></td>
                    </tr>
                    <tr class="variant-fields">
                        <td><label class="sku">SKU:</label></td>
                        <td><input type="text" name="sku" placeholder="SKU"></td>
                    </tr>
                    <tr class="variant-fields">
                        <td><label class="cpu">CPU:</label></td>
                        <td><input type="text" name="cpu" placeholder="CPU"></td>
                    </tr>
                </table>

                <button onclick="generateSKU()">Generate SKUs</button>
                <h4>SKU: <span class="sku"></span></h4>



                <br>
                <br>





                <!-- Product Image Fields -->
                <label for="product_image1">Main_product_image:</label>
                <input type="file" name="main_product_image" accept="image/*"><br><br>

                <label for="2nd_product_image">2nd_product_image:</label>
                <input type="file" name="second_product_image" accept="image/*"><br><br>

                <label for="3rd_product_image">3rd_product_image:</label>
                <input type="file" name="third_product_image" accept="image/*"><br><br>


                <label for="4th_product_image">4th_product_image:</label>
                <input type="file" name="fourth_product_image" accept="image/*"><br><br>

                <!-- Video Upload Fields -->
                <label for="Main_product_video">Main_product_video:</label>
                <input type="file" name="main_product_video" accept="video/*"><br><br>

                <label for="2nd_product_video">2nd_product_video:</label>
                <input type="file" name="second_product_video" accept="video/*"><br><br>

                <label for="3rd_product_video">3rd_product_video:</label>
                <input type="file" name="third_product_video" accept="video/*"><br><br>

                <label for="4th_product_video">4th_product_video:</label>
                <input type="file" name="fourth_product_video" accept="video/*"><br><br>


                <input type="submit" value="Upload">
            </form>




            <script>
            function generateSKU() {
                const rows = document.querySelectorAll(".variant-fields");

                rows.forEach((row) => {
                    const color = row.querySelector("input[name='color']").value || "NOCOLOR";
                    const size = row.querySelector("input[name='size']").value || "NOSIZE";
                    const first3 = "<?php echo isset($firstThreeLetters) ? $firstThreeLetters : ''; ?>";

                    // You can add more attributes as needed

                    const SKU = `${first3}-${color}-${size}`; // You can modify the format as needed

                    // Set the generated SKU in the corresponding input field
                    const skuSpan = row.querySelector(".sku");
                    skuSpan.textContent = SKU;
                    console.log(SKU);
                });
            }
            </script>

            <script>
            document.addEventListener("DOMContentLoaded", function() {
                const categorySelect = document.getElementById('categorySelect');
                const subcategorySelect = document.getElementById('subcategorySelect');
                const brandSelect = document.getElementById('brandselect');

                // Function to populate categories from the server
                function populateCategories() {
                    // Make an AJAX request to fetch categories
                    fetch('get_categories.php')
                        .then(response => response.json())
                        .then(data => {
                            // Clear the existing options
                            categorySelect.innerHTML = '';
                            subcategorySelect.innerHTML = '';

                            // Add a default "Select a category" option
                            const defaultCategoryOption = document.createElement('option');
                            defaultCategoryOption.value = '';
                            defaultCategoryOption.text = 'Select a category';
                            categorySelect.appendChild(defaultCategoryOption);

                            // Add category options
                            data.categories.forEach(category => {
                                const option = document.createElement('option');
                                option.value = category.CategoryID;
                                option.text = category.CategoryName;
                                categorySelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching categories:', error);
                        });
                }

                // Function to update subcategories based on the selected category
                function updateSubcategories() {
                    const selectedCategoryId = categorySelect.value;

                    // Make an AJAX request to fetch subcategories for the selected category
                    fetch('get_subcategories.php?category_id=' + selectedCategoryId)
                        .then(response => response.json())
                        .then(data => {
                            // Clear the existing subcategory options
                            subcategorySelect.innerHTML = '';

                            // Add a default "Select a subcategory" option
                            const defaultSubcategoryOption = document.createElement('option');
                            defaultSubcategoryOption.value = '';
                            defaultSubcategoryOption.text = 'Select a subcategory';
                            subcategorySelect.appendChild(defaultSubcategoryOption);

                            // Add subcategory options
                            data.subcategories.forEach(subcategory => {
                                const option = document.createElement('option');
                                option.value = subcategory.Sub_category_id;
                                option.text = subcategory.Sub_category_name;
                                subcategorySelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching subcategories:', error);
                        });
                }


                function updateBrands() {
                    const selectedCategoryId = categorySelect.value;

                    // Make an AJAX request to fetch subcategories for the selected category
                    fetch('get_brands.php?category_id=' + selectedCategoryId)
                        .then(response => response.json())
                        .then(data => {
                            // Clear the existing subcategory options
                            brandSelect.innerHTML = '';

                            // Add a default "Select a subcategory" option
                            const defaultBrandOption = document.createElement('option');
                            defaultBrandOption.value = '';
                            defaultBrandOption.text = 'Select a brand';
                            brandSelect.appendChild(defaultBrandOption);


                            // Add subcategory options
                            data.brands.forEach(brand => {
                                const option = document.createElement('option');
                                option.value = brand.brand_id;
                                option.text = brand.BrandName;
                                brandSelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching brands:', error);
                        });
                }


                // Event listener for category selection
                categorySelect.addEventListener('change', updateSubcategories);
                categorySelect.addEventListener('change', updateBrands);
                // Populate categories when the page loads
                populateCategories();
            });
            </script>







            <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Function to show or hide variant field groups based on the selected category
                function updateVariantFields(categoryID) {
                    const variantFields = document.getElementsByClassName("variant-fields");

                    // Hide all variant field groups by default
                    for (let i = 0; i < variantFields.length; i++) {
                        variantFields[i].style.display = "none";
                    }

                    switch (categoryID) {
                        case "4": // Example category ID
                            show("cpu");
                            show("color");
                            show("size");
                            show("material");
                            show("weight");
                            show("os");
                            show("storage_capacity"); // Corrected class name
                            show("resolution");
                            // Add more cases for other category IDs and corresponding field groups
                            break;
                        case "5": // Another category ID
                            show("speed");
                            show("pattern");
                            show("sku");
                            show("resolution");
                            show("wattage");
                            show("cpu");
                            show("cpu");
                            show("cpu");
                            break;
                        default:
                            // Handle the default case if needed
                            break;
                    }
                }

                // Function to show elements with a specific class
                function show(className) {
                    const elements = document.getElementsByClassName(className);
                    for (let i = 0; i < elements.length; i++) {
                        elements[i].closest("tr").style.display = "table-row";
                    }
                }

                // Event listener for category selection
                const categorySelect = document.querySelector('select[name="category_id"]');
                categorySelect.addEventListener("change", function() {
                    const selectedCategoryID = categorySelect.value;
                    updateVariantFields(selectedCategoryID);
                });
            });
            </script>

    </body>

</html>