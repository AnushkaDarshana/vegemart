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
        <title>Payment Records | Vegemart</title>
        <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
    </head>
    <body>
        <?php include "../includes/admin_nav.php"; ?>
        <div class="row">
            <h1 id="title" class="has-text-left ml-2 mt-1 mb-0">Payment Records</h1>
            <div class="columns group mt-0">
                <div class="column is-1"></div>
                <div class="column is-10 pl-1">
                    <table class="user" id="myTable">
                        <tr>
                            <th>Order ID</th>
                            <th>Product Ordered </th>
                            <th>In City</th>
                            <th>Availability </th>
                            <th>Expiry Date & time</th>
                            <th>Total Payment (Rs.)</th>

                        </tr>
                        <?php
                        $sql ="SELECT pr. `orderID`, name,city, availability, expiredate, pr.`paid_amount`
                        FROM products q, (SELECT `productID`, o.`orderID`, p.`paid_amount`
                                        FROM orders o, (SELECT `orderID`, `paid_amount` 
                                                        FROM `payment`) p
                                        WHERE o.orderID= p.orderID) pr
                        WHERE pr.`productID`= q.`productID`";

                        $result = mysqli_query($con,$sql);        
                        while($row = mysqli_fetch_assoc($result)) { 
                            if ($row['availability']== 1){
                                $availability = "Available";
                            }
                            else{
                                $availability = "Unavailable";
                            }
                            
                            echo "
                                <tr>
                                    <td>".$row['orderID']."</td>
                                    <td>".$row['name']."</td>
                                    <td>".$row['city']."</td>
                                    <td>$availability</td>
                                    <td>".$row['expiredate']."</td>
                                    <td>".$row['paid_amount']."</td>  
                            </tr>";
                            
                            } 
                    echo "</table>";
                    ?>
                </div>
                <div class="column is-1"></div>
            </div>
            <br><br>
        </div>
    </body>
</html>