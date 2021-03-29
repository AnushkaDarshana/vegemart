<?php     
    include ('../../src/session.php');
    include ('../../config/dbconfig.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/deliverer-home.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/footer.css">
        <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <title>Deliverer Dashboard | Vegemart</title>
    </head>
    <body>
        <?php include "../deliverer/deliverer_nav.php"; ?>   
        <div class="row">
        <?php         

            
            $userID = $_SESSION["loggedInDelivererID"];
            $retrieveInfo =  "SELECT * FROM `deliverer` WHERE `user_id`='$userID';"; //Selecting all data from Table
            $resultInfo = mysqli_query($con, $retrieveInfo); //Passing SQL
            while($rowUser  = mysqli_fetch_assoc($resultInfo)){
                $_SESSION["loggedInDelivererID"] = $rowUser['user_id'];
                $city = $rowUser['city'];
                echo "
                <h1 id=\"heading\" style=\"text-align:left; font-family: Candara; color: #138D75; margin:0.2em 1em 0;\">Hello ".$rowUser['fName']."! Welcome to Deliverer dashboard </h1>";
            }
        ?>
        <div class="columns group">
            <div class="column is-3 mt-1 pl-2 pr-0">
                <h1 id="title" class="mt-1 mb-1">Select your Location</h1>
                <form class="location" action="" method="get" >
                    <label class="select-box">
                    <?php $default_state = $city;?>
                        <select name="location" id="location" class="custom-select location" onchange='this.form.submit()' placeholder="Select Location" >
                            <option value='<?php echo $default_state?>' selected='selected'><?php echo $default_state?></option>
                            <option id="city" value="Anuradhapura">Anuradhapura</option>
                            <option id="city" value="Badulla">Badulla</option>
                            <option id="city" value="Batticaloa">Batticaloa</option>
                            <option id="city" value="Colombo">Colombo</option>
                            <option id="city" value="Galle">Galle</option>
                            <option id="city" value="Gampaha">Gampaha</option>
                            <option id="city" value="Jaffna">Jaffna</option>
                            <option id="city" value="Kalutara">Kalutara</option>
                            <option id="city" value="Kandy">Kandy</option>
                            <option id="city" value="Kegalle">Kegalle</option>
                            <option id="city" value="Kilinochchi">Kilinochchi</option>
                            <option id="city" value="Kurunegala">Kurunegala</option>
                            <option id="city" value="Mannar">Mannar</option>
                            <option id="city" value="Matale">Matale</option>
                            <option id="city" value="Matara">Matara</option>
                            <option id="city" value="Moneragala">Moneragala</option>
                            <option id="city" value="Mullaitivu">Mullaitivu</option>
                            <option id="city" value="Nuwara Eliya">Nuwara Eliya</option>
                            <option id="city" value="Polonnaruwa">Polonnaruwa</option>
                            <option id="city" value="Puttalam">Puttalam</option>
                            <option id="city" value="Ratnapura">Ratnapura</option>
                            <option id="city" value="Trincomalee">Trincomalee</option>
                            <option id="city" value="Vavuniya">Vavuniya</option>
                        </select>
                    </label>
                </form>
            </div>
            <script>
            
            </script>
            <div class="column is-9 mt-0 pl-1 pr-2">
                <div class="items-grid">
                    <div class="row item-legend">
                        <div class="columns group">
                            <div id="requests" class="column is-2">
                                <h3 style="font-size:18px;" class="pb-0 mb-0">Seller</h3>
                            </div>
                            <div class="column is-3">
                                <h3 style="font-size:18px;" class="pb-0 mb-0">Pick up</h3>
                            </div>
                            <div class="column is-1">
                                <h3 style="font-size:18px;" class="pb-0 mb-0">Items</h3>
                            </div>
                            <div class="column is-1">
                                <h3 style="font-size:18px;" class="pb-0 mb-0">Qty (kg)</h3>
                            </div>
                            <div class="column is-2">
                                <h3 style="font-size:18px;" class="pb-0 mb-0">Buyer</h3>
                            </div>
                            <div class="column is-3">
                                <h3 style="font-size:18px;" class="pb-0 mb-0">Drop by</h3>
                            </div>
                        </div>
                    </div>

                    <?php
                        include ('../../config/dbconfig.php');
                        include ('../../src/session.php');

                        $deliveries = "SELECT * FROM orders where `delivery` = 1 AND `acceptDelivery` = 0";
                        $deliveryquery = mysqli_query($con,$deliveries);
                       
                        while ($rowdelivery = mysqli_fetch_assoc($deliveryquery)) {
                            $orderID = $rowdelivery['orderID'];
                            $buyerID = $rowdelivery['userID'];
                            $sellerID = $rowdelivery['sellerID'];
                            $productID = $rowdelivery['productID'];
                            $quantityID = $rowdelivery['quantityID'];

                            //buyer details
                            $buyerInfo = "SELECT * FROM client WHERE `user_id` ='$buyerID' ";      
                            $buyerquery = mysqli_query($con,$buyerInfo); 
                            
                            //seller details
                            $sellerInfo = "SELECT * FROM client WHERE `user_id` ='$sellerID' ";      
                            $sellerquery = mysqli_query($con,$sellerInfo);  
                            
                            //product details
                            $productInfo = "SELECT * FROM products WHERE `productID` ='$productID' ";      
                            $productquery = mysqli_query($con,$productInfo);

                            //quantity details
                            $quantityInfo = "SELECT * FROM quantitysets WHERE `quantityID` ='$quantityID' ";      
                            $quantityquery = mysqli_query($con,$quantityInfo);
                    ?>

                    <div class="row item-row mt-0">
                        <div class="columns group">
                            <?php
                                while ($rowSeller = mysqli_fetch_assoc($sellerquery)) {                                    
                            ?>
                            <div class="column is-2">
                                <p class="mb-0 pb-0"><?php echo $rowSeller['fName'] . " " . $rowSeller['lName']?></p>
                            </div>
                            <div class="column is-3">
                                <p class="mb-0 pb-0"><?php echo $rowSeller['address1']?>,</p>
                                <p class="mb-0 pb-0"><?php echo $rowSeller['address2']?>,</p>
                                <p><?php echo $rowSeller['city']?></p>
                            </div>
                            <?php
                                }
                            
                            ?>
                            <?php
                                while ($rowProduct = mysqli_fetch_assoc($productquery)) {                                    
                            ?>
                            <div class="column is-1">
                                <p class="mb-0 pb-0"><?php echo $rowProduct['name']?></p>
                            </div>

                            <?php
                                }                                  
                            ?>
                            <?php
                                while ($rowQuantity = mysqli_fetch_assoc($quantityquery)) {
                            ?>
                            <div class="column is-1">
                                <p class="mb-0 pb-0"><?php echo $rowQuantity['quantity']?></p>
                            </div>
                            <?php
                                }
                            ?>
                            <?php
                                while ($rowBuyer = mysqli_fetch_assoc($buyerquery)) {                                    
                            ?>
                            <div class="column is-2">
                                <p class="mb-0 pb-0"><?php echo $rowBuyer['fName'] . " " . $rowBuyer['lName']?></p>
                            </div>
                            
                            <div class="column is-3">
                                <p class="mb-0 pb-0"><?php echo $rowBuyer['address1']?>,</p>
                                <p class="mb-0 pb-0"><?php echo $rowBuyer['address2']?></p>
                                <p class="mb-0 pb-0"><?php echo $rowBuyer['city']?></p>
                                <button class="button mt-1" onClick="location.href='https://localhost/vegemart/public/deliverer/delivery.php';">Accept</button>
                            </div>

                            <?php
                                }
                            }
                            ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns group">
                <div class="column is-4 pl-2">
                    <h2 style="font-size:22px;" class="has-text-left">Delivery Status</h2>
                    <div class="row">
                        <div class="card mt-1 pb-0 pl-2 pr-1">
                            <div class="columns group">
                                <div class="column is-3 pl-0 has-text-left">
                                    <i class="fa fa-motorcycle mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#3498DB;"></i>
                                </div>
                                <div class="column is-5 pl-0 has-text-left">
                                    <h2 style="font-size:22px;" class="mb-0 pb-0">343</h2>
                                    <p class="mt-0 pt-0">Total Deliveries</p>
                                </div>
                                <div class="column is-4 pl-0 has-text-left">
                                    <i class="fa fa-bar-chart mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#E5E7E9;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card mt-1 pb-0 pl-2 pr-1">
                            <div class="columns group">
                                <div class="column is-3 pl-0 has-text-left">
                                    <i class="fa fa-check-circle mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#138D75;"></i>
                                </div>
                                <div class="column is-5 pl-0 has-text-left">
                                    <h2 style="font-size:22px;" class="mb-0 pb-0">342</h2>
                                    <p class="mt-0 pt-0">Successfully Delivered</p>
                                </div>
                                <div class="column is-4 pl-0 has-text-left">
                                    <i class="fa fa-bar-chart mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#E5E7E9;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="card mt-1 pb-0 pl-2 pr-1">
                            <div class="columns group">
                                <div class="column is-3 pl-0 has-text-left">
                                    <i class="fa fa-exclamation-circle" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#EB694F ;"></i>
                                </div>
                                <div class="column is-5 pl-0 has-text-left">
                                    <h2 style="font-size:22px;" class="mb-0 pb-0">1</h2>
                                    <p class="mt-0 pt-0">Failed orders</p>
                                </div>
                                <div class="column is-4 pl-0 has-text-left">
                                    <i class="fa fa-bar-chart mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#E5E7E9;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-5 pl-1">
                    <h2 style="font-size:22px;" class="has-text-left">No of orders</h2>
                    <div class="card pl-1 pr-1 pt-1 pb-1">                       
                        <canvas id="chart"></canvas>
                    </div>
                </div>
                <div class="column is-3 pl-1 pr-2">
                    <h2 style="font-size:22px;" class="has-text-left">Total Earnings</h2>
                    <div class="card has-text-centered pt-1 pb-1 pl-1 pr-1">
                        <img id="cash" src="https://www.flaticon.com/svg/static/icons/svg/2331/2331717.svg" alt="cash">
                        <h2 style="font-size:22px;" class="has-text-centered pt-0 pb-0 mb-0">Rs. 150</h2>
                        <h3 class="has-text-centered mt-0 pt-0">December 2020</h3>
                        <hr>
                        <div class="columns group">
                            <div class="column is-6 pl-2 has-text-left">
                                <h3>Total Earnings</h3>
                            </div>
                            <div class="column is-6 pl-2 has-text-right">
                                <h3>Rs. 17,150</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var chart = new Chart('chart', {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                    {
                        barPercentage: 1,
                        barThickness: 2,
                        maxBarThickness: 3,
                        minBarLength: 1,
                        backgroundColor: '#c46998',
                        backgroundColor:'rgba(52, 152, 219, 0.3)',
                        borderColor:'rgba(52, 152, 219, 1)',
                        borderWidth: 1,
                        label: 'Number of deliveries',
                        data: [50, 25, 40, 22, 17, 38, 45, 26, 11, 46, 20, 3]
                    }
                    ]
                },
                options: {
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                            }
                        }],
                        yAxes: [{
                            ticks: {
                            beginAtZero: true
                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                            }
                        }]
                    }
                }
            });
        </script>
        <br>
        <?php include_once "../includes/footer.php"; ?>
    </body>
</html>


