<?php
    include ('../../config/dbconfig.php');
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
                <div class="column is-1"></div>
                <div class="column is-10 pl-1">
                <table class="user" id="myTable">
                    <tr>
                        <th>Bid ID</th>
                        <th>Product ID </th>
                        <th>Buyer ID</th>
                        <th>Seller ID</th>
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
                            if ($row['bidStatus']== 1){
                                $bidStatus = "On Going";
                            }
                            else{
                                $bidStatus = "Not On Going";
                            }
                            
                            echo "
                                <tr>
                                    <td>".$row['bidID']."</td>
                                    <td>".$row['productID']."</td>
                                    <td>".$row['userID']."</td>
                                    <td>".$row['sellerID']."</td>
                                    <td>".$row['startTime']."</td>
                                    <td>".$row['endTime']."</td>
                                    <td>".$row['bidQuantity']."</td>
                                    <td>".$row['bidPrice']."</td>
                                    <td>$bidStatus</td>   
                            </tr>";
                            
                            } 
                    echo "</table>";
                    ?>
                </div>
                <div class="column is-1"></div>
            </div>
        </div>
    </body>
</html>