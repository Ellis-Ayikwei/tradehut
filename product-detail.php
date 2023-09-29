<?php 

include_once "connectconfig.php"


?>



<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
        <meta name="author" content="TradeHut">
        <meta property="TradeHut:title" content="TradeHut - Electronics Sales and Repair Services">
        <meta property="TradeHut:description"
            content="Find the latest gadgets and get expert repairs for your electronic devices at TradeHut.">
        <meta property="TradeHut:image" content="images/favico.png">


        <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Product",
            "name": "Smartphone Repair Service",
            "description": "Professional smartphone repair service at TradeHut.",
            "brand": {
                "@type": "Brand",
                "name": "TradeHut"
            },
            "offers": {
                "@type": "Offer",
                "price": "100.00",
                "priceCurrency": "Ghc",
                "availability": "https://schema.org/InStock"
            }
        }
        </script>




        <title>TradeHutGh</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favico.png" />

        <link rel="stylesheet" href="assets/css/style.css" />

        <!-- Library / Plugin Css Build -->
        <link rel="stylesheet" href="assets/css/core/libs.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />


        <!-- Aos Animation Css -->
        <link rel="stylesheet" href="assets/vendor/aos/dist/aos.css" />

        <!-- Hope Ui Design System Css -->
        <link rel="stylesheet" href="assets/css/hope-ui.min.css?v=2.0.0" />
        <link rel="stylesheet" href="assets/fontawesome/css/all.css" />
        <link rel="stylesheet" href="assets/fontawesome/webfonts/fa-solid-900.ttf" />

        <!-- Custom Css -->
        <link rel="stylesheet" href="assets/css/custom.min.css?v=2.0.0" />

        <!-- Dark Css -->
        <link rel="stylesheet" href="assets/css/dark.min.css" />

        <!-- Customizer Css -->
        <link rel="stylesheet" href="assets/css/customizer.min.css" />

        <!-- RTL Css -->
        <link rel="stylesheet" href="assets/css/rtl.min.css" />


        <style>
  


        .icon-hover:hover {
            border-color: #3b71ca !important;
            background-color: white !important;
            color: #3b71ca !important;
        }

        .icon-hover:hover i {
            color: #3b71ca !important;
        }
        </style>

    </head>

    <body>











        <!-- content -->
        <?php
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Prepare and execute a query to fetch product details
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the data from the result
        $row = $result->fetch_assoc();

        // Now you can access the product details
        $product_id = $row['product_id'];
        $product_name = $row['product_name'];
        $price = $row['price'];
        $description = $row['description'];
        $Main_product_image = $row['Main_product_image'];
        //s$Sub_category_name = $row['Sub_category_name'];

        // Display product details as needed
        echo "<script>alert('$product_id')</script>";
    } else {
        echo "Product not found.";
    }
} else {
    echo "Product ID not provided.";
}
?>




        <div class="productbody">
            <section class="py-5">
                <div class="container">
                    <div class="row gx-5">
                        <aside class="col-lg-6">
                            <div class="border rounded-4 mb-3 d-flex justify-content-center">
                                <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="<?php ?>">
                                    <img style="max-width: 100%; max-height: 60vh; margin: auto;" class="rounded-4 fit"
                                        src="admin/<?php  echo $Main_product_image?>">
                                </a>
                            </div>
                            <div class="d-flex justify-content-center mb-3">
                                <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank"
                                    data-type="image"
                                    href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big1.webp"
                                    class="item-thumb">
                                    <img width="60" height="60" class="rounded-2"
                                        src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big1.webp" />
                                </a>
                                <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank"
                                    data-type="image"
                                    href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big2.webp"
                                    class="item-thumb">
                                    <img width="60" height="60" class="rounded-2"
                                        src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big2.webp" />
                                </a>
                                <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank"
                                    data-type="image"
                                    href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big3.webp"
                                    class="item-thumb">
                                    <img width="60" height="60" class="rounded-2"
                                        src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big3.webp" />
                                </a>
                                <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank"
                                    data-type="image"
                                    href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big4.webp"
                                    class="item-thumb">
                                    <img width="60" height="60" class="rounded-2"
                                        src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big4.webp" />
                                </a>
                                <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank"
                                    data-type="image"
                                    href="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp"
                                    class="item-thumb">
                                    <img width="60" height="60" class="rounded-2"
                                        src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/detail1/big.webp" />
                                </a>
                            </div>

                            <!-- thumbs-wrap.// -->
                            <!-- gallery-wrap .end// -->
                        </aside>
                        <main class="col-lg-6">
                            <div class="ps-lg-3 p-0">
                                <h4 class="title text-dark">
                                    Quality Men's Hoodie for Winter, Men's Fashion <br />
                                    <?php echo  $product_name ?>
                                </h4>
                                <div class="d-flex flex-row my-3">
                                    <div class="text-warning mb-1 me-2">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span class="ms-1">
                                            4.5
                                        </span>
                                    </div>
                                    <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154
                                        orders</span>

                                </div>
                                <span class="text-success ms-2">In stock</span>
                                
                                <div class="mb-3">
                                    <span class="h5"> GH<?php echo  $price ?>
