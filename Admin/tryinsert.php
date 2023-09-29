<?php 
require_once "con2.php";
?>
<?php 
require_once "addproductsback.php";
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
        <form action="" method="POST" enctype="multipart/form-data">
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

                
<div class="attrib">
    
    
                <div id="attributeContainer">
                    <h3>attri 1</h3>
                    <div class="attribute-row">
                        <label for="attributeSelect">Attributes:</label>
                        <select name="attribute_id" class="attributeSelect" required>
                            <option value="">Select an attribute</option>
                            <!-- ... (options for attributes) ... -->
                        </select>
    
                        <label for="attribute_valuesSelect">Attribute Values:</label>
                        <select name="value_id" class="attribute_valuesSelect" required>
                            <option value="">Select an attribute_value</option>
                            <!-- ... (options for attribute values) ... -->
                        </select>
    
                        <!-- Add a "minus" button to remove the cloned node -->
                    </div>
    
                </div>
                <button id="addAttributeButton">+</button> </div>
                <!-- Add a "plus" button to add more dropdowns -->
</div>

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

                <label for="sku">SKU:</label>
                <input type="text" name="sku" required><br><br>

              
           


<input type="submit" value="Upload">
</form>


           




            <script>
            // Function to fetch and populate attributes in a dropdown
            function populateAttributes(attributeSelect) {
                // Make an AJAX request to fetch attributes from 'get_attributes.php'
                fetch('get_attributes.php')
                    .then(response => response.json()) // Parse the response as JSON
                    .then(data => {
                        // Clear the existing options in the attributeSelect dropdown
                        attributeSelect.innerHTML = '';

                        // Add a default "Select an attribute" option
                        const defaultAttributeOption = document.createElement('option');
                        defaultAttributeOption.value = '';
                        defaultAttributeOption.text = 'Select an attribute';
                        attributeSelect.appendChild(defaultAttributeOption);

                        // Add attribute options obtained from the fetched data
                        data.attributes.forEach(attribute => {
                            const option = document.createElement('option');
                            option.value = attribute.attribute_id;
                            option.text = attribute.attribute_name;
                            attributeSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching attributes:', error);
                    });
            }

            // Function to fetch and populate attribute values in a dropdown
            function populateAttributeValues(attributeSelect, attributeValuesSelect) {
                const selectedAttributeId = attributeSelect.value;

                // Make an AJAX request to fetch attribute values for the selected attribute
                fetch('get_attribute_values.php?attribute_id=' + selectedAttributeId)
                    .then(response => response.json()) // Parse the response as JSON
                    .then(data => {
                        // Clear the existing options in the attributeValuesSelect dropdown
                        attributeValuesSelect.innerHTML = '';

                        // Add a default "Select an attribute_value" option
                        const defaultAttributeOption = document.createElement('option');
                        defaultAttributeOption.value = '';
                        defaultAttributeOption.text = 'Select an attribute_value';
                        attributeValuesSelect.appendChild(defaultAttributeOption);

                        // Add attribute value options obtained from the fetched data
                        data.attribute_values.forEach(attributevalue => {
                            const option = document.createElement('option');
                            option.value = attributevalue.value_id;
                            option.text = attributevalue.value_name;
                            attributeValuesSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching attribute values:', error);
                    });
            }

            // Function to handle change events for attribute selection
            function handleAttributeChange(attributeSelect, attributeValuesSelect) {
                // Add a change event listener to the attributeSelect dropdown
                attributeSelect.addEventListener('change', function() {
                    // When the selection changes, call the function to populate attribute values
                    populateAttributeValues(attributeSelect, attributeValuesSelect);
                });
            }

            document.addEventListener("DOMContentLoaded", function() {
                // Get references to the attributeSelect and attributeValuesSelect dropdowns
                const attributeSelect = document.getElementsByClassName('attributeSelect');
                // const attributeValuesSelect = document.getElementsByClassName('attribute_valuesSelect');

                // Get references to the initial attributeSelect and attributeValuesSelect dropdowns
                const initialAttributeSelect = document.querySelector('.attributeSelect');
                const initialValueSelect = document.querySelector('.attribute_valuesSelect');

                // Initialize attribute dropdowns with data
                populateAttributes(attributeSelect);
                populateAttributes(initialAttributeSelect);

                // Add change event listeners to handle attribute selection changes
                // handleAttributeChange(attributeSelect, attributeValuesSelect);
                handleAttributeChange(initialAttributeSelect, initialValueSelect);
            });

            // Function to add new attribute dropdowns
            function addAttributeDropdowns() {
                // Clone the existing attribute dropdowns within the '.attribute-row' container
                const clonedAttributeDropdowns = attributeContainer.querySelector('.attribute-row')
                    .cloneNode(true);

                // Clear the selected values in the cloned dropdowns
                const clonedAttributeSelect = clonedAttributeDropdowns.querySelector('.attributeSelect');
                const clonedAttributeValuesSelect = clonedAttributeDropdowns.querySelector('.attribute_valuesSelect');
                clonedAttributeSelect.selectedIndex = 0;
                clonedAttributeValuesSelect.selectedIndex = 0;

                // Append the cloned dropdowns to the attributeContainer
                attributeContainer.appendChild(clonedAttributeDropdowns);

                // Add a "minus" button to remove the cloned node
                const removeButton = document.createElement('button');
                removeButton.textContent = '-';
                removeButton.className = 'removeAttributeButton'; // Add a class for easier selection
                removeButton.onclick = function() {
                    // When the remove button is clicked, call the function to remove the cloned row
                    removeAttributeRow(this);
                };
                clonedAttributeDropdowns.appendChild(removeButton);

                // Add change event listeners to handle attribute selection changes in the cloned dropdowns
                handleAttributeChange(clonedAttributeSelect, clonedAttributeValuesSelect);
            }

            // Function to remove the cloned attribute row
            function removeAttributeRow(button) {
                const attributeRow = button.parentElement;
                // Remove the cloned attribute row from the attributeContainer
                attributeContainer.removeChild(attributeRow);
            }

            // Get references to the attributeContainer and addAttributeButton
            const attributeContainer = document.getElementById('attributeContainer');
            const addAttributeButton = document.getElementById('addAttributeButton');

            // Add a click event listener to the "plus" button to add new attribute dropdowns
            addAttributeButton.addEventListener('click', addAttributeDropdowns);
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















    </body>

</html>