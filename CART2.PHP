<?php 


session_start();


?>






<!DOCTYPE html>
<html lang='en'>

    <head>
        <meta charset='utf-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1.0, shrink-to-fit=no' />
        <!-- <meta http-equiv='refresh' content='30'> -->
        <meta name='author' content='TradeHut'>
        <meta property='TradeHut:title' content='TradeHut - Electronics Sales and Repair Services'>
        <meta property='TradeHut:description'
            content='Find the latest gadgets and get expert repairs for your electronic devices at TradeHut.'>
        <meta property='TradeHut:image' content='images/favico.png'>


        <script type='application/ld+json'>
        {
            '@context': 'http://schema.org',
            '@type': 'Product',
            'name': 'Smartphone Repair Service',
            'description': 'Professional smartphone repair service at TradeHut.',
            'brand': {
                '@type': 'Brand',
                'name': 'TradeHut'
            },
            'offers': {
                '@type': 'Offer',
                'price': '100.00',
                'priceCurrency': 'Ghc',
                'availability': 'https://schema.org/InStock'
            }
        }
        </script>




        <title>TradeHutGh</title>

        <!-- Favicon -->
        <link rel='shortcut icon' href='images/favico.png' />
        <link rel='stylesheet' href='assets/css/style.css' />

        <!-- Library / Plugin Css Build -->
        <link rel='stylesheet' href='assets/css/core/libs.min.css' />
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css' />

        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' />
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css' />


        <!-- Aos Animation Css -->
        <link rel='stylesheet' href='assets/vendor/aos/dist/aos.css' />

        <!-- Hope Ui Design System Css -->
        <link rel='stylesheet' href='assets/css/hope-ui.min.css?v=2.0.0' />
        <link rel='stylesheet' href='assets/fontawesome/css/all.css' />
        <link rel='stylesheet' href='assets/fontawesome/webfonts/fa-solid-900.ttf' />

        <!-- Custom Css -->
        <link rel='stylesheet' href='assets/css/custom.min.css?v=2.0.0' />

        <!-- Dark Css -->
        <link rel='stylesheet' href='assets/css/dark.min.css' />

        <!-- Customizer Css -->
        <link rel='stylesheet' href='assets/css/customizer.min.css' />

        <!-- RTL Css -->
        <link rel='stylesheet' href='assets/css/rtl.min.css' />

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

    include_once 'header2.php';
    

    ?>



        <main style=' margin-top:150px'></main>
        <?php 




// if (isset($_GET['message'])) {
//     $message = urldecode($_GET['message']);

//     // Display the message
//     echo '<script>alert("' . $message . '");</script>';
// }

