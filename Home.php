<?php 


include_once "connectconfig.php";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute the query to retrieve the data
$sql = "SELECT * FROM products";
$result = $conn->query($sql);




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <!-- <meta http-equiv="refresh" content="30"> -->
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
    body {
        scroll-behavior: smooth;
        background: #f19328d3;
        background: linear-gradient(to bottom right, #f19328c2 0%, #cf421fb2 100%);
    }
    </style>

</head>

<body>
    <?php

    include_once 'header.php'
    
    ?>



    <main>
        <h1>0 Items</h1>
        <hr>

        <div class="row">

            <div class="card ">
                <div class="card-header d-flex justify-content-between flex-wrap">
                    <div class="header-title">
                        <h5 class="card-title">5% - off</h5>
                    </div>
                    <div class="d-flex align-items-center align-self-center">
                        <div class="d-flex align-items-center text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                                <g>
                                    <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                </g>
                            </svg>
                            <div class="ms-1">
                                <span class="text-secondary"><a href="">view more</a></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="container-xl ">
                        <div class="row">
                            <div class="row m-0 promo-card  products-container">
                            <?php 

if ($result) {
    // Fetch and display the data
    while ($row = mysqli_fetch_assoc($result)) {
?>

                                <div class="card">

                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col text-left">
                                                <p>Top Sellers</p>
                                            </div>
                                            <div class="col text-right">
                                                <span class="wish-icon"><i
                                                        class="fas fa-2x fa-heart-circle-plus"></i></i></span>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="card-img-top text-center d-flex align-items-center"><img
                                            src="<?php echo $row["product_image"] ?>" class="mx-auto" alt="...">
                                    </div>
                                    <div class="card-body  p-0">
                                        <h5 class="card-title mb-0"><?php echo $row["product_name"] ?></h5><span
                                            class="item-tag">mobile
                                            phones</span>
                                        <p class="card-text">
                                        <div class="star-rating">
                                            <P class="text-muted">
                                                <?php echo $row["description"] ?>
                                            </P>
                                            <ul class="list-inline m-0">
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                                <li class="list-inline-item"><span><a href="" class="mb-0"><small>55
                                                                reviews</small></a></span></li>
                                            </ul>

                                        </div>
                                        </p>
                                        <p class="item-price"><s>₵400.00</s>&nbsp;
                                            <b><sup>₵</sup><?php echo $row["price"] ?></b> <em
                                                class="badge bg-gray">save ₵20</em>
                                        </p>


                                        <div class="row align-items-center">

                                            <div class="col align-items-center">
                                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex col-sm-3">
                                                    <button class="btn btn-link px-2"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                    <input id="form1" min="0" name="quantity" value="1" type="number"
                                                        class="form-control form-control-sm p-1" />

                                                    <button class="btn btn-link px-2"
                                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="col text-center  add2cart cartIcons "><span 
                                           class="cart-icon add"> <i
                                           data-id="<?php echo $row["product_id"]; ?>" class="fas fa-2x fa-cart-plus"></i></span>
                                            </div>
                                        </div>
                                        <div class=" col inyourcart text-center bg-body-tertiary"><small
                                                class=" text-muted" style=" font-size: x-small;"></small></div>

                                    </div>
                                </div>


                                <?php }
                                } else {
                                    echo "Query failed: " . mysqli_error($conn);
                                } ?>

                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>


        </div>


    </main>

    <script>
      



// This code waits for the HTML document to be fully loaded and parsed
document.addEventListener('DOMContentLoaded', function() {

// Select all elements in the document with the "add" class
var ProductID = document.getElementsByClassName("add");

// Loop through each element with the "add" class
for (var i = 0; i < ProductID.length; i++) {

    // Add a click event listener to each "add" element
    ProductID[i].addEventListener('click', function(event) {

        // Inside the click event handler function

        // Get the element that triggered the click event (the "add" element)
       var   target = event.target;

        // Get the value of the "data-id" attribute from the clicked element
        var id = target.getAttribute("data-id");
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function(){
    if (this.readyState == 4 && this.status == 200){
        var data = JSON.parse(this.responseText);
        var findgrandparent = target.parentElement.parentElement.parentElement.parentElement;
       var grandparent = findgrandparent.querySelector(".inyourcart  small");
        grandparent.innerHTML = data.in_cart;//output the message to the target inner html 
        document.getElementById("cart-count").innerHTML = data.num_cart +1;
    
    }
}


     xml.open("GET","connectconfig.php?id="+id,true);
     xml.send();

     

    });
}

// Any additional JavaScript code can go here

}); // End of the DOMContentLoaded event listener





    </script>



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
                    <svg class="icon-15" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
    $(document).ready(function() {
        $(".wish-icon i").click(function(e) {
            e.preventDefault(); // Prevent the anchor link from being followed

            const $heartIcon = $(this);

            if ($heartIcon.hasClass("fa-heart-circle-plus")) {
                $heartIcon.removeClass("fa-heart-circle-plus").addClass("fa-heart-circle-check")
                    .css(
                        "color", "green");
                showTempAlert($heartIcon, "Added to wishlist", 3000,
                    ""); // Display the alert for 3 seconds (3000 milliseconds) near the heart icon
            } else {

                $heartIcon.removeClass("fa-heart-circle-check").addClass("fa-heart-circle-plus")
                    .css(
                        "color", "#ff6721"); // Reset color to default
                hideTempAlert();
                // showTempAlert($heartIcon,"Removed from wishlist", 3000,"#FCB8B6");// Remove the alert if it's already displayed
            }
        });

        function showTempAlert($targetElement, message, duration, backgroundColor) {
            const $alert = $("<div>").addClass("alert alert-info").text(message);
            $alert.css({
                position: "absolute",
                backgroundColor: backgroundColor,
                top: "0",

                left: "50%",


            })

            $alert.attr("id", "temp-alert"); // Add an ID to the alert for easy removal
            $targetElement.parent().append($alert); // Append the alert near the heart icon

            setTimeout(function() {
                hideTempAlert(); // Remove the alert after the specified duration
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
            e.preventDefault(); // Prevent the anchor link from being followed

            const $cartIcon = $(this);

            if ($cartIcon.hasClass("fa-cart-plus")) {
                $cartIcon.removeClass("fa-cart-plus").addClass("fa-check");
                onloadcartnumbers();

            } else {

                $cartIcon.removeClass("fa-check").addClass(
                    "fa-cart-plus"); // Reset color to default

            }
        })
    });
    </script>






    <!-- Wrapper End-->
    <!-- offcanvas start -->

   

</body>

</html>