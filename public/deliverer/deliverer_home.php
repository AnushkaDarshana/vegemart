<?php     
    include ('../../src/session.php');
    include ('../../config/dbconfig.php');
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
                echo "
                <h1 id=\"heading\" style=\"text-align:left; font-family: Candara; color: #138D75; margin:0.2em 1em 0;\">Hello ".$rowUser['fName']."! Welcome to Deliverer dashboard </h1>";
                
                if(isset($_GET["location"])){
                    $city = $_GET["location"];
                }
                else{
                    $city = $rowUser['city'];
                } 
            }
        ?>
        <div class="columns group">
            <div class="column is-3 mt-1 pl-2 pr-0">
                <h1 id="title" class="mt-1 mb-1">Select your Location</h1>
                <form class="location" method="get" action="">
                    <label class="select-box">
                        <select name="location" id="location" class="custom-select location" placeholder="Select Location" onchange='this.form.submit()'>
                            <option value='<?php echo $city ?>' selected='selected'><?php echo $city ?></option>
                            <option value="Anuradhapura">Anuradhapura</option>
                            <option value="Badulla">Badulla</option>
                            <option value="Batticaloa">Batticaloa</option>
                            <option value="Colombo">Colombo</option>
                            <option value="Galle">Galle</option>
                            <option value="Gampaha">Gampaha</option>
                            <option value="Jaffna">Jaffna</option>
                            <option value="Kalutara">Kalutara</option>
                            <option value="Kandy">Kandy</option>
                            <option value="Kegalle">Kegalle</option>
                            <option value="Kilinochchi">Kilinochchi</option>
                            <option value="Kurunegala">Kurunegala</option>
                            <option value="Mannar">Mannar</option>
                            <option value="Matale">Matale</option>
                            <option value="Matara">Matara</option>
                            <option value="Moneragala">Moneragala</option>
                            <option value="Mullaitivu">Mullaitivu</option>
                            <option value="Nuwara Eliya">Nuwara Eliya</option>
                            <option value="Polonnaruwa">Polonnaruwa</option>
                            <option value="Puttalam">Puttalam</option>
                            <option value="Ratnapura">Ratnapura</option>
                            <option value="Trincomalee">Trincomalee</option>
                            <option value="Vavuniya">Vavuniya</option>
                        </select>
                    </label>
                </form>
            </div>
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

                       // deliveries in the city deliverer staying
                        
                        $cityQuery = "SELECT productID FROM products where `city` ='$city' ";  
                        $resultCity = mysqli_query($con,$cityQuery);

                        while ($rowCityProduct = mysqli_fetch_assoc($resultCity)) {
                            $cityProductID = $rowCityProduct['productID'];                            
                
                           
                          //  deliveries available
                            $deliveries = "SELECT * FROM orders WHERE `paymentStatus` = 1 AND `delivery` = 1 AND `acceptDelivery` = 0 AND `productID`='$cityProductID'" ;
                            $deliveryquery = mysqli_query($con, $deliveries);

                            while ($rowdelivery = mysqli_fetch_assoc($deliveryquery)) {
                                $productID = $rowdelivery['productID'];
                                $orderID = $rowdelivery['orderID'];
                                $buyerID = $rowdelivery['userID'];
                                $sellerID = $rowdelivery['sellerID'];                                    
                                $quantityID = $rowdelivery['quantityID'];

                                
                                   
                                //buyer details
                                $buyerInfo = "SELECT * FROM client WHERE `user_id` ='$buyerID' ";
                                $buyerquery = mysqli_query($con, $buyerInfo);
                                
                                //seller details
                                $sellerInfo = "SELECT * FROM client WHERE `user_id` ='$sellerID' ";
                                $sellerquery = mysqli_query($con, $sellerInfo);
                                
                                //product details
                                $productInfo = "SELECT * FROM products WHERE `productID` ='$productID' ";
                                $productquery = mysqli_query($con, $productInfo);

                                //quantity details
                                $quantityInfo = "SELECT * FROM quantitysets WHERE `quantityID` ='$quantityID' ";
                                $quantityquery = mysqli_query($con, $quantityInfo); ?>

                    <div class="row item-row mt-1">
                        <div class="columns group">
                            <?php
                                while ($rowSeller = mysqli_fetch_assoc($sellerquery)) {
                                    ?>
                            <div class="column is-2">
                                <p class="mb-0 pb-0"><?php echo $rowSeller['fName'] . " " . $rowSeller['lName']?></p>
                            </div>
                            <div class="column is-3 pl-5">
                                <p style="text-align:left;" class="mb-0 pb-0"><?php echo $rowSeller['address1']?>,</p>
                                <p style="text-align:left;" class="mb-0 pb-0"><?php echo $rowSeller['address2']?>,</p>
                                <p style="text-align:left;"><?php echo $rowSeller['city']?></p>
                            </div>
                            <?php
                                } ?>
                            <?php
                                while ($rowProduct = mysqli_fetch_assoc($productquery)) {
                                    ?>
                            <div class="column is-1">
                                <p class="mb-0 pb-0"><?php echo $rowProduct['name']?></p>                                
                            </div>
                            <?php
                                 }
                                 while ($rowQuantity = mysqli_fetch_assoc($quantityquery)) {
                                    ?>
                            
                            <div class="column is-1">
                                <p class="mb-0 pb-0"><?php echo $rowQuantity['quantity']?></p>
                            </div>
                            
                            <?php
                               }
                                while ($rowBuyer = mysqli_fetch_assoc($buyerquery)) {
                                    ?>
                            <div class="column is-2">
                                <p class="mb-0 pb-0"><?php echo $rowBuyer['fName'] . " " . $rowBuyer['lName']?></p>
                            </div>
                            
                            <div class="column is-3 pl-5">
                                <p style="text-align:left;" class="mb-0 pb-0"><?php echo $rowBuyer['address1']?>,</p>
                                <p style="text-align:left;" class="mb-0 pb-0"><?php echo $rowBuyer['address2']?></p>
                                <p style="text-align:left;" class="mb-0 pb-0"><?php echo $rowBuyer['city']?></p>
                                <button class="button mt-1" onClick="location.href='https://localhost/vegemart/src/deliverer/accept_delivery.php?id=<?php echo $orderID ?>';">Accept</button>
                            </div>   
                        </div>
                    </div>
                    <?php
                           }
                         }
                        }                            
                    ?>
                </div>
            </div>
            <?php         
                $userID = $_SESSION["loggedInDelivererID"];
                //total deliveries 
                $delivery =  "SELECT COUNT(`deliveryID`) AS total
                                    FROM `deliveries` WHERE `delivererID`='$userID'"; 
                $result_del = mysqli_query($con,$delivery);
                $row_del = mysqli_fetch_assoc($result_del); 
                //successful deliveries 
                $delivery1 =  "SELECT COUNT(`deliveryID`) AS total1
                                    FROM `deliveries` WHERE `delivererID`='$userID' and `deliveryStatus` =1"; 
                $result_del1 = mysqli_query($con,$delivery1);
                $row_del1 = mysqli_fetch_assoc($result_del1);
                //failed orders 
                $delivery2 =  "SELECT COUNT(`deliveryID`) AS total2
                                    FROM `deliveries` WHERE `delivererID`='$userID' and `deliveryStatus` =0"; 
                $result_del2 = mysqli_query($con,$delivery2);
                $row_del2 = mysqli_fetch_assoc($result_del2);
                //total income 
                $delivery3 =  "SELECT COUNT(`deliveryID`) AS total3
                                FROM `deliveries` WHERE `delivererID`='$userID' and `pickupStatus` = 1 and `deliveryStatus` =0"; 
                $result_del3 = mysqli_query($con,$delivery3);
                $row_del3 = mysqli_fetch_assoc($result_del3);
                //graph 
                $delivery4= "SELECT DISTINCT city , COUNT(orderID) AS tot_count 
                        FROM `client`c, (SELECT `buyerID`, `orderID`
                                         FROM `deliveries`) b
                        WHERE b.buyerID= c.user_id 
                        GROUP BY b. orderID";
                $result_del4 = mysqli_query($con,$delivery4);
                $a=array(); 
                $b=array();   

                while($row_del4 = mysqli_fetch_assoc($result_del4)){
                array_push($a, $row_del4['city']);
                array_push($b, $row_del4['tot_count']);
                }
                $js_array_a = json_encode($a);
                $js_array_b = json_encode($b);

                
                ?>
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
                                    <h2 style="font-size:22px;" class="mb-0 pb-0"><?php echo $row_del['total'];?></h2>
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
                                    <h2 style="font-size:22px;" class="mb-0 pb-0"><?php echo $row_del1['total1'];?></h2>
                                    <p class="mt-0 pt-0">Successfully Delivered</p>
                                </div>
                                <div class="column is-4 pl-0 has-text-left">
                                    <i class="fa fa-bar-chart mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#E5E7E9;"></i>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="column is-5 pl-1">
                    <h2 style="font-size:22px;" class="has-text-left">No of Orders Based on Location</h2>
                    <div class="card pl-1 pr-1 pt-1 pb-1">                       
                        <canvas id="chart"></canvas>
                    </div>
                </div>
                <div class="column is-3 pl-1 pr-2">
                    <h2 style="font-size:22px;" class="has-text-left">On Going Deliveries</h2>
                    <div class="card has-text-centered pt-1 pb-1 pl-1 pr-1">
                        <img id="cash" src="https://www.flaticon.com/svg/static/icons/svg/3082/3082050.svg" alt="deliveries">
                        <h3 class="has-text-centered mt-0 pt-0">Year 2020</h3>
                        <hr>
                        <div class="columns group">
                            <div class="column is-6 pl-2 has-text-left">
                                <h3>In process</h3>
                            </div>
                            <div class="column is-6 pl-2 has-text-right">
                                <h3><?php echo $row_del3['total3'];?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var PieChart  = new Chart('chart', {
                type: 'pie',
                data: {
                    labels: <?php echo $js_array_a ?>,
                    datasets: [{
                        label: 'Number of orders',
                        backgroundColor: ['#76D7C4','#F9E79F', '#C0392B', '#8E44AD' ,'#FADBD8',],
                        borderWidth: 0.5,
                        data: <?php echo $js_array_b ?>
                    }]
                },
                options: {
                    title: {
                        display: true,
                    }
                }
            });
        </script>
        <br>
        <?php include_once "../includes/footer.php"; ?>
    </body>
</html>