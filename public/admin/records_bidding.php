<?php
    if(empty(session_id())){
        session_start();
    }
    include ('../../config/dbconfig.php');
    if((!isset($_SESSION["loggedInAdminID"])) && (!isset($_SESSION["loggedInCoAdminID"])))
    {
        echo "<script>
        alert('You have to login first');
        window.location.href='../../public/login.php';
        </script>";
    }  
    else if(isset($_SESSION["loggedInAdminID"])){
        $userID = $_SESSION["loggedInAdminID"];
    } 
    else if(isset($_SESSION["loggedInCoAdminID"])){
        $userID = $_SESSION["loggedInCoAdminID"];
    } 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title>Auction Records | Vegemart</title>
        <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
    </head>
    <body>
    <?php include "../includes/admin_nav.php"; ?>
        <div class="row">
            <h1 id="title" class="has-text-left ml-2 mt-1 mb-0">Auction Records</h1>
            <div class="columns group mt-0">
                
                <div class="column is-12">
                <table class="user" id="myTable">
                    <tr>
                        <th>Bid ID</th>
                        <th>Product </th>
                        <th>Buyer Name</th>
                        <th>Seller Name</th>
                        <th>Start Date & Time</th>
                        <th>End Date & Time</th>
                        <th>Total Quantity sold (kg)</th>
                        <th>Bid Amount </th>
                        <th>Bid Status</th>
                    </tr>
                    <?php
                        $sql ="SELECT * FROM `bidding`";
                        $result = mysqli_query($con,$sql);        
                        while($row = mysqli_fetch_assoc($result)) { 
                            $productID = $row['productID'];
                            $userID = $row['userID'];
                            $sellerID = $row['sellerID'];

                            echo $userID;
                            if ($row['bidStatus']== 0){
                                $bidStatus = "On Going";
                            }
                            else{
                                $bidStatus = "Finished";
                            }
                           
                            //Product Details
                            $productQuery = "SELECT * FROM `products` WHERE productID = '$productID'";
                            $resultProduct = mysqli_query($con,$productQuery);        
                            while($rowProduct = mysqli_fetch_assoc($resultProduct)) { 
                                $product = $rowProduct['name'];
                            }


                            //Buyer Details
                            $buyerQuery = "SELECT * FROM `client` WHERE user_id = '$userID'";
                            $resultBuyer = mysqli_query($con,$buyerQuery);        
                            while($rowBuyer = mysqli_fetch_assoc($resultBuyer)) { 
                                $buyer = $rowBuyer['fName'];
                            }


                            //Seller Details
                            $sellerQuery = "SELECT * FROM `client` WHERE user_id = '$sellerID'";
                            $resultSeller = mysqli_query($con,$sellerQuery);        
                            while($rowSeller = mysqli_fetch_assoc($resultSeller)) { 
                                $seller = $rowSeller['fName'];
                            }

                            $startTime = date("Y-m-d h:i:s A", strtotime($row['startTime']));
                            $endTime = date("Y-m-d h:i:s A", strtotime($row['endTime']));
                            echo "
                                <tr>
                                    <td>".$row['bidID']."</td>
                                    <td>".$product."</td>
                                    <td>".$buyer."</td>
                                    <td>".$seller."</td>                                    
                                    <td>".$startTime."</td>
                                    <td>".$endTime."</td>
                                    <td>".$row['bidQuantity']."</td>
                                    <td>".$row['bidPrice']."</td>
                                    <td>$bidStatus</td>   
                            </tr>";
                            
                            } 
                    echo "</table>";
                    ?>
                </div>
               
            </div>
        </div>
    </body>
</html>