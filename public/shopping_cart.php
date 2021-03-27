<?php
    include ('../config/dbconfig.php');
    include ('../src/session.php');

    if(!isset($_SESSION["loggedInUserID"]) )
    {
            echo "<script>
            alert('You have to login first');
            window.location.href='../public/login.php';
            </script>";
    }  
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
                                    <div class="column is-3">
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
                        <div class="block item-row has-text-centered mb-0">
                                <div class="columns group">
                                    <div class="column is-3">
                                        <img class="item-img" src="http://localhost/vegemart/public/images/products/carrot.jpg">                                        
                                    </div>
                                    
                                    <div class="column is-2 mt-1">
                                        <h3>Carrot</h3>
                                    </div>
                                    <div class="column is-3 mt-1">
                                        <h3>550.00</h3>
                                    </div>
                                    <div class="column is-2 mt-1">
                                        <h3>10</h3>
                                    </div>
                                    <div class="column is-2">
                                        <button class="button" onClick="location.href='http://localhost/vegemart/public/seller/seller_product_edit.php?id=<?php echo $row['productID']?>';">Order Details</button>               
                                    </div>
                                </div>
                                <hr>
                                <div class="columns group">
                                    <div class="column is-3">
                                        <img class="item-img" src="http://localhost/vegemart/public/images/products/carrot.jpg">                                        
                                    </div>
                                    
                                    <div class="column is-2 mt-1">
                                        <h3>Carrot</h3>
                                    </div>
                                    <div class="column is-3 mt-1">
                                        <h3>550.00</h3>
                                    </div>
                                    <div class="column is-2 mt-1">
                                        <h3>10</h3>
                                    </div>
                                    <div class="column is-2">
                                        <button class="button" onClick="location.href='http://localhost/vegemart/public/seller/seller_product_edit.php?id=<?php echo $row['productID']?>';">Order Details</button>               
                                    </div>
                                </div>
                                <hr>
                                <div class="columns group">
                                    <div class="column is-3">
                                        <img class="item-img" src="http://localhost/vegemart/public/images/products/carrot.jpg">                                        
                                    </div>
                                    
                                    <div class="column is-2 mt-1">
                                        <h3>Carrot</h3>
                                    </div>
                                    <div class="column is-3 mt-1">
                                        <h3>550.00</h3>
                                    </div>
                                    <div class="column is-2 mt-1">
                                        <h3>10</h3>
                                    </div>
                                    <div class="column is-2">
                                        <button class="button" onClick="location.href='http://localhost/vegemart/public/seller/seller_product_edit.php?id=<?php echo $row['productID']?>';">Order Details</button>               
                                    </div>
                                </div>
                                <hr>
                            </div>
                        
                    </div>
                <!-- items ends here -->
                    <br><br>
                <div class="column is-1 mt-0 pt-2"></div>
                

            </div>
        </div>
        <br>
        <?php include_once "./includes/footer.php"; ?>   
    </body>
</html>