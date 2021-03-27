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

        $items = "INSERT INTO `cart` (`userID`,`sellerID`,`bidID`,`productID`,`quantityID`) VALUES ('" . $userID . "','" . $sellerID . "','" . $bidID . "','" . $productID . "','" . $quantityID . "');";
        mysqli_query($con, $items);        


        //bid has been finished
        $bidStatus= "UPDATE `bidding` SET `bidStatus`=1,`notification`=1 WHERE `quantityID`='$quantityID' ";
        if ($con->query($bidStatus) === true) {
            //notification
            $notification= "UPDATE `bidding` SET `notification`=2 WHERE `bidID`='$bidID' ";
            if ($con->query($notification) === true) {
                echo "Notification has been sent you have won the bid";
                //header('Location:../public/bid.php?id=' . $productID);
            }else{
                echo "Error updating record: " . $con->error;
            }

            //quantityset should be removed
            $quantityStatus= "UPDATE `quantitysets` SET `quantitySetStatus`=1 WHERE `quantityID`='$quantityID' ";
            if ($con->query($quantityStatus) === true) {
                echo "Record updated successfully";
                header('Location:../public/bid.php?id=' . $productID);
            }else{
                echo "Error updating record: " . $con->error;
            }
        }
        else {
            echo "Error updating record: " . $con->error;
        }

        
    }    

?>