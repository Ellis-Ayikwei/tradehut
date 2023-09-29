<?php
session_start();
 include_once 'header2.php';


 
 if (isset($_GET['message'])) {
    $message = urldecode($_GET['message']);

    // Display the message
    echo '<script>alert("' . $message . '");</script>';
}

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
                                                <?php

print_r($_SESSION['cart']);

?>
														<div class="row m-0 promo-card">
								
                                                            <div class="card"> 
                                                                <form action="manage_cart.php" method="POST" >
																
																<div class="card-header"><div class="row">
																	<div class="col text-left">
																		<p>Top Sellers</p>
																		</div>
																	<div class="col text-right">
																		<span class="wish-icon"><i class="fas fa-2x fa-heart-circle-plus"></i></i></span>
																		</div>
								
																	
																	</div>
																</div>
																
																	<div class="card-img-top text-center d-flex align-items-center food-img">
                                                                        <img src="images\products\electronics\iphone12.jpg" class="mx-auto" alt="..."></div>
																	<div class="card-body  p-0">
																		<h5 class="card-title mb-0 food-title">Apple iphone</h5><span class="item-tag">mobile phones</span>
																		<p class="card-text"><div class="star-rating">
																			<P class="text-muted">Lorem ipsum dolor, 
																				sit amet consectetur adipisicing 
																				elit. Necessitatibus nam earum 
																				voluptatem debitis recusandae 
																				</P>
																			<ul class="list-inline m-0">
																				<li class="list-inline-item"><i class="fa fa-star"></i></li>
																				<li class="list-inline-item"><i class="fa fa-star"></i></li>
																				<li class="list-inline-item"><i class="fa fa-star"></i></li>
																				<li class="list-inline-item"><i class="fa fa-star"></i></li>
																				<li class="list-inline-item"><i class="fa fa-star"></i></li>
																				<li class="list-inline-item"><span><a href="" class="mb-0"><small>55 reviews</small></a></span></li>
																			</ul>
																			
																		</div></p>
																		<p class="item-price food-price"><s>₵400.00</s>&nbsp; <b><sup>₵</sup>600.00</b> <em class="badge bg-gray">save ₵20</em> </p>
                                                                        <button type="submit" name="Add_To_Cart" class="btn btn-info"> Add To Cart</button>
                                                                        
                                                                        <input type="hidden" name="Item_Name" value="Bag 3">
                                                                        <input type="hidden" name="Price" value="700.00">
                                                                        
                                                                        
                                                                    </div>
                                                                </form>
                                                                    </div>

                                                                    <div class="card"> 
                                                                <form action="manage_cart.php" method="POST" width="auto">
																
																<div class="card-header"><div class="row">
																	<div class="col text-left">
																		<p>Top Sellers</p>
																		</div>
																	<div class="col text-right">
																		<span class="wish-icon"><i class="fas fa-2x fa-heart-circle-plus"></i></i></span>
																		</div>
								
																	
																	</div>
																</div>
																
																	<div class="card-img-top text-center d-flex align-items-center food-img">
                                                                        <img src="images\products\electronics\iphone11.jpg" class="mx-auto" alt="..."></div>
																	<div class="card-body  p-0">
																		<h5 class="card-title mb-0 food-title">iphone11</h5><span class="item-tag">mobile phones</span>
																		<p class="card-text"><div class="star-rating">
																			<P class="text-muted">Lorem ipsum dolor, 
																				sit amet consectetur adipisicing 
																				elit. Necessitatibus nam earum 
																				voluptatem debitis recusandae 
																				</P>
																			<ul class="list-inline m-0">
																				<li class="list-inline-item"><i class="fa fa-star"></i></li>
																				<li class="list-inline-item"><i class="fa fa-star"></i></li>
																				<li class="list-inline-item"><i class="fa fa-star"></i></li>
																				<li class="list-inline-item"><i class="fa fa-star"></i></li>
																				<li class="list-inline-item"><i class="fa fa-star"></i></li>
																				<li class="list-inline-item"><span><a href="" class="mb-0"><small>55 reviews</small></a></span></li>
																			</ul>
																			
																		</div></p>
																		<p class="item-price food-price"><s>₵300.00</s>&nbsp; <b><sup>₵</sup>300.00</b> <em class="badge bg-gray">save ₵20</em> </p>
                                                                        <button type="submit" name="Add_To_Cart" class="btn btn-info"> Add To Cart</button>
                                                                        
                                                                        <input type="hidden" name="Item_Name" value="iphone11">
                                                                        <input type="hidden" name="Price" value="300.00">
                                                                        
                                                                        
                                                                    </div>
                                                                </form>
                                                                    </div>

                                                                    <div class="card"> 
                                                                <form action="manage_cart.php" method="POST" class="m-0">
																
																<div class="card-header"><div class="row">
																	<div class="col text-left">
																		<p>Top Sellers</p>
																		</div>
																	<div class="col text-right">
																		<span class="wish-icon"><i class="fas fa-2x fa-heart-circle-plus"></i></i></span>
																		</div>
								
																	
																	</div>
																</div>
																
																	<div class="card-img-top text-center d-flex align-items-center food-img">
                                                                        <img src="images\products\electronics\mackbookpro.jpg" class="mx-auto" alt="..."></div>
																	<div class="card-body  p-0">
																		<h5 class="card-title mb-0 food-title">Apple lappi</h5><span class="item-tag">mobile phones</span>
																		<p class="card-text"><div class="star-rating">
																			<P class="text-muted">Lorem ipsum dolor, 
																				sit amet consectetur adipisicing 
																				elit. Necessitatibus nam earum 
																				voluptatem debitis recusandae 
																				</P>
																			<ul class="list-inline m-0">
																				<li class="list-inline-item"><i class="fa fa-star"></i></li>
																				<li class="list-inline-item"><i class="fa fa-star"></i></li>
																				<li class="list-inline-item"><i class="fa fa-star"></i></li>
																				<li class="list-inline-item"><i class="fa fa-star"></i></li>
																				<li class="list-inline-item"><i class="fa fa-star"></i></li>
																				<li class="list-inline-item"><span><a href="" class="mb-0"><small>55 reviews</small></a></span></li>
																			</ul>
																			
																		</div></p>
																		<p class="item-price food-price"><s>₵400.00</s>&nbsp; <b><sup>₵</sup>70000.00</b> <em class="badge bg-gray">save ₵20</em> </p>
                                                                        <button type="submit" name="Add_To_Cart" class="btn btn-info"> Add To Cart</button>
                                                                        
                                                                        <input type="hidden" name="Item_Name" value="Apple lappi">
                                                                        <input type="hidden" name="Price" value="700000
                                                                        00">
                                                                        
                                                                        
                                                                    </div>
                                                                </form>
                                                                    </div>
        
                                                                    
                                                                </div>
                                                                                                                                                    
                                                            </div>
                                                        </div>
                                               
                                                </div>
                                            </div>


																				


																			

                                                                              




    </main>

   
      







   

</body>

</html>