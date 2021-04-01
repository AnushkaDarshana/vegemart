<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/my-deliveries.css">
        <link rel="stylesheet" href="../css/style.css"> 
        <link rel="stylesheet" href="../css/footer.css">
        <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <title>My Deliveries | Vegemart</title>
    </head>
    <body>
        <?php include "./deliverer_nav.php"; ?>

        <div class="row">
            <h1 id="heading">My Deliveries</h1>
            <br>
            <div class="columns group mt-0">
                <div class="column is-1 mt-0"></div>
                <div class="column is-10 mt-0">
                    <table>
                        <tr>
                            <th>Seller Name</th>
                            <th>Picked up Location</th>
                            <th>Buyer Name</th>
                            <th>Delivered Location</th>                         
                            
                        </tr>
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
            
                            $userID = $_SESSION["loggedInDelivererID"];
                            $delivery = "SELECT * FROM deliveries WHERE `delivererID` ='$userID' AND deliveryStatus=1";
                            $deliveryresult = mysqli_query($con, $delivery);
    
                            while ($rowdelivery = mysqli_fetch_assoc($deliveryresult)) {
                                $buyerID = $rowdelivery['buyerID'];
                                $sellerID = $rowdelivery['sellerID'];
            
                                //buyer details
                                $buyerInfo = "SELECT * FROM client WHERE `user_id` ='$buyerID' ";
                                $buyerquery = mysqli_query($con, $buyerInfo);
                                            
                                //seller details
                                $sellerInfo = "SELECT * FROM client WHERE `user_id` ='$sellerID' ";
                                $sellerquery = mysqli_query($con, $sellerInfo);

                                while ($rowSeller = mysqli_fetch_assoc($sellerquery)) {?>
                            <tr>
                        
                                <td><?php echo $rowSeller['fName'] . " " . $rowSeller['lName'] ?></td>
                                <td><?php echo $rowSeller['address1'] . ", " . $rowSeller['address2'] . ", " . $rowSeller['city'] ?></td>
                                <?php
                                }
                                while ($rowUser = mysqli_fetch_assoc($buyerquery)) {
                                    ?>
                                <td><?php echo $rowUser['fName'] . " " . $rowUser['lName'] ?></td>
                                <td><?php echo $rowUser['address1'] . ", " . $rowUser['address2'] . ", " . $rowUser['city'] ?></td>
                                <?php
                                }
                            }
                            ?>                            
                            </tr>
                        
                        
                    </table><br><br>
                </div>
                <div class="column is-1 mt-0">
                    <button onclick="topFunction()" id="toTopBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>   
                </div>
            </div>
            
            
            <script>
                var mybutton = document.getElementById("toTopBtn");

                window.onscroll = function() {scrollFunction()};

                function scrollFunction() {
                if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 250) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
                }

                function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
                }
                </script>

        </div>
        <?php include_once "../includes/footer.php"; ?>    
    </body>
</html>