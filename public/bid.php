<?php
ob_start();
include('../config/dbconfig.php');
include('../src/session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="./css/bid.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <title>Auction | Vegemart</title>
</head>

<body>
<?php 
    if (isset($_SESSION["loggedInUserID"])) {
        include_once "./includes/nav.php";
    }
    else{
        include_once "./includes/index_nav.php";
    }
    ?>
    <div class="heading">
        <h1 class="mt-1 mb-1 pt-0 ml-2 has-text-left" id="title">Bid now!</h1>
    </div>

    <div class="columns group mt-0 mb-0">
        <div class="column is-1"></div>
        <div class="column is-10">
            <table>
                <th><p class="sub" >Seller Name</p></th>
                <th><p class="sub" >Seller Location</p></th>
                <th><p class="sub" >Product auctioned</p></th>
                
                <tr>
                    <td>
                    <?php
                        if(isset($_SESSION["loggedInUserID"]) )
                        {
                            $userID = $_SESSION["loggedInUserID"];
                        }
                        
                        if(isset($_GET['id'])){
                            $productID = $_GET['id'];
                        }
                        elseif(isset($_GET['bidID'])){
                            $bidID = $_GET['bidID'];
                            $bidQuantityQuery = "SELECT productID FROM bidding WHERE bidID='$bidID'";
                            $resultBid = mysqli_query($con, $bidQuantityQuery);
                            while ($rowProductID  = mysqli_fetch_assoc($resultBid)) {
                                $productID=$rowProductID['productID'];
                                
                            }
                        }
                        include('../src/seller/seller_dashboard/seller_details.php');
                        while ($rowUser  = mysqli_fetch_assoc($resultSeller)) {
                        ?>
                        
                        <form action="seller/seller_home.php" method="POST">
                            <!-- seller name -->
                            <h3><?php echo $rowUser['fName'] . " " . $rowUser['lName'] ?></h3>
                            <input type="hidden" id="sellerID" name="sellerID" value="<?php echo $rowUser['user_id'] ?>" required /><br>
                        </form>
                    </td>
                    <td>
                        <h3><?php echo $rowUser['address1'] ?></h3>
                        <h3><?php echo $rowUser['address2'] ?>,</h3>
                        <h3><?php echo $rowUser['city'] ?></h3>
                    <?php
                        }
                    ?>
                    </td>
                    <td>
                    <?php
                        
                        include('../src/products.php');
                        while ($rowProduct  = mysqli_fetch_assoc($resultProduct)) {
                    ?>
                        <h3><?php echo $rowProduct['name'] ?></h3>
                        <img class="item-image" src="https://localhost/vegemart/public/images/products/<?php echo $rowProduct['imageName'] ?>" alt="product">
                    </td>
                    
                </tr>
            </table>
        </div>
        <div class="column is-1"></div>
    </div>
    <div class="row mt-0">
        <p style="color: red; text-align:center;">Caution! Once you win a bid, You cannot remove the won item from your cart.</p>
    </div>

    <div class="columns group mt-0">
        <div class="column is-4 mr-0 pr-0 mt-0">
            <div class="bid-card mb-1">
                <div class="columns group has-text-centered pl-1 pr-1 mb-1 mt-0">
                    <div class="row mt-0 pl-2">
                        <p style="color: red; text-align:left;">Bidding quantity should be selected from here</p>
                    </div>
                    <div class="columns group ">
                        <table class="user has-text-centered" id="myTable">
                            <th>
                                <p class="sub" style="text-align:centered; padding:0 1em;">Minimum price (Rs.)</p>
                            </th>
                            <th>
                                <p class="sub" style="text-align:centered; padding:0 1em;">Quantity (kg)</p>
                            </th>
                            <?php
                            //retrieve quantity sets
                            $quantitySetQuery = "SELECT * FROM quantitysets where `productID` ='$productID' AND quantitySetStatus=0";
                            $quantitySetExecuteQuery = mysqli_query($con, $quantitySetQuery);
                            while ($rowquantitySet = mysqli_fetch_assoc($quantitySetExecuteQuery)) {
                            ?>

                                <tr style="cursor:pointer; font-size:20px;">
                                    <td class><?php echo $rowquantitySet['minPrice'] ?></td>
                                    <td><?php echo $rowquantitySet['quantity'] ?></td>
                                    <td style="display:none"><?php echo $rowquantitySet['quantityID'] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>

                    <script>
                        var table = document.getElementById('myTable');

                        for (var i = 1; i < table.rows.length; i++) {
                            table.rows[i].onclick = function() {
                                document.getElementById("quantity").value = this.cells[1].innerHTML;
                                document.getElementById("quantityID").value = this.cells[2].innerHTML;
                                document.getElementById("minPrice").value = this.cells[0].innerHTML;
                            };
                        }
                    </script>
                </div>
            </div>

            <div class="bid-card mt-1 mb-1">
                <div class="row">
                    <p style="color: red; text-align:center;">Caution! You can only change the bidding price.</p>

                    <div class="columns group mt-0 ml-1 has-text-centered">
                        <div class="column is-7 pl-1 mt-1 mb-0">
                            <p class="sub mb-1" style="text-align:left; padding:0 0.1em;">Enter Bid Quantity(kg)</p>
                            <p class="sub pt-1" style="text-align:left; padding:0 0.1em;">Enter Bid Price(Rs.)</p>
                        </div>
                        <div class="column is-5 pl-1 mt-1 mb-0">
                            <form action="../src/bid_submit.php" method="post">
                                <input class="input-box mt-1 mb-1" style="max-width: 120px;" type="number" name="quantity" id="quantity" placeholder="Quantity(kg)" readonly=true>
                                <input class="input-box" style="max-width: 120px;" type="number" name="price" id="minPrice" placeholder="Bid Price(Rs.)" min="100" step="5">
                                <input type="hidden" name="quantityID" id="quantityID" readonly=true>   
                                <input type="hidden" name="productID" value="<?php echo $productID ?>">                                
                                <input type="hidden" name="userID" value="<?php echo $_SESSION["loggedInUserID"] ?>"><br>                                
                        </div>
                    </div>
                    <div class="has-text-centered">
                        <input class="form-button mt-1" type="submit" name="placeBid" formaction="../src/bid_submit.php" value="Bid Now"><br>
                    </div>
                    
                    </form>
                </div>
    
            <?php
            }
            ?>
            </div>
        </div>

        <?php
            $bidingQuery = "SELECT * FROM bidding WHERE productID='$productID' AND bidStatus=0 GROUP BY quantityID";
            $resultBidding = mysqli_query($con, $bidingQuery);
            while ($rowBids = mysqli_fetch_assoc($resultBidding)) {
                $endTime = date("h:i:s A", strtotime($rowBids['endTime']));
                $quantityID = $rowBids['quantityID'];
                $quantityQuery = "SELECT * FROM quantitysets WHERE quantityID='$quantityID'";
                $resultQuantity = mysqli_query($con, $quantityQuery);
                while ($rowQuantity = mysqli_fetch_assoc($resultQuantity)) {
            ?>
            <div class="column is-8 pl-0 pr-1 mt-0">
                <div class="bid-card">
                    <div class="row mt-0" id="bid-section">
                        <div class="columns group mt-0">
                            <div class="column is-3 pl-0 mt-0">
                                <p class="sub" style="text-align:left; padding:0 0.2em;"><i style="text-align:center; margin:0.4em;" class="fas fa-hourglass-start"></i>Auction End Time</p>
                                <h4 class="mb-0 mt-0 pl-1" style="text-align:center; padding:0.1em;"><?php echo $endTime ?></h4>
                            </div>

                            <?php
                                //get MAX BidID
                                
                                $maxBidQuery = "SELECT * FROM bidding WHERE bidPrice=( SELECT MAX(bidPrice) AS maxBid FROM bidding WHERE quantityID = '$quantityID')";
                                $resultMaxBid = mysqli_query($con, $maxBidQuery);
                                while ($rowMaxBid = mysqli_fetch_assoc($resultMaxBid)) {
                                    $maxBidID = $rowMaxBid['bidID'];
                                }
                                
                                $minBidQuery = "SELECT MIN(bidID) AS bidID FROM bidding WHERE quantityID='$quantityID'";
                                $resultMinBid = mysqli_query($con, $minBidQuery);
                                while ($rowMinBid = mysqli_fetch_assoc($resultMinBid)) {
                                    $minBidID = $rowMinBid['bidID'];
                                    $maxBidDetailsQuery = "SELECT unix_timestamp(endTime) * 1000 as stamp FROM bidding WHERE bidID='$minBidID';";                                    
                                    $maxBidDetailsResult = mysqli_query($con, $maxBidDetailsQuery);
                                    while ($rowMaxBidDetailsResult = mysqli_fetch_assoc($maxBidDetailsResult)) {
                                       // $bidID = $rowMaxBidDetailsResult['bidID']; 
                                        //echo $rowMaxBidDetailsResult['stamp'];
                                       
                            ?>
                            <div class="column is-3 pl-1 mt-0">
                                <p class="sub" style="text-align:left; padding:0 0.1em;"><i style="text-align:center; margin:0.4em ;" class="fas fa-hourglass-start"></i>Time Left</p>
                                <h4 class="mb-0 mt-0 pl-1" id="demo<?=$minBidID?>" style="text-align:center; padding:0.1em;"></h4>
                            </div>
                            <script>
                                // Set the date we're counting down to
                                
                                var countDownDate<?=$minBidID?> = new Date(<?=$rowMaxBidDetailsResult['stamp']?>).getTime();
                               
                                // Update the count down every 1 second
                                var x = setInterval(function() {

                                    // Get today's date and time
                                    var now = new Date().getTime();
                                                
                                            // Find the distance between now and the count down date
                                    var distance<?=$minBidID?> = countDownDate<?=$minBidID?> - now;
                                                
                                            // Time calculations for days, hours, minutes and seconds
                                            var days = Math.floor(distance<?=$minBidID?> / (1000 * 60 * 60 * 24));
                                            var hours = Math.floor((distance<?=$minBidID?> % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                            var minutes = Math.floor((distance<?=$minBidID?> % (1000 * 60 * 60)) / (1000 * 60));
                                            var seconds = Math.floor((distance<?=$minBidID?> % (1000 * 60)) / 1000);
                                                
                                            // Output the result in an element with id="demo"
                                            document.getElementById("demo<?=$minBidID?>").innerHTML = hours + "h "
                                            + minutes + "m " + seconds + "s ";
                                                
                                            
                                            // If the count down is over, highest bidder will win the bid
                                            if (distance<?=$minBidID?> < 0) {
                                                clearInterval(x);                                                
                                                var maxBidID=<?php echo $maxBidID ?>;
                                                window.location.href='../src/bidWin.php?id='+maxBidID;                                                                                          
                                            }
                                            }, 1000);
                                            </script>
                            <?php
                                    }
                                
                                }
                            ?>
                            
                            
                            
                            <div class="column is-2 mt-0">
                                <p class="sub" style="text-align:left; padding:0 0.1em;">Quantity</p>
                                <h3 class="mb-0 mt-0 pl-1" style="text-align:center; padding:0.1em;"><?php echo $rowQuantity['quantity'] ?>kg</h3>
                            </div>
                            <?php
                                $userBidQuery = "SELECT * FROM bidding WHERE quantityID='$quantityID' AND userID = '$userID'";
                                $resultUserBid = mysqli_query($con, $userBidQuery);

                                if (mysqli_num_rows($resultUserBid) >0) {
                                    while ($rowUserBid = mysqli_fetch_assoc($resultUserBid)) {
                                        $userBidPrice = $rowUserBid['bidPrice']; 
                            ?>
                                    <div class="column is-2 mt-0">
                                        <p class="sub" style="text-align:left; padding:0 0.1em;">Your Bid</p>
                                        <h3 class="mb-0 mt-0 pl-1" style="text-align:center; padding:0.1em;">Rs. <?php echo $userBidPrice  ?>.00</h3>
                                    </div>
                            <?php
                                    }
                                }                            
                                else{
                            ?>
                                    <div class="column is-2 mt-0">
                                        <p class="sub" style="text-align:left; padding:0 0.1em;">Your Bid</p>
                                        <h3 class="mb-0 mt-0 pl-1" style="text-align:center; padding:0.1em;">--</h3>
                                    </div>
                            <?php
                                }
                            ?>

                            <?php
                                $maxBidQuery = "SELECT MAX(bidPrice) AS maxBid FROM bidding WHERE quantityID='$quantityID'";
                                $resultMaxBid = mysqli_query($con, $maxBidQuery);
                                while ($rowMaxBid = mysqli_fetch_assoc($resultMaxBid)) {
                                    $maxBidPrice = $rowMaxBid['maxBid'];
                            ?>
                            <div class="column is-2 mt-0">
                                <p class="sub" style="text-align:left; padding:0 0.1em;">Best bid</p>
                                <h3 class="mb-0 mt-0 pl-1" style="text-align:center; padding:0.1em;">Rs. <?php echo $maxBidPrice  ?>.00</h3>
                            </div>

                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        <?php
                }
            }
        ?>
        
    </div>
    </div>
    <br>
    

    <a class="button" href="#popup1">bid win</a>
    <div id="popup1" class="overlay">
        <div class="popup">
            <a class="close" href="#">&times;</a>
            <h2 class="has-text-centered">Congratulation!! You won the bid!</h2>
            <img class="popup-pic has-text-centered" src="https://www.flaticon.com/svg/static/icons/svg/744/744970.svg">
            <div class="content has-text-centered">
                <?php
                $bid = "SELECT * FROM bidding WHERE productID='$productID' AND amount=(SELECT MAX(amount) AS amount FROM bidding WHERE productID='$productID');";
                $bidQuery = mysqli_query($con, $bid);
                while ($rowBid  = mysqli_fetch_assoc($bidQuery)) {
                    $userID = $rowBid['userID'];
                    $user = "SELECT * FROM client WHERE user_id='$userID'";
                    $userQuery = mysqli_query($con, $user);
                    while ($rowUser  = mysqli_fetch_assoc($userQuery)) {
                        $product = "SELECT * FROM products WHERE productID='$productID'";
                        $productQuery = mysqli_query($con, $product);
                        while ($rowProduct  = mysqli_fetch_assoc($productQuery)) {
                ?>
                            <p>You have recieved the item <?php echo $rowProduct['name'] ?> for Rs. <?php echo $rowBid['amount'] ?>.00</p>
                            <p>This item is added to your cart</p>
                            <form action="" method="POST">
                                <div class="has-text-centered mt-1">
                                    <input type="hidden" name="bidID" value="<?php echo $rowBid['bidID'] ?>">
                                    <input type="hidden" name="productID" value="<?php echo $rowBid['productID'] ?>">
                                    <input type="hidden" name="userID" value="<?php echo $rowBid['userID'] ?>">
                                    <input type="submit" name="won" class="button" value="Go to Shopping cart">
                                </div>
                            </form>
                <?php
                        }
                    }
                }
                ?>
                <p>To view your items click the button below</p>

            </div>
        </div>
    </div>

    <a class="button" href="#popup2">bid loss</a>
    <div id="popup2" class="overlay">
        <div class="popup">
            <a class="close" href="#">&times;</a>
            <h2 class="has-text-centered">Sorry! You lost the bid!</h2>
            <img class="popup-pic has-text-centered" src="https://www.flaticon.com/svg/static/icons/svg/1048/1048203.svg">
            <div class="content has-text-centered">
                <p>Unfortunatley You have lost the bid for item Potato</p>
                <p>To shop for more items click the button below</p>
                <div class="has-text-centered mt-1">
                    <button class="button" onClick="location.href='https://localhost/vegemart/public/shopping_cart.php?';"><i class="fas fa-shopping-basket mr-1"></i></i>Browse more products</button>
                </div>
            </div>
        </div>
    </div>


    </script>
        <?php include_once "./includes/footer.php"; ?>
    </body>
</html>

<?php
    if (isset($_POST["won"])) {
        $bidID = $_POST["bidID"];
        $productID = $_POST["productID"];
        $userID = $_POST["userID"];
        $items = "INSERT INTO `cart` (`userID`,`bidID`,`productID`) VALUES ('" . $userID . "','" . $bidID . "','" . $productID . "');";
        mysqli_query($con, $items);
        header('Location:shopping_cart.php');
    }
    ob_end_flush();
?>