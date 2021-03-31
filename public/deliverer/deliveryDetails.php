<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/delivery.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/footer.css">
        <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <title> Ongoing Delivery</title>
    </head>
    <body>
        <?php include "../deliverer/deliverer_nav.php"; ?>  
        <div class="row">
            <div class="columns group">
            <div class="column is-1 pl-1 pr-1"></div>
                <?php
                include ('../../config/dbconfig.php');
                include ('../../src/session.php');
                if(empty(session_id())){
                    session_start();
                }
                if((!isset($_SESSION["loggedInDelivererID"])))
                {
                    echo "<script>
                    alert('You have to login first');
                    window.location.href='../../public/login.php';
                    </script>";
                }

                $deliveryID = $_GET['id'];
                $userID = $_SESSION["loggedInDelivererID"];
                $delivery = "SELECT * FROM deliveries WHERE `deliveryID` ='$deliveryID' AND deliveryStatus=0 AND pickupStatus=0";
                $deliveryresult = mysqli_query($con, $delivery);

                while ($rowdelivery = mysqli_fetch_assoc($deliveryresult)) {
                    $orderID = $rowdelivery['orderID'];
                    $buyerID = $rowdelivery['buyerID'];
                    $sellerID = $rowdelivery['sellerID'];

                    //buyer details
                    $buyerInfo = "SELECT * FROM client WHERE `user_id` ='$buyerID' ";
                    $buyerquery = mysqli_query($con, $buyerInfo);
                                
                    //seller details
                    $sellerInfo = "SELECT * FROM client WHERE `user_id` ='$sellerID' ";
                    $sellerquery = mysqli_query($con, $sellerInfo); 
                    while ($rowSeller = mysqli_fetch_assoc($sellerquery)) {?>
                <div class="column is-5 pl-1 pr-1">
                    <div class="flip-card-3D-wrapper mt-0 pt-0">
                        <div id="flip-card">
                            <div class="flip-card-front">
                                <div class="mapouter">
                                    <div class="gmap_canvas">
                                        <iframe width="100%" height="120%" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $rowSeller['address1']?>%20<?php echo $rowSeller['address2']?>%20<?php echo $rowSeller['city']?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>                               
                                    </div>                                
                                </div>
                                <h2 class="mb-1">Seller</h2>
                                <h3><?php echo $rowSeller['fName'] . " " . $rowSeller['lName'] ?></h3>
                                <p><?php echo $rowSeller['address1']?>,</p>
                                <p><?php echo $rowSeller['address2']?>,</p>
                                <p><?php echo $rowSeller['city']?></p>                                                  
                                <button class="button" onClick="location.href='https://localhost/vegemart/src/deliverer/delivery_pickedup.php?id=<?php echo $rowdelivery['deliveryID'] ?>';" >Confirm Pickup</button>                             
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                $delivery = "SELECT * FROM deliveries WHERE `deliveryID` ='$deliveryID' AND deliveryStatus=0";
                $deliveryresult = mysqli_query($con, $delivery);

                while ($rowdelivery = mysqli_fetch_assoc($deliveryresult)) {
                    $orderID = $rowdelivery['orderID'];
                    $buyerID = $rowdelivery['buyerID'];
                    $sellerID = $rowdelivery['sellerID'];

                    //buyer details
                    $buyerInfo = "SELECT * FROM client WHERE `user_id` ='$buyerID' ";
                    $buyerquery = mysqli_query($con, $buyerInfo);
                                
                    //seller details
                    $sellerInfo = "SELECT * FROM client WHERE `user_id` ='$sellerID' ";
                    $sellerquery = mysqli_query($con, $sellerInfo); 
                    
                    while ($rowUser = mysqli_fetch_assoc($buyerquery)) {                    
                ?>
  
                <div class="column is-5 pl-1 pr-1">
                    <div class="row">
                        <div class="card">
                            <div class="columns group">
                                <div class="column is-12 has-text-centered">                               
                                    <div class="mapouter">
                                    <div class="gmap_canvas">
                                        <iframe width="100%" height="120%" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $rowUser['address1']?>%20<?php echo $rowUser['address2']?>%20<?php echo $rowUser['city']?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>                               
                                    </div>
                                    </div>
                                    <h2 class="mb-1">Buyer</h2>
                                    <h3><?php echo $rowUser['fName'] . " " . $rowUser['lName'] ?></h3>
                                    <p><?php echo $rowUser['address1']?>,</p>
                                    <p><?php echo $rowUser['address2']?>,</p>
                                    <p><?php echo $rowUser['city']?></p>
                                </div>
                            </div>
                            <div class="row pb-1">
                                <button class="button" onClick="location.href='https://localhost/vegemart/src/deliverer/confirmDelivery.php?id=<?php echo $rowdelivery['deliveryID'] ?>';">Confirm Delivery</button><br>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                        }
                    }
                ?>  
            <div class="column is-1 pl-1 pr-1"></div>
        </div>
        


        <?php include_once "../includes/footer.php"; ?>
    </body>
</html>                            