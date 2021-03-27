<?php
    include ('../src/session.php'); 
    include ('../config/dbconfig.php');

    $bidID = $_GET['id'];
    
    $winBidDetailsQuery = "SELECT * FROM bidding WHERE bidID='$bidID'";
    $winBidDetailsResult = mysqli_query($con, $winBidDetailsQuery);
    while ($rowWinBid  = mysqli_fetch_assoc($winBidDetailsResult)) {

        $quantityID = $rowWinBid["quantityID"];
        $userID = $rowWinBid["userID"];
        $sellerID = $rowWinBid["sellerID"];
        $productID = $rowWinBid["productID"];

        $items = "INSERT INTO `orders` (`userID`,`sellerID`,`bidID`,`productID`,`quantityID`) VALUES ('" . $userID . "','" . $sellerID . "','" . $bidID . "','" . $productID . "','" . $quantityID . "');";
        mysqli_query($con, $items);        


        //bid has been finished
        $bidStatus= "UPDATE `bidding` SET `bidStatus`=1 WHERE `quantityID`='$quantityID' ";
        if ($con->query($bidStatus) === true) {
            //quantityset should be removed
            $quantityStatus= "UPDATE `quantitysets` SET `quantitySetStatus`=1 WHERE `quantityID`='$quantityID' ";
            if ($con->query($quantityStatus) === true) {

                //checkwhether quantitysets remaining for the product
                $quantitySetQuery = "SELECT * FROM `quantitysets` WHERE productID='".$productID."' AND quantitySetStatus=0";
                $resultQuantitySet = mysqli_query($con, $quantitySetQuery);

                if (mysqli_num_rows($resultQuantitySet) <1) {
                    $productAvailability= "UPDATE `products` SET `availability`=0 WHERE `productID`='$productID' ";
                    if ($con->query($productAvailability) === true) {
                        echo "Record updated successfully";
                        header('Location:../public/products.php');
                    }
                    else{
                        echo "Error updating record: " . $con->error;
                    }
                }
                else{
                    header('Location:../public/bid.php?id=' . $productID);
                }
                
                echo "Record updated successfully";
                //
            }else{
                echo "Error updating record: " . $con->error;
            }
        }
        else {
            echo "Error updating record: " . $con->error;
        }

        
    }    

?>