<?php

require_once "con2.php";
require_once "addproducts.php";
// session_destroy();

// Check if the product has been added
$productAdded = isset($_SESSION['product_added']) && $_SESSION['product_added'];

// Retrieve the form data from the session
$productData = isset($_SESSION['product_data']) ? $_SESSION['product_data'] : [];

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            padding: 50px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        select {

            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="file"] {
            border: none;
        }

        .btn {
            display: inline-block;


            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }



        .btn:hover {
            background-color: #0056b3;
        }





        th {
            background-color: #007bff;
            color: #fff;
        }
    </style>
    <style>
        /* Container for warranty, shipping, seller/manufacturer info, and return policy */
        .Checks,
        .warranty-information,
        .Shipping-info,
        .Seller-Manufacturer-info,
        .Return-Policy {
            margin: 20px 0;
            padding: 20px;
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .Checks,
        .warranty-information p,
        .Shipping-info p,
        .Seller-Manufacturer-info p,
        .Return-Policy p {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .Checks,
        .warranty-information textarea,
        .Shipping-info textarea,
        .Seller-Manufacturer-info textarea,
        .Return-Policy textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            resize: vertical;
            font-size: 16px;
        }

        /* Responsive design for smaller screens */
        @media (max-width: 768px) {

            .Checks,
            .warranty-information,
            .Shipping-info,
            .Seller-Manufacturer-info,
            .Return-Policy {
                margin: 10px 0;
                padding: 15px;
            }

            .Checks,
            .warranty-information p,
            .Shipping-info p,
            .Seller-Manufacturer-info p,
            .Return-Policy p {
                font-size: 16px;
            }

            .Checks,
            .warranty-information textarea,
            .Shipping-info textarea,
            .Seller-Manufacturer-info textarea,
            .Return-Policy textarea {
                font-size: 14px;
            }
        }
    </style>

</head>

<body>


    <div class="container mb-5">
        <form action="addproducts.php" method="POST" enctype="multipart/form-data" id="myForm">
            <label for="categorySelect">Category:</label>
            <select name="category_id" id="categorySelect" required>
                <option value="">Select a category</option>
                <!-- Categories will be populated dynamically -->
            </select> <button class="btn btn-secondary  btn-sm" type="button" id="add_category">
                <i class="fas fa-plus"></i>
            </button>
            <label for="subcategorySelect">Subcategory:</label>
            <select name="subcategory_id" id="subcategorySelect" required>
                <option value="">Select a subcategory</option>
                <!-- Subcategories will be populated dynamically based on the selected category -->
            </select> <button class="btn btn-secondary clone-button btn-sm" type="button" data-toggle="modal" id="add_sub_category">
                <i class="fas fa-plus"></i>
            </button>
            <input type="hidden" name="selected_subcategory_id" id="selectedSubcategoryID">
            <input type="hidden" name="selected_subcategory_name" id="selectedSubcategoryname" value="">
            <br><br>
            <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" required><br><br>
            <label for="keywords">keywords:</label>
            <input type="text" name="keywords"><br><br>
            <label for="slug">Slug:</label>
            <input type="text" name="slug" placeholder="product-name"><br><br>
            <label for="description">Description:</label>
            <textarea name="description" rows="4" cols="50" required></textarea>
            <br>
            <br>
            <label for="Image">Image:</label>
            <small>currently: <br></small>
            <input type="file" name="main_product_image" accept="image/*" data-bs-toggle="tooltip" title="This image will be shown on the main product listing ">
            <label for="brandSelect">Brand</label>
            <select name="brand_id" id="brandselect" style="width:100px" required>
                <option value="">Select a Brand</option>
            </select>
            <button class="btn btn-secondary clone-button btn-sm" type="button" data-toggle="modal" id="add_brand">
                <i class="fas fa-plus"></i>
            </button>
            <br><br>
            <input type="hidden" name="selected_subcategory_id" id="selectedSubcategoryID">
            <div class="modal fade" id="commonModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modalTitle">Modal Title</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form id="modalForm" method="POST" action="">
                                <div class="form-group">
                                    <label for="modalInput" id="modalInputLabel">Input Label:</label>
                                    <input type="text" class="form-control" id="modalInput" name="modalInput">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="modalSubmit">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <label for="price">Price:</label>
            <input type="text" name="price" id="price" pattern="\d+(\.\d{2})?" required>
            <label for="Quantity">Quantity:</label>
            <input type="number" name="quantity" required>
            <label for="MinAmount">Minimum Buy Amount:</label>
            <input type="number" name="min_amount" required>

            <?php if (!empty($productData)) { ?>
                <script>
                    window.onload = function() {
                        // Enable form inputs when the "Edit" button is clicked
                        document.getElementById('editButton').addEventListener('click', function() {
                            var inputs = document.querySelectorAll('#myForm input, #myForm textarea, #myForm select');
                            for (var i = 0; i < inputs.length; i++) {
                                inputs[i].removeAttribute('disabled');
                            }

                            document.getElementById('savechanges').style.display = 'block';


                            // Populate form fields from session data
                            var sessionData = <?php echo json_encode($_SESSION['product_data']); ?>;
                            if (sessionData) {
                                for (var inputName in sessionData) {
                                    if (sessionData.hasOwnProperty(inputName)) {
                                        var input = document.querySelector('#myForm [name="' + inputName + '"]');
                                        if (input) {
                                            input.value = sessionData[inputName];
                                        }
                                    }
                                }
                            }
                        });
                    };




                    var priceInput = document.getElementById('price');

                    var priceInput = document.getElementById('price');

                    if (priceInput) {
                        priceInput.addEventListener('input', function() {
                            var priceValue = priceInput.value;
                            var decimalPattern = /^\d+(\.\d{2})?$/;

                            if (!decimalPattern.test(priceValue)) {
                                priceInput.classList.add('error');
                            } else {
                                priceInput.classList.remove('error');
                            }
                        });
                    }
                </script>

            <?php } ?>

            <div class="container mt-5" id="form-handlers">
                <?php if (empty($productData)) { // Check if the product data is not available 
                ?>
                    <button class="btn btn-sm btn-success" name="add_product" value="Submit" type="submit" form="myForm">Add product</button>
                <?php } else { ?>
                    <button class="btn btn-sm btn-success" name="add_product" value="Submit" type="submit" form="myForm" disabled>Add product</button>
                    <button type="button" class="btn btn-sm btn-primary" id="editButton">Edit</button>
                    <button type="submit" form="myForm" class="btn btn-sm btn-primary" name="savechanges" id="savechanges" style="display:none;">Save Changes</button>

                <?php } ?>
            </div>

        </form>
    </div>



    <form action="addvariants.php" method="POST" enctype="multipart/form-data" id="addvariant">
        <div class=" container mb-5">
            <table class="table table-bordered table-hover" style="width:auto;">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Variant Name</th>
                        <th scope="col" style="width: 100px;">Image</th>
                        <th scope="col">SKU</th>
                        <th scope="col">Min-b</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="variant-section">
                        <td>
                            <label for="name">Variant Name:</label><br>
                            <input type="text" name="variant_name[]" value="" placeholder="ie: Red - Tshirt "><br><br>
                            <label for="sku">SKU:</label><br>
                            <input type="text" name="sku[]" value="">
                        </td>
                        <td style="width: 100px;">
                            <label for="image">Add main Image for this variant:</label><br>
                            <input type="file" name="image0[]" accept="image/*" id="image-input-0" onchange="handleImageUpload(this, 'profile-preview-0')" multiple /><br><br>
                            <input type="file" name="image1[]" accept="image/*" id="image-input-1" onchange="handleImageUpload(this, 'profile-preview-1')" multiple /> <br /><br>
                            <input type="file" name="image2[]" accept="image/*" id="image-input-2" onchange="handleImageUpload(this, 'profile-preview-2')" multiple /> <br /><br>
                            <input type="file" name="image3[]" accept="image/*" id="image-input-3" onchange="handleImageUpload(this, 'profile-preview-3')" multiple /> <br /><br>
                            <b>Add a video</b>
                            <br /><br>
                            <input type="file" name="video[]" accept="video/*" id="video-input-0" onchange="handleVideoUpload(this, 'video-preview-0')" multiple /><br /><br>
                            <input type="file" name="video1[]" accept="video/*" id="video-input-1" onchange="handleVideoUpload(this, 'video-preview-1')" multiple /><br /><br>
                        </td>
                        <td>
                            <img class="profile-preview" src="" alt="preview" width="100px" id="profile-preview-0" /><br /><br>
                            <img class="profile-preview" src="" alt="preview" width="100px" height="100px" id="profile-preview-1" /><br /><br>
                            <img class="profile-preview" src="" alt="preview" width="100px" height="100px" id="profile-preview-2" /> <br /><br>
                            <img class="profile-preview" src="" alt="preview" width="100px" height="100px" id="profile-preview-3" /> <br /><br>
                            <img class="profile-preview" src="" alt="preview" width="100px" height="100px" id="profile-preview-4" /> <br /><br>
                            <video class="video-preview" controls width="100px" height="100px" id="video-preview-0"></video><br /><br>
                            <video class="video-preview" controls width="100px" height="100px" id="video-preview-1"></video>
                        </td>
                        <td>
                            <label for="name">Price:</label>
                            <input type="number" name="price[]" value="" style="width: 100px;"><br>
                            <label for="name"> Min-b:</label>
                            <input type="number" name="min_b[]" value="" style="width: 100px;"><br>
                            <label for="name"> Quantity:</label>
                            <input type="number" name="quantity[]" value="" style="width: 100px;"><br>
                        </td>
                        <td>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Attribute Name</th>
                                        <th>Select and Add</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Color</td>
                                        <td>
                                            <div class="select-with-button">
                                                <select id="colorsSelect" name="colorsSelect[]">
                                                    <option value="">Select a color</option>
                                                    <!-- Add color options here -->
                                                </select>
                                                <button class="btn btn-secondary clone-button btn-sm" type="button" id="colorsSelectButton">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Size</td>
                                        <td>
                                            <div class="select-with-button">
                                                <select name="sizeSelect[]" id="sizeSelect" style="width:100px">
                                                    <option value="">Select</option>
                                                    <!-- Add size options here -->
                                                </select>
                                                <button class="btn btn-secondary clone-button btn-sm" type="button" id="sizeSelectButton">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Speed</td>
                                        <td>
                                            <div class="select-with-button">
                                                <select name="speedSelect[]" id="speedSelect">
                                                    <option value="">Select</option>
                                                    <!-- Add speed options here -->
                                                </select>
                                                <button class="btn btn-secondary clone-button btn-sm" type="button" id="speedSelectButton">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Memory</td>
                                        <td>
                                            <div class="select-with-button">
                                                <select name="memorySelect[]" id="memorySelect">
                                                    <option value="">Select</option>
                                                    <!-- Add memory options here -->
                                                </select>
                                                <button class="btn btn-secondary clone-button btn-sm" type="button" id="memorySelectButton">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Material</td>
                                        <td>
                                            <div class="select-with-button">
                                                <select name="materialSelect[]" id="materialSelect">
                                                    <option value="">Select</option>
                                                    <!-- Add material options here -->
                                                </select>
                                                <button class="btn btn-secondary clone-button btn-sm" type="button" id="materialSelectButton">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Type</td>
                                        <td>
                                            <div class="select-with-button">
                                                <select name="typeSelect[]" id="typeSelect">
                                                    <option value="">Select</option>
                                                    <!-- Add type options here -->
                                                </select>
                                                <button class="btn btn-secondary clone-button btn-sm" type="button" id="typeSelectButton">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Weight</td>
                                        <td>
                                            <div class="select-with-button">
                                                <select name="weightSelect[]" id="weightSelect">
                                                    <option value="">Select</option>
                                                    <!-- Add weight options here -->
                                                </select>
                                                <button class="btn btn-secondary clone-button btn-sm" type="button" id="weightSelectButton">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Generation</td>
                                        <td>
                                            <div class="select-with-button">
                                                <select name="GenerationSelect[]" id="generationSelect">
                                                    <option value="">Select</option>
                                                    <!-- Add generation options here -->
                                                </select>
                                                <button class="btn btn-secondary clone-button btn-sm" id="generationSelectButton">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td>
                            <button class="btn btn-success clone-button btn-sm" type="button" onclick="clonevariantRow(this)">
                                <i class="fas fa-plus"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="deleteimageRow(this)">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="cloneRow(this)">
                                <i class="fas fa-pen"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="selected_subcategory_id" id="selectedSubcategoryID">
            <input type="hidden" name="selected_subcategory_name" id="selectedSubcategoryname" value="">
        </div>
















        <div class="container">
            <div class="product-information">
                <div class="row">
                    <div class="specification">
                        <p for="description">Description:</p>
                        <textarea name="description" rows="8" cols="max" required></textarea>
                        <br>
                        <br>
                    </div>

                    <div class="Checks">
                        <p for="">Quality Checks:</p>


                        <div id="inputContainer">
                            <!-- Initial input field -->
                            <div class="input-field">
                                <label for="itemInput">Enter :</label>
                                <input type="text" class="itemInput" name="itemInput[]" style="width: 300px;">
                                <button class="btn btn-sm btn-danger removeInput" type="button"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-success" type="button" id="addInput"><i class="fas fa-plus"></i></button>


                    </div>




                    <div class="warranty-information">


                        <p for="Warranty-info">Warranty info:</p>
                        <textarea name="Warranty-info" rows="8" cols="max" required></textarea>
                    </div>

                    <div class="Shipping-info">


                        <p for="Shipping-info">Shipping-info:</p>
                        <textarea name="Shipping-info" rows="8" cols="max" required></textarea>
                    </div>
                    <div class="Seller-Manufacturer-info">


                        <p for="Seller-Manufacturer-info">Seller/Manufacturer-info:</p>
                        <textarea name="Seller/Manufacturer-info" rows="8" cols="max" required></textarea>
                    </div>
                    <div class="Return-Policy">


                        <p for="Return-Policy">Return-Policy:</p>
                        <textarea name="Return-Policy" rows="8" cols="max" required></textarea>
                    </div>
                </div>
            </div>
        </div>






        <div class="container mt-5">

            <button class="btn btn-sm btn-success" name="add_variant" value="Submit" type="submit" form="addvariant">Add product</button>
            <button class="btn btn-sm btn-success" name="cancel" value="Submit" type="button" onclick="destroySession()">Cancel</button>

        </div>

    </form>



    <script>
        function destroySession() {
            // Send an AJAX request to a PHP script to destroy the session
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'sessiondestroy.php', true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Session destroyed successfully

                }
            };
            xhr.send();
        }
    </script>











    <script src="admin.js"></script>

































</body>

</html>