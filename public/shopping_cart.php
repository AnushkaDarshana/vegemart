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
                        <div class="block item-row has-text-centered mb-0">

                            <?php
                                $userID = $_SESSION["loggedInUserID"];
                                $orderQuery = "SELECT * FROM orders WHERE userID='$userID' AND paymentStatus=0 AND canceled_orders=0";
                                $resultOrder = mysqli_query($con, $orderQuery);

                                

                                while ($rowOrder  = mysqli_fetch_assoc($resultOrder)) {
                                    $orderID = $rowOrder['orderID'];
                                    $productID = $rowOrder['productID'];
                                    $bidID = $rowOrder['bidID'];

                                    $productQuery = "SELECT * FROM products WHERE productID='$productID'";
                                    $resultProduct = mysqli_query($con, $productQuery);
                                    while ($rowProduct  = mysqli_fetch_assoc($resultProduct)) {
                                        ?>
                                <div class="columns group">
                                    <div class="column is-3">
                                        <img class="item-img" src="http://localhost/vegemart/public/images/products/<?php echo $rowProduct['imageName'] ?>">                                        
                                    </div>
                                    
                                    <div class="column is-2 mt-1">
                                        <h3><?php echo $rowProduct['name'] ?></h3>
                                    </div>
                                    <?php
                                    } ?>
                                    <?php
                                        $bidPrice = "SELECT * FROM bidding WHERE bidID='$bidID'";
                                    $resultBid = mysqli_query($con, $bidPrice);
                                    while ($rowBid  = mysqli_fetch_assoc($resultBid)) {
                                        ?>
                                    <div class="column is-3 mt-1">
                                        <h3><?php echo $rowBid['bidPrice'] ?>.00</h3>
                                    </div>
                                    <div class="column is-2 mt-1">
                                        <h3><?php echo $rowBid['bidQuantity'] ?></h3>
                                    </div>
                                    <?php
                                    } ?>
                                    <div class="column is-2">
                                        <button class="button" onClick="location.href='http://localhost/vegemart/public/order_confirm.php?id=<?php echo $rowOrder['orderID'] ?>'">Order Details</button>               
                                    </div>
                                </div>
                                <hr>
                                <?php
                                    $expireDateQuery = "SELECT unix_timestamp(`orderCanceledDate`) * 1000 as stamp FROM orders WHERE orderID='$orderID';";                                    
                                    $expireDateResult = mysqli_query($con, $expireDateQuery);
                                    while ($rowExpireDate = mysqli_fetch_assoc($expireDateResult)) {
                                    ?>

                                <!-- order will be removed after 2 days from cart if the user doesn't pay -->
                                <script>
                                // Set the date we're counting down to
                                
                                var countDownDate<?=$orderID?> = new Date(<?=$rowExpireDate['stamp']?>).getTime();
                               
                                // Update the count down every 1 second
                                var x = setInterval(function() {

                                    // Get today's date and time
                                    var now = new Date().getTime();
                                                
                                            // Find the distance between now and the count down date
                                    var distance<?=$orderID?> = countDownDate<?=$orderID?> - now;
                                                
                                            // Time calculations for days, hours, minutes and seconds
                                            var days = Math.floor(distance<?=$orderID?> / (1000 * 60 * 60 * 24));
                                            var hours = Math.floor((distance<?=$orderID?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                            var minutes = Math.floor((distance<?=$orderID?> % (1000 * 60 * 60)) / (1000 * 60));
                                            var seconds = Math.floor((distance<?=$orderID?> % (1000 * 60)) / 1000);
                                                
                                            
                                            // If the count down is over, product will be removed 
                                            if (distance<?=$orderID?> < 0) {
                                                clearInterval(x);                                                
                                                var orderID=<?php echo $orderID ?>;
                                                window.location.href='http://localhost/vegemart/src/orderRemove.php?id='+orderID;                                                                                          
                                            }
                                            }, 1000);
                                </script>
                                <?php
                                    }
                                }
                                ?>
                                
                                

                                
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