</span>
                                    <span class="text-muted"></span>
                                </div>

                                <p>
                                <?php echo  $description ?>

                                </p>

                                <div class="row">
                                    <dt class="col-3">Type:</dt>
                                    <dd class="col-9">Regular</dd>

                                    <dt class="col-3">Color</dt>
                                    <dd class="col-9">Brown</dd>

                                    <dt class="col-3">Material</dt>
                                    <dd class="col-9">Cotton, Jeans</dd>

                                    <dt class="col-3">Brand</dt>
                                    <dd class="col-9">Reebook</dd>
                                </div>

                                <hr />

                                <div class="row mb-4">
                                    <div class="col-md-4 col-6">
                                        <label class="mb-2">Size</label>
                                        <select class="form-select border border-secondary" style="height: 35px;">
                                            <option>Small</option>
                                            <option>Medium</option>
                                            <option>Large</option>
                                        </select>
                                    </div>



                                    <!-- col.// -->
                                    <div class="col-md-4 col-6 mb-3">
    <label class="mb-2 d-block">Quantity</label>
    <div class="input-group mb-3" style="width: 170px;">
        <button class="btn btn-white border border-secondary px-3" type="button"
            id="decrementButton" data-mdb-ripple-color="dark" onclick="decrementQuantity()">
            <i class="fas fa-minus"></i>
        </button>
        <input id="quantityInput" min="0" name="quantity" value="1" type="number" class="form-control text-center border border-secondary form-control form-control-sm p-1"
            aria-label="Example text with button addon"
            aria-describedby="button-addon1" />
        <button class="btn btn-white border border-secondary px-3" type="button"
            id="incrementButton" data-mdb-ripple-color="dark" onclick="incrementQuantity()">
            <i class="fas fa-plus"></i>
        </button>
    </div>
</div>

<form action="manage_cart.php" method="POST" class="d-flex">
    <!-- Hidden input fields to store product information -->
    <input type="hidden" name="Item_Name" value="<?php echo $product_name ?>">
    <input type="hidden" name="Price" value="<?php echo $price ?>">
    <input type="hidden" name="image" value="admin/<?php echo $Main_product_image ?>">
    <input type="hidden" name="description" value="<?php echo $description ?>">
    <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
    <input type="hidden" id="hiddenQuantity" name="quantity" value="1">
    
    <a href="#" class="btn btn-warning shadow-0">Buy now</a>
    <button type="submit" name="Add_To_Cart" class="btn btn-primary shadow-0 ms-3">
        <i class="me-1 fa fa-shopping-basket"></i> Add to Cart
    </button>
    <button type="submit" name="Add_To_Cart" class="btn btn-primary shadow-0 ms-3">
        <i class="me-1 fa fa-heart fa-lg"></i> Add to Cart
        
    </button>
</form>

<script>
    function incrementQuantity() {
        const quantityInput = document.getElementById("quantityInput");
        const hiddenQuantity = document.getElementById("hiddenQuantity");
        quantityInput.stepUp();
        hiddenQuantity.value = quantityInput.value;
    }

    function decrementQuantity() {
        const quantityInput = document.getElementById("quantityInput");
        const hiddenQuantity = document.getElementById("hiddenQuantity");
        quantityInput.stepDown();
        hiddenQuantity.value = quantityInput.value;
    }
