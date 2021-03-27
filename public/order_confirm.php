<?php
    include ('../config/dbconfig.php');
    include ('../src/session.php');
?>
<?php
    if(!isset($_SESSION["loggedInUserID"]) )
    {
            echo "<script>
            alert('You have to login first');
            window.location.href='../public/login.php';
            </script>";
    }  

    else if (isset($_SESSION["loggedInUserID"])) {
        $userID = $_SESSION["loggedInUserID"];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link href="http://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/order-confirm.css">
        <link rel="stylesheet" type="text/css" href="./css/progress-bar.css">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/footer.css">
        
        <title>Confirm Order | Vegemart</title>
    </head>
    <body>  
        <?php include "./includes/nav.php"; ?>
        <div class="columns group mb-0">
            <div class="column is-2"></div>
            <div class="column is-8 mt-1 mb-0">
                <section>
                    <ol class="progress-bar">
                        <li class="is-complete"><span>Shopping Cart</span></li>  
                        <li class="is-active"><span>Confirmation</span></li>  
                        <li><span>Payment</span></li>
                        <li><span>Finish</span></li>    
                    </ol>
                </section>
            </div>
            <div class="column is-2"></div>
        </div>

        <div><h1 class="mt-0 pt-0 ml-4 has-text-left" id="title">Confirm Order</h1></div>
        
        <div class="columns group mb-0">
            <div class="column is-1"></div>
            <div class="column is-5 pr-4">
                <?php
                    $orderID=$_GET['id'];
                    $orderQuery= "SELECT * FROM orders WHERE orderID='$orderID';";  
                    $orderResult=mysqli_query($con,$orderQuery);
                    while ($rowOrder  = mysqli_fetch_assoc($orderResult)) {
                        //get the seller details
                        $sellerID=$rowOrder['sellerID'];
                        $sellerQuery= "SELECT * FROM client WHERE user_id='$sellerID';";
                        $resultSeller=mysqli_query($con, $sellerQuery);
                        while ($rowseller  = mysqli_fetch_assoc($resultSeller)) {
                            ?>
                <!-- <div class="image-row has-text-centered">
                    <img class="map" src="http://localhost/vegemart/public/images/map.jpg">
                </div> -->
                <div class="mapouter">
                    <iframe class="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $rowseller['address1']?>%20<?php echo $rowseller['address2']?>%20<?php echo $rowseller['city']?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>                               
                </div>
                
            </div>
            <div class="column is-5 pl-4 mt-0 ">
                <div class="row has-text-left pb-0">
                    <h2 style="text-align:left; font-size:20px; padding-bottom:0;">Conditions:</h2>
                    <p style="text-align:left;">Pickup location is shown in the map</p>
                    <p style="text-align:left;">Delievery is available within the same day</p>
                    <p style="text-align:left;">A fixed Amount (Rs.30.00) will be charged for delivery of packages under 5kg</p>
                    <p style="text-align:left;">Self Pickup should be done before 8pm</p>
                    <br>
                </div>
                
                <div class="row">
                    <div class="columns group">
                        <div class="column is-4 has-text-left">
                            <h3 class="mb-1 mt-0" style="text-align:left;">Seller Contact No:</h3>
                            <h3 class="mb-0 mt-0" style="text-align:left;">Pickup Location:</h3>
                            <h3 class="mb-0 mt-0" style="text-align:left;"></h3>
                            <h3 class="mb-0 mt-0" style="text-align:left;"></h3>
                            <h3 class="mb-0 mt-0" style="text-align:left;"></h3><br><br><br> 

                            <h3 class="mb-0 mt-0" style="text-align:left;">Drop Location:</h3>
                            <h3 class="mb-0 mt-0" style="text-align:left;"></h3>
                            <h3 class="mb-0 mt-0" style="text-align:left;"></h3><br> 
                        </div>
                        
                        <div class="column is-8 pr-2 has-text-left">
                            <h3 class="mb-1 mt-0" style="text-align:left;"><?php echo $rowseller['phoneNum']?></h3>
                            <h3 class="mb-0 mt-0" style="text-align:left;"><?php echo $rowseller['address1']?></h3>
                            <h3 class="mb-0 mt-0" style="text-align:left;"><?php echo $rowseller['address2']?>,</h3>
                            <h3 class="mb-0 mt-0" style="text-align:left;"><?php echo $rowseller['city']?></h3><br>
                        
                            <?php
                        }
                        //get user details
                        $userID=$_SESSION["loggedInUserID"];
                        $user = "SELECT * FROM client WHERE user_id='$userID';";
                        $userQuery=mysqli_query($con, $user);
                        while ($rowuser  = mysqli_fetch_assoc($userQuery)) {
                            $fname=$rowuser['fName'];
                            $lname=$rowuser['lName'];
                            $address1=$rowuser['address1'];
                            $address2=$rowuser['address2'];
                            $city=$rowuser['city'];
                            $phoneNum=$rowuser['phoneNum'];
                            //get email
                            $email = "SELECT * FROM users WHERE id='$userID';";
                            $emailQuery=mysqli_query($con, $email);
                            while ($rowEmail  = mysqli_fetch_assoc($emailQuery)) {
                                $email=$rowEmail['email'];
                            }


                            ?>
                            <h3 class="mb-0 mt-0" style="text-align:left;"><?php echo $rowuser['address1']?></h3>
                            <h3 class="mb-0 mt-0" style="text-align:left;"><?php echo $rowuser['address2']?></h3>
                            <h3 class="mb-0 mt-0" style="text-align:left;"><?php echo $rowuser['city']?></h3><br>  
                            <?php
                        } ?>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="column is-1"></div>
        </div>
        
        <div class="columns group mt-0 mb-0">
            <div class="column is-1"></div>
            <div class="column is-5 mt-0 pl-2 has-text-centered">
                <div class="card">
                    <div class="item-table pl-1 pr-1 ml-1 mr-1 mt-0">
                    <h1 class="has-text-left pl-1" id="title">Your Items</h1>
                        <div class="row item-row has-text-centered mt-0 mb-0">                          
                            <?php
                                $productID=$rowOrder['productID'];
                                $productQuery= "SELECT * FROM products WHERE productID='$productID';";
                                $resultProduct=mysqli_query($con, $productQuery);
                                while ($rowProduct  = mysqli_fetch_assoc($resultProduct)) {
                                    $productName=$rowProduct['name'];
                            ?>             
                            <div class="columns group mt-0">
                                <div class="column is-4">
                                    <img class="item-img" src="http://localhost/vegemart/public/images/products/<?php echo $rowProduct['imageName']?>">
                                </div>
                                <div class="column is-4">
                                    <h3><?php echo $rowProduct['name']?></h2>
                                </div>

                                <?php
                        }
                                  
                        //get bid price
                        $bidID=$rowOrder['bidID'];
                        $bidQuery= "SELECT * FROM bidding WHERE bidID='$bidID';";
                        $resultBid=mysqli_query($con, $bidQuery);
                        while ($rowBid  = mysqli_fetch_assoc($resultBid)) {
                            $price = $rowBid['bidPrice'];
                            ?>
                                <div class="column is-4">
                                    <h3><?php echo $rowBid['bidPrice']?>.00</h2>
                                </div>
                            </div>
                            <?php
                            }
                        }
                            ?>
                        </div>
                        <hr>
                        <div class="columns group mt-1">    
                            <div class="column is-5 pl-2 has-text-left">
                                <h2 style="text-align:left;">Sub Total</h2>
                                <h2 style="text-align:left;display:none;" id="label">Delivery Charge</h2>
                                <h1 style="text-align:left;">Total</h1>
                            </div>
                            <div class="column is-7 pr-2 has-text-right">
                                <h2 style="text-align:right;">Rs. <?php echo "$price"?>.00</h2>
                                <h2 style="text-align:right;display:none;" id="charge">50.00</h2>
                                <h1 style="text-align:right;" id="total">Rs. <?php echo "$price"?>.00</h1>
                            </div>
                        </div>
                    </div>
                   
                    <div class="payhere has-text-centered">
                        <form method="post" action="https://sandbox.payhere.lk/pay/checkout">
                            <input type="hidden" name="merchant_id" value="1215900" style="display: none;"> <!-- Replace your Merchant ID -->
                            <input type="hidden" name="return_url" value="http://localhost/vegemart/src/order_done.php?id=<?php echo $orderID ?>" style="display: none;">
                            <input type="hidden" name="cancel_url" value="http://localhost/vegemart/public/order_confirm" style="display: none;">
                            <input type="hidden" name="notify_url" value="http://localhost/vegemart/src/payment.php" style="display: none;">

                            <input type="text" name="order_id" value="<?php echo $orderID ?>" style="display: none;">
                            <input type="text" name="items" value="<?php echo $productName ?>" style="display: none;">
                            <input type="text" name="currency" value="LKR" style="display: none;">                            
                            
                            <input type="text" name="amount" id="amount" style="display: none;">

                            <input type="text" name="first_name" value="<?php echo $fname ?>" style="display: none;">
                            <input type="text" name="last_name" value="<?php echo $lname ?>" style="display: none;">
                            <input type="text" name="email" value="<?php echo $email ?>" style="display: none;">
                            <input type="text" name="phone" value="<?php echo $phoneNum ?>" style="display: none;">
                            <input type="text" name="address" value="<?php echo $address1 . " " . $address2 ?>" style="display: none;">
                            <input type="text" name="city" value="<?php echo $city ?>" style="display: none;">
                            <input type="hidden" name="country" value="Sri Lanka" style="display: none;">
                            <button class="button" type="submit" onclick="abc()">Pay</button>
                        </form>
                    </div>  
                </div>
            </div>
            <div class="column is-6 mt-1 ml-1">
                <div class="columns group">
                    <div class="column is-5 mt-1">
                        <div class="image-row has-text-centered">
                            <img class="img" src="http://localhost/vegemart/public/images/order_deli.jpg">
                        </div>
                    </div>    
                    <div class="column is-7 has-text-left mt-1"> 
                        <label for="delivery">Delivery</label>
                        <input style="text-align:left;" type="checkbox" id="delivery" class="delivery" name="delivery" value="delivery" onclick="abc(this)">     
                        <p>Delivery is provided within the district only</p>                                           
                    </div>                               
                </div>

                <div class="columns group">
                    <div class="column is-5">
                        <div class="image-row has-text-centered">
                            <img class="img" src="http://localhost/vegemart/public/images/order_pick.jpg">
                        </div>
                    </div>    
                    <div class="column is-7 has-text-left mt-1"> 
                        <label for="selfpick">Self Pickup</label>
                        <input style="text-align:left;" type="checkbox" id="selfpick" class="delivery" name="delivery" value="selfpick" onclick="abc(this)">
                        <p>Please pickup during the day of purchase</p>                                             
                    </div>                               
                </div>
            </div>
        </div><br>

        <?php include_once "./includes/footer.php"; ?>   
    </body>
</html>
<script>
    function abc(id){
        var checkBox=document.getElementById("delivery");
        var selfpick = document.getElementById("selfpick");
        var charge=document.getElementById("charge"); 
        var label=document.getElementById("label"); 
        var total= document.getElementById("total");
        var amount=document.getElementById("amount"); 
        if(checkBox.checked==true){
            charge.style.display="block";
            label.style.display="block"; 
            <?php $x= "$price"+50?>            
            total.innerHTML = "Rs. <?php echo "$x"?>.00";
            amount.value = <?php echo "$x"?>;            
        }
        else{
            charge.style.display="none"; 
            label.style.display="none"; 
            total.innerHTML = "Rs. <?php echo "$price"?>.00";          
        }
        if(id==selfpick){
            charge.style.display="none"; 
            label.style.display="none"; 
            total.innerHTML = "Rs. <?php echo "$price"?>.00";
            <?php $x= "$price"?>            
            total.innerHTML = "Rs. <?php echo "$x"?>.00";
            amount.value = <?php echo "$x"?>; 

        }
        var myCheckbox = document.getElementsByName("delivery");
        Array.prototype.forEach.call(myCheckbox,function(el){
            el.checked = false;
        });
        id.checked = true;

    };

    
        
    

    </script>
