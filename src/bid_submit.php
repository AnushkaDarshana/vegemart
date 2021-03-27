<?php
    include ('../src/session.php'); 
    include ('../config/dbconfig.php');

    if(!isset($_SESSION["loggedInUserID"]))
    {
        echo "<script>
        alert('You have to login first');
        window.location.href='../public/login.php';
        </script>";
    }   
                                
    
    else if(isset($_POST['placeBid'])){
        $productID= $_POST['productID'];
        $userID = $_POST['userID'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $quantityID = $_POST['quantityID'];
        
        //get sellerID
        $retrieveSeller =  "SELECT sellerID FROM products WHERE productID='$productID';"; //Selecting all data from Table according to sellerID
        $resultSeller = mysqli_query($con, $retrieveSeller); //Passing SQL
        while ($rowSellerID  = mysqli_fetch_assoc($resultSeller)) {  
            $sellerID = $rowSellerID['sellerID']; 

            //check whether bid has started
            $startTimeQuery = mysqli_query($con,"SELECT * FROM bidding WHERE productID='$productID' AND quantityID='$quantityID'");
         
            //bid has started
            if (mysqli_num_rows($startTimeQuery) >0) {
                $startTimeRow = mysqli_fetch_row($startTimeQuery);
                $startTime = $startTimeRow[7];
                $endTime = $startTimeRow[8];
                
                
                //new buyer cannot bid the same max bid price
                $maxBidQuery = "SELECT MAX(bidPrice) AS maxBid FROM bidding WHERE quantityID='$quantityID'";
                $resultMaxBid = mysqli_query($con, $maxBidQuery);
                while ($rowMaxBid = mysqli_fetch_assoc($resultMaxBid)) {
                    $maxBidPrice = $rowMaxBid['maxBid'];

                    if($maxBidPrice>=$price){
                        ?>
                        <script>
                        alert('Place a bid higher than the maximum bid');
                        var productID=<?php echo $productID ?>;
                        window.location.href='../public/bid.php?id='+productID;
                        </script>";
                    <?php
                    }

                    else{
                        //check whether the buyer have already bid
                        $bids = "SELECT * FROM bidding WHERE productID='$productID' AND userID='$userID' AND quantityID='$quantityID'";
                        $result = mysqli_query($con, $bids);
                    
                        //user has already bid
                        if (mysqli_num_rows($result) >0) {
                            $bidQuery = mysqli_fetch_row($result);
                            $bidID = $bidQuery[0];
                            $updateBid= "UPDATE `bidding` SET `bidPrice`='$price' WHERE `bidID`='$bidID' ";
                            if ($con->query($updateBid) === true) {
                                $message = base64_encode(urlencode("Bid Updated."));
                                header('Location:../public/bid.php?bidID=' . $bidID);
                                exit();
                            } else {
                                $message = base64_encode(urlencode("SQL Error while Adding products"));
                                header('Location:../public/bid.php?msg=' . $message);
                                exit();
                            }
                        }
                        //user has not bid yet but the bid has started
                        else {
                            $insertBid = "INSERT INTO `bidding` (`sellerID`,`productID`,`quantityID`,`userID`,`bidQuantity`,`bidPrice`,`startTime`,`endTime`) VALUES ('".$sellerID."','".$productID."','".$quantityID."','".$userID."','".$quantity."','".$price."','".$startTime."','".$endTime."');";
                            if (mysqli_query($con, $insertBid)) {
                                
                                //getting bidID
                                $bidIdQuery = mysqli_query($con, "SELECT MAX(bidID) FROM `bidding`");
                                $rowBidId = mysqli_fetch_row($bidIdQuery);
                                $bidId = $rowBidId[0];
                                $message = base64_encode(urlencode("Bid Added."));
                                header('Location:../public/bid.php?bidID=' . $bidId);
                                exit();
                            } else {
                                $message = base64_encode(urlencode("SQL Error while Adding products"));
                                header('Location:../public/bid.php?msg=' . $message);
                                exit();
                            }
                        }
                    }
                }

            }

            //Bid is not started yet
            else{

                //calculating the bid ending time
                
                $endTimeQuery = "SELECT DATE_ADD(NOW(),INTERVAL 2 HOUR) AS DateAdd;";
                $endTimeExecuteQuery = mysqli_query($con,$endTimeQuery); 
                $rowEndTime = mysqli_fetch_assoc($endTimeExecuteQuery);
                $endTime = $rowEndTime['DateAdd'];
                
                $insertBid = "INSERT INTO `bidding` (`sellerID`,`productID`,`quantityID`,`userID`,`bidQuantity`,`bidPrice`,`startTime`,`endTime`) VALUES ('".$sellerID."','".$productID."','".$quantityID."','".$userID."','".$quantity."','".$price."',NOW(),'".$endTime."');";
                if (mysqli_query($con, $insertBid)) {
                    $bidIdQuery = mysqli_query($con,"SELECT MAX(bidID) FROM `bidding`");
                    $rowBidId = mysqli_fetch_row($bidIdQuery);
                    $bidId = $rowBidId[0];                            
                    $message = base64_encode(urlencode("Bid Added."));
                    header('Location:../public/bid.php?bidID=' . $bidId);
                    exit();
                }
                else{                           
                    $message = base64_encode(urlencode("SQL Error while Adding products"));
                    header('Location:../public/bid.php?msg=' . $message);
                    exit();
                }
            }
            
        }
    }
    mysqli_close($con);
?>