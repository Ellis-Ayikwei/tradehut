<?php
require_once "con2.php";
require_once "addproducts.php";
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

</head>

<body>








    <style>
        /* Styles for the table container */
        .table-container {
            overflow-x: auto;
        }

        /* Base styles for the table */
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            font-size: 1rem;
            /* Base font size */
        }

        /* Style for table headers */
        .table thead th {
            background-color: #343a40;
            color: #fff;
            border: 1px solid rgba(0, 0, 0, 0.125);
            padding: 0.5rem;
            white-space: nowrap;
        }

        /* Style for table cells */
        .table tbody td {
            vertical-align: middle;
            border: 1px solid rgba(0, 0, 0, 0.125);
            padding: 0.5rem;
            white-space: nowrap;
        }

        /* Style for the "Image" column header with fixed width */
        .table thead th:nth-child(2) {
            width: 100px;
        }

        /* Style for text inputs */
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 0.375rem 0.75rem;
            margin-bottom: 0.5rem;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            font-size: 1rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        /* Style for buttons */
        .btn {
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            cursor: pointer;
        }

        /* Style for "Add" button */
        .clone-button {
            background-color: #28a745;
            color: #fff;
            border: none;
        }

        /* Style for "Delete" button */
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
            border: none;
        }

        /* Style for "Action" column */
        .table tbody td:last-child {
            text-align: center;
        }

        /* Responsive styles for smaller screens */
        @media (max-width: 768px) {

            /* Reduce font size for table headers and cells */
            .table thead th,
            .table tbody td {
                font-size: 0.875rem;
            }

            /* Remove fixed width for "Image" column */
            .table thead th:nth-child(2) {
                width: auto;
            }

            /* Center-align content in table cells */
            .table tbody td {
                text-align: center;
            }

            /* Make the table shrink */
            .table-container {
                overflow-x: auto;
            }
        }
    </style>

    <form action="addvariants.php" method="POST" enctype="multipart/form-data">
        <div class="mb-5">
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
                                                <button class="btn btn-secondary clone-button btn-sm" type="button" id="generationSelectButton">
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
            <button class="btn btn-success" type="submit" name="add_product">Save to continue</button>
        </div>
    </form>




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
























    <script src="admin.js"></script>

































</body>

</html>