if(isset($_SESSION['cart']) )
{
    
    foreach($_SESSION['cart'] as $key => $value){
        $sr = $key +1;
    print_r($value);
    
    echo"
    
   
    <div class='card mb-3'>
   
    <div class='card-body'>
    <div>$sr</div>
        <div class='row align-items-center'>
            <div class='col flex-grow-0'>
                <img
                    src='$value[image]'
                    class='rounded-3'
                    alt='Shopping item'
                    style='width: 65px'
                />
            </div>
            <div class='col m-0 p-0'>
                <div
                    class='card-body row align-items-center m-0 p-0'
                >
                    <div
                        class='col-sm-3 col-md-3 col-lg-3 col-xl-3 flex-grow-1'
                    >
                        <p class='small mb-0 text-muted text-sm'>
                            $value[description]
                        </p>
                        <h5
                            class='text-black mb-0'
                            style='font-size: 1em'
                        >
                            $value[Item_Name]
                        </h5>
                        <p
                            class='small mb-0 text-muted text-sm unitPrice'
                        >
                            unite Price: <span>$value[Price]
                            <input type='hidden' class='iprice' value='$value[Price]'></span>
                        </p>
                    </div>
                    <div class='col align-items-center'>
                        <div class='col-md-3 col-lg-3 col-xl-2 d-flex'>
                            

                            <form action='manage_cart.php' method='POST'>
                                <input

                                    onchange='subtotal()'
                                    
                                    id='form1'
                                    min='1'
                                    max='100'
                                    name='Mod_Quantity'
                                    value='$value[Quantity]'
                                    type='number'
                                    class='form-control form-control-sm p-1 iquantity'
                                />
                                <input type='hidden' name='Item_Name' value='$value[Item_Name]'>
                                <input type='hidden' name='product_id' value='$value[product_id]'>

                            </form>

                          
                        </div>
                    </div>
                    <div class='col '>
                    <h6 class='mb-0 itotal'  name='itotal'></h6>
                    <input type='hidden' name='itotal' class='itotalValue'  value=''>
                    </div>
                 
                        <div class='col-md-1 col-lg-1 col-xl-1 text-end'>
                        <form action='manage_cart.php' method='POST'>  
                        <button type='submit' name='Remove_Item'
                            style='color: #EE0000'
                                ><i   class='fas fa-trash-alt'></i
                            ></button>
                        
                        <input type='hidden' name='Item_Name' value='$value[Item_Name]'>

                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




    ";


    }
}
?>


        </main>

        <div class="col-lg-4">
            <div class="border bg-light rounded p-4 ">
                <h3>
                    Total:
                </h3>
                <h5 class="align-text-right " id="gtotal" value="" name="gtotal"></h5>
                <br>

                <?php 
            if(isset($_SESSION['cart']) && count($_SESSION['cart'] )> 0)
            {

           
            ?>
                <form action="purchase.php" method="POST">
                    <label for="inputPassword5" class="form-label">Full Name</label>
                    <input type="text" name="fullname" class="form-control" required>
                    <label for="inputPassword5" class="form-label">Phone Number</label>
                    <input type="number" name="phone_no" class="form-control" required>
                    <label for="inputPassword5" class="form-label">Phone Number</label>
                    <input type="text" name="address" class="form-control" required>

                    <?php 
             }
            ?>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="pay_mode" value="COD" checked>
                            Cash on Delivery
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="pay_mode" value="MM">
                            Mobile Money
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="pay_mode" value="CP">
                            Card Payment
                        </label>
                    </div>

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="pay_mode" value="CRYPTO">
                            Cryptocurrency
                        </label>
                    </div>

                    <br>
                    <button class="btn btn-primary btn-block" name="purchase">Make Purchase</button>
                </form>
            </div>

        </div>



        <script>
        var gt = 0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity = document.getElementsByClassName('iquantity');
        var itotal = document.getElementsByClassName('itotal');
        var itotalValue = document.getElementsByClassName('itotalValue');
        var gtotal = document.getElementById('gtotal');

        function subtotal() {
            gt = 0;

            for (var i = 0; i < iprice.length; i++) {
                var subtotalValue = (iprice[i].value) * (iquantity[i].value);

                // Update the innerText of itotal
                itotal[i].innerText = subtotalValue;

                // Update the value attribute of itotal (assuming itotal is an input element)
                itotal[i].value = subtotalValue;

                itotalValue[i].value = subtotalValue;


                // Update the total
                gt = gt + subtotalValue;
            }

            gtotal.innerText = gt;
            gtotal.value = gt;

        }


        document.addEventListener("DOMContentLoaded", function() {
            // Get a reference to the input element
            var inputElement = document.getElementById("form1");

            // Add an event listener for the "change" event
            inputElement.addEventListener("change", function() {
                // Submit the form when the input value changes
                subtotal();
            });
        });


        subtotal();
        </script>




    </body>



    <!-- Footer Section Start -->

    <!-- Footer Section End -->
    </main>











    <!-- Wrapper End-->
    <!-- offcanvas start -->

    <!-- Library Bundle Script -->
    <script src='assets/js/core/libs.min.js'></script>

    <!-- External Library Bundle Script -->
    <script src='assets/js/core/external.min.js'></script>

    <!-- Widgetchart Script -->
    <script src='assets/js/charts/widgetcharts.js'></script>

    <!-- mapchart Script -->
    <script src='assets/js/charts/vectore-chart.js'></script>
    <script src='assets/js/charts/dashboard.js'></script>

    <!-- fslightbox Script -->
    <script src='assets/js/plugins/fslightbox.js'></script>

    <!-- Settings Script -->
    <script src='assets/js/plugins/setting.js'></script>

    <!-- Slider-tab Script -->
    <script src='assets/js/plugins/slider-tabs.js'></script>
    <script src='assets/js/bootstrap.bundle.js'></script>
    <!-- Form Wizard Script -->
    <script src='assets/js/plugins/form-wizard.js'></script>

    <!-- AOS Animation Plugin-->
    <script src='assets/vendor/aos/dist/aos.js'></script>
    <script src='assets/js/bootstrap.bundle.js'></script>

    <!-- App Script -->
    <script src='assets/js/hope-ui.js' defer></script>
    </body>

</html>