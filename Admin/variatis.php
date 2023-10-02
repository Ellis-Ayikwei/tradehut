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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


        <style>

 textarea{
   
}
        </style>

    </head>

    <body>
    <form action="" method="POST" enctype="multipart/form-data">
          

         

          

           

                <label for="categorySelect">Category:</label>
                <select name="category_id" id="categorySelect" required>
                    <option value="">Select a category</option>
                    <!-- Categories will be populated dynamically -->
                </select> <button class="btn btn-success  btn-sm" id="openModalButton2">
            <i class="fas fa-plus"></i>
        </button>

                <br>

                <label for="subcategorySelect">Subcategory:</label>
                <select name="subcategory_id" id="subcategorySelect" required>
                    <option value="">Select a subcategory</option>
                    <!-- Subcategories will be populated dynamically based on the selected category -->
                </select> <button class="btn btn-success clone-button btn-sm" data-toggle="modal" id="openModalButton3" >

            <i class="fas fa-plus"></i>
        </button>
                <input type="hidden" name="selected_subcategory_id" id="selectedSubcategoryID">
                



                <br><br>
                <input type="hidden" name="selected_subcategory_name" id="selectedSubcategoryname">
                <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" required><br><br>
            <label for="keywords">keywords:</label>
            <input type="text" name="keywords" ><br><br>
               

            
            <label for="description">Description:</label>
            <textarea name="description" rows="4" cols="50" required></textarea>
<br>
<br>
            <label for="Image">Image:</label>


          <small>currently: <br></small>  <input type="file" name="main_product_image" accept="image/*"><br><br>
        
          
               

            <label for="brandSelect">Brand</label>
                <select name="brand_id" id="brandselect">
                    <option value="">Select a Brand</option>
                </select>
                <button class="btn btn-success clone-button btn-sm" data-toggle="modal" id="openModalButton1">
        <i class="fas fa-plus"></i>
    </button>


    

                <br>

             
                <input type="hidden" name="selected_subcategory_id" id="selectedSubcategoryID">
                



                <br><br>
                <input type="hidden" name="selected_subcategory_name" id="selectedSubcategoryname">
                <label for="product_name">Product Name:</label>
            <input type="text" name="product_name" required><br><br>
            <label for="keywords">keywords:</label>
            <input type="text" name="keywords" ><br><br>
               

            
            <label for="description">Description:</label>
            <textarea name="description" rows="4" cols="50" required></textarea>