</script>

                        </main>
                    </div>
                </div>
            </section>
            <!-- content -->

            <section class="bg-light border-top py-4 ">
                <div class="container">
                    <div class="row gx-4">
                        <div class="col-lg-8 mb-4">
                            <div class="border rounded-2 px-3 py-2 bg-white">
                                <!-- Pills navs -->
                                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                    <li class="nav-item d-flex" role="presentation">
                                        <a class="nav-link d-flex align-items-center justify-content-center w-100 active"
                                            id="Specification-tab" data-bs-toggle="pill" href="#Specification"
                                            role="tab" aria-controls="ex1-pills-1"
                                            aria-selected="true">Specification</a>
                                    </li>
                                    <li class="nav-item d-flex" role="presentation">
                                        <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                            id="Warranty-info-tab" data-bs-toggle="pill" href="#Warranty-info"
                                            role="tab" aria-controls="ex1-pills-2" aria-selected="false">Warranty
                                            info</a>
                                    </li>
                                    <li class="nav-item d-flex" role="presentation">
                                        <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                            id="Shipping-info-tab" data-bs-toggle="pill" href="#Shipping-info"
                                            role="tab" aria-controls="ex1-pills-3" aria-selected="false">Shipping
                                            info</a>
                                    </li>
                                    <li class="nav-item d-flex" role="presentation">
                                        <a class="nav-link d-flex align-items-center justify-content-center w-100"
                                            id="Seller-profile-tab" data-bs-toggle="pill" href="#Seller-profile"
                                            role="tab" aria-controls="ex1-pills-4" aria-selected="false">Seller
                                            profile</a>
                                    </li>
                                </ul>
                                <!-- Pills navs -->

                                <!-- Pills content -->
                                <div class="tab-content" id="ex1-content">
                                    <div class="tab-pane fade show active" id="Specification" role="tabpanel"
                                        aria-labelledby="Specification-tab">
                                        <p>
                                            With supporting text below as a natural lead-in to additional content. Lorem
                                            ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua. Ut
                                            enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                            aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                            voluptate velit esse cillum dolore eu fugiat nulla
                                            pariatur.
                                        </p>
                                        <div class="row mb-2">
                                            <div class="col-12 col-md-6">
                                                <ul class="list-unstyled mb-0">
                                                    <li><i class="fas fa-check text-success me-2"></i>Some great feature
                                                        name here</li>
                                                    <li><i class="fas fa-check text-success me-2"></i>Lorem ipsum dolor
                                                        sit amet, consectetur</li>
                                                    <li><i class="fas fa-check text-success me-2"></i>Duis aute irure
                                                        dolor in reprehenderit</li>
                                                    <li><i class="fas fa-check text-success me-2"></i>Optical heart
                                                        sensor</li>
                                                </ul>
                                            </div>
                                            <div class="col-12 col-md-6 mb-0">
                                                <ul class="list-unstyled">
                                                    <li><i class="fas fa-check text-success me-2"></i>Easy fast and ver
                                                        good</li>
                                                    <li><i class="fas fa-check text-success me-2"></i>Some great feature
                                                        name here</li>
                                                    <li><i class="fas fa-check text-success me-2"></i>Modern style and
                                                        design</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <table class="table border mt-3 mb-2">
                                            <tr class="d-flex p-0">
                                                <th class="">Display:</th>
                                                <td class="">13.3-inch LED-backlit display with IPS</td>
                                            </tr>
                                            <tr class="d-flex">
                                                <th class="">Processor capacity:</th>
                                                <td class="">2.3GHz dual-core Intel Core i5</td>
                                            </tr ">
                          <tr class=" d-flex">
                                            <th class="">Camera quality:</th>
                                            <td class="">720p FaceTime HD camera</td>
                                            </tr>
                                            <tr class="d-flex">
                                                <th class="">Memory</th>
                                                <td class="">8 GB RAM or 16 GB RAM</td>
                                            </tr>
                                            <tr class="d-flex">
                                                <th class="">Graphics</th>
                                                <td class="">Intel Iris Plus Graphics 640</td>
                                            </tr>
                                        </table>

                                    </div>
                                    <div class="tab-pane fade mb-2" id="Warranty-info" role="tabpanel"
                                        aria-labelledby="Warranty-info-tab">
                                        Tab content or sample information now <br />
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut
                                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                                        occaecat cupidatat non proident, sunt in culpa qui
                                        officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet,
                                        consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                                        dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    </div>
                                    <div class="tab-pane fade mb-2" id="Shipping-info" role="tabpanel"
                                        aria-labelledby="Shipping-info-tab">
                                        Another tab content or sample information now <br />
                                        Dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                        ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                        non proident, sunt in culpa qui officia deserunt
                                        mollit anim id est laborum.
                                    </div>
                                    <div class="tab-pane fade mb-2" id="Seller-profile" role="tabpanel"
                                        aria-labelledby="Seller-profile-tab">
                                        Some other tab content or sample information now <br />
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut
                                        aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                                        occaecat cupidatat non proident, sunt in culpa qui
                                        officia deserunt mollit anim id est laborum.
                                    </div>
                                </div>
                                <!-- Pills content -->
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="px-0 border rounded-2 shadow-0">
                                <div class="card Similar-items">
                                    <div class="card-body">
                                        <h5 class="card-title">Similar items</h5>
                                        <div class="d-flex mb-3">
                                            <a href="#" class="me-3">
                                                <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/8.webp"
                                                    style="min-width: 96px; height: 96px;"
                                                    class="img-md img-thumbnail" />
                                            </a>
                                            <div class="info">
                                                <a href="#" class="nav-link mb-1">
                                                    Rucksack Backpack Large <br />
                                                    Line Mounts
                                                </a>
                                                <strong class="text-dark"> $38.90</strong>
                                            </div>
                                        </div>

                                        <div class="d-flex mb-3">
                                            <a href="#" class="me-3">
                                                <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/9.webp"
                                                    style="min-width: 96px; height: 96px;"
                                                    class="img-md img-thumbnail" />
                                            </a>
                                            <div class="info">
                                                <a href="#" class="nav-link mb-1">
                                                    Summer New Men's Denim <br />
                                                    Jeans Shorts
                                                </a>
                                                <strong class="text-dark"> ₵29.50</strong>
                                            </div>
                                        </div>

                                        <div class="d-flex mb-3">
                                            <a href="#" class="me-3">
                                                <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/10.webp"
                                                    style="min-width: 96px; height: 96px;"
                                                    class="img-md img-thumbnail" />
                                            </a>
                                            <div class="info">
                                                <a href="#" class="nav-link mb-1"> T-shirts with multiple colors, for
                                                    men and lady </a>
                                                <strong class="text-dark"> ₵120.00</strong>
                                            </div>
                                        </div>

                                        <div class="d-flex mb-3">
                                            <a href="#" class="me-3">
                                                <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/10.webp"
                                                    style="min-width: 96px; height: 96px;"
                                                    class="img-md img-thumbnail" />
                                            </a>
                                            <div class="info">
                                                <a href="#" class="nav-link mb-1"> T-shirts with multiple colors, for
                                                    men and lady </a>
                                                <strong class="text-dark"> ₵120.00</strong>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <a href="#" class="me-3">
                                                <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/10.webp"
                                                    style="min-width: 96px; height: 96px;"
                                                    class="img-md img-thumbnail" />
                                            </a>
                                            <div class="info">
                                                <a href="#" class="nav-link mb-1"> T-shirts with multiple colors, for
                                                    men and lady </a>
                                                <strong class="text-dark"> ₵120.00</strong>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <a href="#" class="me-3">
                                                <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/10.webp"
                                                    style="min-width: 96px; height: 96px;"
                                                    class="img-md img-thumbnail" />
                                            </a>
                                            <div class="info">
                                                <a href="#" class="nav-link mb-1"> T-shirts with multiple colors, for
                                                    men and lady </a>
                                                <strong class="text-dark"> ₵120.00</strong>
                                            </div>
                                        </div>

                                        <div class="d-flex mb-3">
                                            <a href="#" class="me-3">
                                                <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/11.webp"
                                                    style="min-width: 96px; height: 96px;"
                                                    class="img-md img-thumbnail" />
                                            </a>
                                            <div class="info">
                                                <a href="#" class="nav-link mb-1"> Blazer Suit Dress Jacket for Men,
                                                    Blue color </a>
                                                <strong class="text-dark"> ₵339.90</strong>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>




        <!-- Footer -->
        <footer class=" text-center text-lg-start text-muted bg-primary mt-3">
                                    <!-- Section: Links  -->
                                    <section class="">
                                        <div class="container text-center text-md-start pt-4 pb-4">
                                            <!-- Grid row -->
                                            <div class="row mt-3">
                                                <!-- Grid column -->
                                                <div class="col-12 col-lg-3 col-sm-12 mb-2">
                                                    <!-- Content -->
                                                    <a href="https://mdbootstrap.com/" target="_blank"
                                                        class="text-white h2">
                                                        MDB
                                                    </a>
                                                    <p class="mt-1 text-white">
                                                        © 2023 Copyright: MDBootstrap.com
                                                    </p>
                                                </div>
                                                <!-- Grid column -->

                                                <!-- Grid column -->
                                                <div class="col-6 col-sm-4 col-lg-2">
                                                    <!-- Links -->
                                                    <h6 class="text-uppercase text-white fw-bold mb-2">
                                                        Store
                                                    </h6>
                                                    <ul class="list-unstyled mb-4">
                                                        <li><a class="text-white-50" href="#">About us</a></li>
                                                        <li><a class="text-white-50" href="#">Find store</a></li>
                                                        <li><a class="text-white-50" href="#">Categories</a></li>
                                                        <li><a class="text-white-50" href="#">Blogs</a></li>
                                                    </ul>
                                                </div>
                                                <!-- Grid column -->

                                                <!-- Grid column -->
                                                <div class="col-6 col-sm-4 col-lg-2">
                                                    <!-- Links -->
                                                    <h6 class="text-uppercase text-white fw-bold mb-2">
                                                        Information
                                                    </h6>
                                                    <ul class="list-unstyled mb-4">
                                                        <li><a class="text-white-50" href="#">Help center</a></li>
                                                        <li><a class="text-white-50" href="#">Money refund</a></li>
                                                        <li><a class="text-white-50" href="#">Shipping info</a></li>
                                                        <li><a class="text-white-50" href="#">Refunds</a></li>
                                                    </ul>
                                                </div>
                                                <!-- Grid column -->

                                                <!-- Grid column -->
                                                <div class="col-6 col-sm-4 col-lg-2">
                                                    <!-- Links -->
                                                    <h6 class="text-uppercase text-white fw-bold mb-2">
                                                        Support
                                                    </h6>
                                                    <ul class="list-unstyled mb-4">
                                                        <li><a class="text-white-50" href="#">Help center</a></li>
                                                        <li><a class="text-white-50" href="#">Documents</a></li>
                                                        <li><a class="text-white-50" href="#">Account restore</a></li>
                                                        <li><a class="text-white-50" href="#">My orders</a></li>
                                                    </ul>
                                                </div>
                                                <!-- Grid column -->

                                                <!-- Grid column -->
                                                <div class="col-12 col-sm-12 col-lg-3">
                                                    <!-- Links -->
                                                    <h6 class="text-uppercase text-white fw-bold mb-2">Newsletter</h6>
                                                    <p class="text-white">Stay in touch with latest updates about our
                                                        products and offers</p>
                                                    <div class="input-group mb-3">
                                                        <input type="email" class="form-control border"
                                                            placeholder="Email" aria-label="Email"
                                                            aria-describedby="button-addon2" />
                                                        <button class="btn btn-light border shadow-0" type="button"
                                                            id="button-addon2" data-mdb-ripple-color="dark">
                                                            Join
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- Grid column -->
                                            </div>
                                            <!-- Grid row -->
                                        </div>
                                    </section>
                                    <!-- Section: Links  -->

                                    <div class="">
                                        <div class="container">
                                            <div class="d-flex justify-content-between py-4 border-top">
                                                <!--- payment --->
                                                <div>
                                                    <i class="fab fa-lg fa-cc-visa text-white"></i>
                                                    <i class="fab fa-lg fa-cc-amex text-white"></i>
                                                    <i class="fab fa-lg fa-cc-mastercard text-white"></i>
                                                    <i class="fab fa-lg fa-cc-paypal text-white"></i>
                                                </div>
                                                <!--- payment --->

                                                <!--- language selector --->
                                                <div class="dropdown dropup">
                                                    <a class="dropdown-toggle text-white" href="#" id="Dropdown"
                                                        role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                                                        <i class="flag-united-kingdom flag m-0 me-1"></i>English </a>

                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="Dropdown">
                                                        <li>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="flag-united-kingdom flag"></i>English <i
                                                                    class="fa fa-check text-success ms-2"></i></a>
                                                        </li>
                                                        <li>
                                                            <hr class="dropdown-divider" />
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="flag-poland flag"></i>Polski</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="flag-china flag"></i>中文</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="flag-japan flag"></i>日本語</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="flag-germany flag"></i>Deutsch</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="flag-france flag"></i>Français</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="flag-spain flag"></i>Español</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="flag-russia flag"></i>Русский</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="#"><i
                                                                    class="flag-portugal flag"></i>Português</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!--- language selector --->
                                            </div>
                                        </div>
                                    </div>
                                    </footer>
                                    <!-- Footer -->





                                    <!-- Footer Section Start -->
                                    <footer class="footer">
                                        <div class="footer-body">
                                            <ul class="left-panel list-inline mb-0 p-0">
                                                <li class="list-inline-item">
                                                    <a href="dashboard/extra/privacy-policy.html">Privacy Policy</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="dashboard/extra/terms-of-service.html">Terms of Use</a>
                                                </li>
                                            </ul>
                                            <div class="right-panel">
                                                ©
                                                <script>
                                                document.write(new Date().getFullYear());
                                                </script>
                                                Hope UI, Made with
                                                <span class="">
                                                    <svg class="icon-15" width="15" viewBox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M15.85 2.50065C16.481 2.50065 17.111 2.58965 17.71 2.79065C21.401 3.99065 22.731 8.04065 21.62 11.5806C20.99 13.3896 19.96 15.0406 18.611 16.3896C16.68 18.2596 14.561 19.9196 12.28 21.3496L12.03 21.5006L11.77 21.3396C9.48102 19.9196 7.35002 18.2596 5.40102 16.3796C4.06102 15.0306 3.03002 13.3896 2.39002 11.5806C1.26002 8.04065 2.59002 3.99065 6.32102 2.76965C6.61102 2.66965 6.91002 2.59965 7.21002 2.56065H7.33002C7.61102 2.51965 7.89002 2.50065 8.17002 2.50065H8.28002C8.91002 2.51965 9.52002 2.62965 10.111 2.83065H10.17C10.21 2.84965 10.24 2.87065 10.26 2.88965C10.481 2.96065 10.69 3.04065 10.89 3.15065L11.27 3.32065C11.3618 3.36962 11.4649 3.44445 11.554 3.50912C11.6104 3.55009 11.6612 3.58699 11.7 3.61065C11.7163 3.62028 11.7329 3.62996 11.7496 3.63972C11.8354 3.68977 11.9247 3.74191 12 3.79965C13.111 2.95065 14.46 2.49065 15.85 2.50065ZM18.51 9.70065C18.92 9.68965 19.27 9.36065 19.3 8.93965V8.82065C19.33 7.41965 18.481 6.15065 17.19 5.66065C16.78 5.51965 16.33 5.74065 16.18 6.16065C16.04 6.58065 16.26 7.04065 16.68 7.18965C17.321 7.42965 17.75 8.06065 17.75 8.75965V8.79065C17.731 9.01965 17.8 9.24065 17.94 9.41065C18.08 9.58065 18.29 9.67965 18.51 9.70065Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                by <a href="https://iqonic.design/">IQONIC Design</a>.
                                            </div>
                                        </div>
                                    </footer>
                                    <!-- Footer Section End -->
                                    </main>
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                    <script>
                                    function openNav() {
                                        document.getElementById("mySidepanel").style.width = "400px";
                                        document.getElementById("mySidepanel").style.display = "block";

                                    }

                                    /* Set the width of the sidebar to 0 (hide it) */
                                    function closeNav() {
                                        document.getElementById("mySidepanel").style.width = "0";
                                        document.getElementById("mySidepanel").style.display = "none";

                                    }
                                    </script>


                                    <script>
                                    function openModal() {
                                        loadModal();
                                    }
                                    </script>



                                    <script>
                                    $(document).ready(function() {
                                        $(".wish-icon i").click(function(e) {
                                            e
                                        .preventDefault(); // Prevent the anchor link from being followed

                                            const $heartIcon = $(this);

                                            if ($heartIcon.hasClass("fa-heart-circle-plus")) {
                                                $heartIcon.removeClass("fa-heart-circle-plus").addClass(
                                                        "fa-heart-circle-check")
                                                    .css("color", "green");
                                                showTempAlert($heartIcon, "Added to wishlist", 3000,
                                                    ""
                                                    ); // Display the alert for 3 seconds (3000 milliseconds) near the heart icon
                                            } else {

                                                $heartIcon.removeClass("fa-heart-circle-check")
                                                    .addClass("fa-heart-circle-plus")
                                                    .css("color", "#ff6721"); // Reset color to default
                                                hideTempAlert();
                                                // showTempAlert($heartIcon,"Removed from wishlist", 3000,"#FCB8B6");// Remove the alert if it's already displayed
                                            }
                                        });

                                        function showTempAlert($targetElement, message, duration,
                                            backgroundColor) {
                                            const $alert = $("<div>").addClass("alert alert-info").text(
                                            message);
                                            $alert.css({
                                                position: "absolute",
                                                backgroundColor: backgroundColor,
                                                top: "0",

                                                left: "50%",


                                            })

                                            $alert.attr("id",
                                            "temp-alert"); // Add an ID to the alert for easy removal
                                            $targetElement.parent().append(
                                            $alert); // Append the alert near the heart icon

                                            setTimeout(function() {
                                                hideTempAlert
                                            (); // Remove the alert after the specified duration
                                            }, duration);
                                        }

                                        function hideTempAlert() {
                                            $("#temp-alert").remove(); // Remove the alert with the specified ID
                                        }
                                    });
                                    </script>

                                    <script>
                                    $(document).ready(function() {
                                        $(".cart-icon i").click(function(e) {
                                            e
                                        .preventDefault(); // Prevent the anchor link from being followed

                                            const $cartIcon = $(this);

                                            if ($cartIcon.hasClass("fa-cart-plus")) {
                                                $cartIcon.removeClass("fa-cart-plus").addClass(
                                                    "fa-check");
                                                onloadcartnumbers();

                                            } else {

                                                $cartIcon.removeClass("fa-check").addClass(
                                                    "fa-cart-plus"); // Reset color to default

                                            }
                                        })
                                    });
                                    </script>





                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
                                    </script>
                                    <script>
                                    $(".cart").on("click", function(e) {
                                        $("#cart-modal").find(".modal-content").load($(this).attr("linkFile"));
                                        $("#crat-modal").modal("show");
                                    });
                                    </script>

                                    <script src="carts.js">



                                    </script>

                                    <!-- Wrapper End-->
                                    <!-- offcanvas start -->

                                    <!-- Library Bundle Script -->
                                    <script src="assets/js/core/libs.min.js"></script>

                                    <!-- External Library Bundle Script -->
                                    <script src="assets/js/core/external.min.js"></script>

                                    <!-- Widgetchart Script -->
                                    <script src="assets/js/charts/widgetcharts.js"></script>

                                    <!-- mapchart Script -->
                                    <script src="assets/js/charts/vectore-chart.js"></script>
                                    <script src="assets/js/charts/dashboard.js"></script>

                                    <!-- fslightbox Script -->
                                    <script src="assets/js/plugins/fslightbox.js"></script>

                                    <!-- Settings Script -->
                                    <script src="assets/js/plugins/setting.js"></script>

                                    <!-- Slider-tab Script -->
                                    <script src="assets/js/plugins/slider-tabs.js"></script>
                                    <script src="assets/js/bootstrap.bundle.js"></script>
                                    <!-- Form Wizard Script -->
                                    <script src="assets/js/plugins/form-wizard.js"></script>

                                    <!-- AOS Animation Plugin-->
                                    <script src="assets/vendor/aos/dist/aos.js"></script>
                                    <script src="assets/js/bootstrap.bundle.js"></script>

                                    <!-- App Script -->
                                    <script src="assets/js/hope-ui.js" defer></script>
    </body>

</html>