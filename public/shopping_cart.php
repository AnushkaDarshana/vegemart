<?php
    include ('../config/dbconfig.php');
    include ('../src/session.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <link rel="stylesheet" type="text/css" href="./css/shopping-cart.css">
        <link rel="stylesheet" type="text/css" href="./css/progress-bar.css">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/footer.css">
        <title>Shopping Cart | Vegemart</title>
    </head>
    <body>  
    <?php include "./includes/nav.php"; ?>  
        <div class="row">
            <div class="columns group mt-0">
                <div class="column is-1 mt-0 pt-2"></div>
                <div class="column is-10 mt-0 pt-2">
                    <div class="row pl-2 pr-1 mt-0">
                        <div class="heading">
                            <h1 id="title"><i class="fa fa-shopping-cart" style="font-size:35px; padding-right:20px;"></i>Shopping Cart</h1>
                            
                        </div>
                        <br>
                        <div class="items-grid ml-1 mr-1 mt-0">
                            <div class="row item-legend has-text-centered mt-0\">
                                <div class="columns group">
                                    <div class="column is-3">
                                        <h2></h2>
                                    </div>
                                    <div class="column is-2">
                                        <h2>Item</h2>
                                    </div>
                                    <div class="column is-3">
                                        <h2>Bid Price (Rs.)</h2>
                                    </div>
                                    <div class="column is-2">
                                        <h2>Bid Quantity (kg)</h2>
                                    </div>
                                    <div class="column is-2">
                                        <h2></h2>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        
                        <div class="item-table pl-1 pr-1 mt-0">
                            <div class="block item-row has-text-centered mb-0" onclick= "window.location.href = 'bid.php'" style="cursor: pointer;">
                                <div class="columns group">
                                    <div class="column is-3">
                                        <img class="item-img" src="http://localhost/vegemart/public/images/products/carrot.jpg"><br>
                                        <h2 style="color:green; font-size:16px; text-align:center; margin:0 0;">Order details</h2>
                                    </div>
                                    <div class="column is-2 mt-2">
                                        <h3>Carrot</h3>
                                    </div>
                                    <div class="column is-3 mt-2">
                                        <h3>550.00</h3>
                                    </div>
                                    <div class="column is-2 mt-2">
                                        <h3>10</h3>
                                    </div>
                                    <div class="column is-2 mt-2">
                                        <h3>10</h3>
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="block item-row has-text-centered mb-0" >
                                <div class="columns group">
                                    <div class="column is-3">
                                        <img class="item-img" src="http://localhost/vegemart/public/images/products/Tomato.jpg"><br>
                                        <h2 style="color:green; font-size:16px; text-align:center; margin:0 0;">Order details</h2>
                                    </div>
                                    <div class="column is-2 mt-2">
                                        <h3>Tomato</h3>
                                
                                    </div>
                                    <div class="column is-3 mt-2">
                                        <h3>550.00</h3>
                                    </div>
                                    <div class="column is-2 mt-2">
                                        <h3>10</h3>
                                    </div>  
                                    <div class="column is-2 mt-2">
                                        <button onclick= "window.location.href">Order details</button>
                                    </div>              
                                </div>
                                <hr>
                            </div>
                        </div>
                        
                    </div>
                    <br><br>
                    <a id="ab" href="http://localhost/vegemart/public/products.php"><i class="fa fa-hand-o-left pr-1" style="font-size:22px; font-weight:500; color:#3e8e41;"></i>Continue shopping</a>
                </div>

                <div class="column is-1 mt-0 pt-2"></div>
            </div>
        </div>
   
        <br>
        <?php include_once "./includes/footer.php"; ?>   
    </body>
</html>