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
    

        <div class="container">
            <div class="step1">


                <form action="addproducts.php" method="POST" enctype="multipart/form-data">

                    <label for="categorySelect">Category:</label>
                    <select name="category_id" id="categorySelect" required>
                        <option value="">Select a category</option>
                        <!-- Categories will be populated dynamically -->
                    </select> <button class="btn btn-secondary  btn-sm" id="add_category">
                        <i class="fas fa-plus"></i>
                    </button>

                    <label for="subcategorySelect">Subcategory:</label>
                    <select name="subcategory_id" id="subcategorySelect" required>
                        <option value="">Select a subcategory</option>
                        <!-- Subcategories will be populated dynamically based on the selected category -->
                    </select> <button class="btn btn-secondary clone-button btn-sm" data-toggle="modal" id="add_sub_category">
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
                    <small>currently: <br></small> <input type="file" name="main_product_image" accept="image/*" data-bs-toggle="tooltip" title="This image will be shown on the main product listing ">


                    <label for="brandSelect">Brand</label>
                    <select name="brand_id" id="brandselect" style="width:100px">
                        <option value="">Select a Brand</option>
                    </select>
                    <button class="btn btn-secondary clone-button btn-sm" data-toggle="modal" id="add_brand">
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
                    <input type="text" name="price" required>
                    <label for="Quantity">Quantity:</label>
                    <input type="number" name="quantity" required>

                    <label for="MinAmount">Minimum Buy Amount:</label>
                    <input type="number" name="min_amount" required>

                    <br><br>
                    <button class="btn btn-success" type="submit" name="add_product">Save to continue</button>
                </form>

            </div>
        </div>


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

        

   











       






   


















    <script src="admin.js"></script>

































</body>

</html>