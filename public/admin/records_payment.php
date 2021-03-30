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
                            <th>Date</th>
                            <th>Client Name</th>
                            <th>Client Type</th>
                            <th>Paid for</th>
                            <th>Total Payment (Rs.)</th>

                        </tr>
                        <tr>                  
                            <td>#0001</td>
                            <td>17.11.2020</td>
                            <td>Kamala Perera</td>
                            <td>Buyer</td>
                            <td>Order</td>
                            <td>740</td>
                        </tr>
                        <tr>                  
                            <td>#0002</td>
                            <td>18.11.2020</td>
                            <td>Amal Fernando </td>
                            <td>Seller</td>
                            <td>Advertisement</td>
                            <td>100</td>
                        </tr>
                        <tr>                  
                            <td>#0003</td>
                            <td>21.11.2020</td>
                            <td>Nimal Bandara</td>
                            <td>Buyer</td>
                            <td>Order</td>
                            <td>560</td>   
                        </tr>
                        <tr>                  
                            <td>#0004</td>
                            <td>23.11.2020</td>
                            <td>Nimal Bandara</td>
                            <td>Buyer</td>
                            <td>Order</td>
                            <td>450</td>
                        </tr>
                        <tr>                  
                            <td>#0005</td>
                            <td>29.11.2020</td>
                            <td>Prem Raj</td>
                            <td>Seller</td>
                            <td>Advertisement</td>
                            <td>150</td>
                        </tr>
                        <tr>                  
                            <td>#0006</td>
                            <td>02.12.2020</td>
                            <td>Randimal Perera</td>
                            <td>Seller</td>
                            <td>Advertisement</td>
                            <td>120</td>
                        </tr>
                    </table>
                </div>
                <div class="column is-1"></div>
            </div>
            <br><br>
        </div>
    </body>
</html>