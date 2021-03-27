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
                <th>Date</th>
                <th>Start Time</th>
                <th>Product Name</th>
                <th>Total Quantity sold (kg)</th>
                <th>Highest Bidder</th>
                <th>Highest Bid</th>
                <th> </th>
            </tr>
        
            <?php
    
                $sql ="SELECT * FROM `bidding`";
                $result = mysqli_query($con,$sql);        
                while($row = mysqli_fetch_assoc($result)){ 
            
                    echo "
                        <tr>
                            <td>".$row['bidID']."</td>
                            <td>".$row['date']."</td>
                            <td>".$row['startTime']."</td>
                            <td>".$row['bidQuantity']."</td>
                            <td>".$row['userID']."</td>
                            <td>".$row['bidPrice']."</td>
                        </tr>";
                    
                    } 
            echo "</table>";
            ?>

                    <table class="user" id="myTable">
                        <tr>
                            <th>Bid ID</th>                           
                            <th>Date</th>
                            <th>Start Time</th>
                            <th>Product Name</th>
                            <th>Total Quantity sold (kg)</th>
                            <th>Highest Bidder</th>
                            <th>Highest Bid</th>
                            <th></th>
                        </tr>
                        <tr>                  
                            <td>#5627481</td>
                            <td>15.11.2020</td>
                            <td>01.45 PM</td>
                            <td>Potato</td>                         
                            <td>8</td>
                            <td>Kamal Silva</td>
                            <td>65</td>
                            <td class="has-text-centered"><a href="#">View All participants</a></td>
                        </tr>
                        <tr>                  
                            <td>#4596328</td>
                            <td>18.11.2020</td>
                            <td>10.20 AM</td>
                            <td>Tomato</td>                         
                            <td>15</td>
                            <td>Namal Perera</td>
                            <td>45</td>
                            <td class="has-text-centered"><a href="#">View All participants</a></td>
                        </tr>
                        <tr>                  
                            <td>#8542369</td>
                            <td>22.11.2020</td>
                            <td>5.10 PM</td>
                            <td>Beetroot</td>                         
                            <td>5</td>
                            <td>Sunimal  Silva</td>
                            <td>60</td>
                            <td class="has-text-centered"><a href="#">View All participants</a></td>
                        </tr>
                        <tr>                  
                            <td>#1258963</td>
                            <td>29.11.2020</td>
                            <td>9.00 AM</td>
                            <td>Cabbage</td>                         
                            <td>14</td>
                            <td>Amal Fernando</td>
                            <td>75</td>
                            <td class="has-text-centered"><a href="#">View All participants</a></td>
                        </tr>
                        <tr>                  
                            <td>#4519673</td>
                            <td>02.12.2020</td>
                            <td>4.30 PM</td>
                            <td>Onions</td>                         
                            <td>20</td>
                            <td>Vikram Prabath</td>
                            <td>50</td>
                            <td class="has-text-centered"><a href="#">View All participants</a></td>
                        </tr>
                    </table>
                </div>
                <div class="column is-1"></div>
            </div>
            <br><br>
        </div>
    </body>
</html>