<br>
<br>
            <label for="Image">Image:</label>


          <small>currently: <br></small>  <input type="file" name="main_product_image" accept="image/*"><br><br>
        
          
               

            <label for="brandSelect">Brand</label>
                <select name="brand_id" id="brandselect">
                    <option value="">Select a Brand</option>
                </select>
                <button class="btn btn-success clone-button btn-sm" data-toggle="modal" id="openModalButton1" >
        <i class="fas fa-plus"></i>
    </button>


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


                <br><br>
                <label for="price">Price:</label>
            <input type="text" name="price" required><br><br>
            <br><br>

                <label for="Amount">Amount:</label>
            <input type="number" name="Amount" required><br><br>
                
            <label for="MinAmount">MinAmount:</label>
            <input type="number" name="MinAmount" required><br><br>
                
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
                <button id="addAttributeButton">+</button> 
            </div>
                <!-- Add a "plus" button to add more dropdowns -->
            </form>


         
    
                <div class="container-fluid">
                    <h1 class="mb-4">Add images</h1>
                    <table class="table table-bordered mt-4">
                        <thead class="thead-dark">
                            <tr>
                                <th>Title</th>
                                <th>Image</th>
                                <th>ID</th>
                                <th>Image Preview</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr class="productadd">
                        <td>
                            <label for="name">Name:</label><br>
                            <input type="text" name="name" value=""><br><br>
                        </td>
                        <td>
                            <label for="image">Image URL:</label><br>
                            <input
                                class="btn btn-default md-btn-flat profile-image-input"
                                type="file"
                                name="profile-image"
                                id="profile-image-input-1"
                                accept="image/*"
                            />
                        </td>
                        <td>1</td>
                        <td>
                            <img
                                class="profile-preview"
                                src="default-profile.jpg"
                                alt="Profile Image"
                                width="100px"
                            />
                        </td>
                        <td>
                            <button class="btn btn-success clone-button btn-sm" onclick="cloneRow(this)">
                                <i class="fas fa-plus"></i>
                            </button>
                            <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                        </td>
                    </tr>
    
                                        </tbody>
                                    </table>
                                    <button type="submit">Save Images</button>
                                </div>
            


                                <div class="container-fluid">
                                    <table class="table table-bordered mt-4">
                                    <thead class="thead-dark">
                                                             <tr>
                                    <th>varinat_name</th>
                                    <th>sku</th>
                                    <th>Color</th>
                                    <th>Size</th>
                                    <th>speed</th>
                                    <th>memory</th>
                                    <th>material</th>
                                    <th>Image</th>
                                    <th>price</th>
                                    <th>min-b</th>
                                    <th>quantity</th>
                                    <th>Type</th>
                                    
                                                            </tr>
                                    
                                    
                                    
                                                        </thead>
                                                        <tbody>
                                    
                                                        <!-- Sample product data (you can dynamically add rows using a backend script) -->
                                    <tr class="variants">
                                        <td>
                                    <label for="name">Name:</label><br>
                                    <input type="input" name="price" value=""><br><br>
                                        </td>
                                         <td>
                                    <input type="text" value="" style="width:50px;">
                                        </td>

                                        <td>

                                    <select id="colorsSelect" value="" name="colorsSelect">
                                        <option value="">Select a color</option>
                                    </select>
                                    <button class="btn btn-success clone-button btn-sm" >
                                    <i class="fas fa-plus"></i>
                                    </button>
                                    
                                        </td>
                                    
                                    
                                        <td>
                                    <select name="sizeSelect" id="sizeSelect" style="width:50px;" value="">
                                        <option value="">Select</option>
                                    </select>
                                    <button class="btn btn-success clone-button btn-sm" >
                                    <i class="fas fa-plus"></i>
                                    </button>
                                        </td>
                                    <td>
                                    <select name="brand_id" id="speedSelect" style="width:50px;">
                                        <option value="">Select</option>
                                    </select>
                                    <button class="btn btn-success clone-button btn-sm" ">
                                                            <i class="fas fa-plus"></i>
                                                        </button>                </td>
                                    <td>
                                    <select name="brand_id" id="memorySelect" style="width:50px;">
                                        <option value="">Select</option>
                                    </select>
                                    <button class="btn btn-success clone-button btn-sm" >
                                                            <i class="fas fa-plus"></i>
                                    </button>
                                    </td>
                                    <td>
                                    <select name="materialSelect" id="materialSelect" style="width:50px;">
                                        <option value="">Select</option>
                                    </select>
                                    <button class="btn btn-success clone-button btn-sm" >
                                                            <i class="fas fa-plus"></i>
                                                        </button>                </td>
                                    <td>
                                    
                                        <img src="sample_image1.jpg" alt="Product 1" class="img-thumbnail" style="max-width: 100px;">
                                        </td>
                                    <td>
                                    <input type="number" value=""style="width: 50px;" >
                                    </td>
                                    </td>
                                    <td>
                                    <input type="number" value="" style="width: 50px;">
                                    
                                    </td>
                                    <td>
                                    <input type="number" value="" style="width: 50px;">
                                    </td>
                                    <td>
                                    <input type="number" value="" style="width: 50px;">
                                    </td>


                                                            <td>
                                    <button class="btn btn-success clone-button btn-sm" onclick="clonevariantRow(this)">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="deleteRow(this)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button class="btn btn-danger btn-sm" onclick="cloneRow(this)">
                                        <i class="fas fa-pen"></i>
                                    </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
                                    <p for="">Checks:</p>
                                    <h1>Enter Items</h1>
    
        <div id="inputContainer">
            <!-- Initial input field -->
            <div>
                <label for="itemInput">Enter items:</label>
                <input type="text" class="itemInput" name="itemInput[]" required>
                <button type="button" class="removeInput"><i class="fas fa-trash"></i></button>
            </div>
        </div>
        <button type="button" id="addInput"><i class="fas fa-plus"></i></button>
        <button type="submit">Save</button>


                                        <br>
                                        <br>
                                    </div>




                                    <div class="warranty-information">


                                    <p for="Warranty-info">Warranty info:</p>
                                         <textarea name="Warranty-info" rows="8" cols="max" required></textarea>
                                    </div>

                                    <div class="Shipping-info">


<p for="Shipping-info">Shipping-info:</p>
     <textarea name="Shipping-info" rows="8" cols="max" required></textarea>
</div>
<div class="Seller/Manufacturer-info">


<p for="Seller/Manufacturer-info">Seller/Manufacturer-info:</p>
     <textarea name="Seller/Manufacturer-info" rows="8" cols="max" required></textarea>
</div>
<div class="Seller/Manufacturer-info">


<p for="Return-Policy">Return-Policy:</p>
     <textarea name="Return-Policy" rows="8" cols="max" required></textarea>
</div>
                                 </div>
                            </div>
                           </div>     
                                
        

     

        <div class="container">
            <div class="editor"></div>
        </div>
    </form>


















<script src="admin.js"></script>

















            















    </body>

</html>