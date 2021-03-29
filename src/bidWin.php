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
        $bidPrice = $rowWinBid["bidPrice"];
        
        //date that notification will be sent your account will be suspended if you don't do the payment within 2 days
        $cartExpirationDateQuery = "SELECT DATE_ADD(NOW(),INTERVAL 2 MINUTE) AS DateAdd;";
        $cartExpirationDateResult = mysqli_query($con,$cartExpirationDateQuery); 
        $rowCartExpirationDate = mysqli_fetch_assoc($cartExpirationDateResult);
        $cartExpirationDate = $rowCartExpirationDate['DateAdd'];

        $items = "INSERT INTO `orders` (`userID`,`sellerID`,`bidID`,`productID`,`quantityID`,`notifyDate`) VALUES ('" . $userID . "','" . $sellerID . "','" . $bidID . "','" . $productID . "','" . $quantityID . "','" . $cartExpirationDate . "');";
        mysqli_query($con, $items);
        
        $resultQuery= "UPDATE `bidding` SET `result`=1 WHERE `bidID`='$bidID' ";
        if ($con->query($resultQuery) === true) {
            echo "Record updated successfully";  

            $userIDQuery = mysqli_query($con, "SELECT userID FROM bidding where bidID ='$bidID'");
            $rowUser = mysqli_fetch_row($userIDQuery);
            $userID = $rowUser[0];
        
            $emailQuery = mysqli_query($con, "SELECT email FROM users where id ='$userID'");
            $rowUserEmail = mysqli_fetch_row($emailQuery);
            $email = $rowUserEmail[0];


            $productNameQuery = mysqli_query($con, "SELECT `name` FROM products where productID ='$productID'");
            $rowProductName = mysqli_fetch_row($productNameQuery);
            $productName = $rowProductName[0];    

            
            $to=$email;
            $from='vegemartucsc@gmail.com';
            $subject= 'Action needed:pay Rs.'.$bidPrice.' to complete your purchase for'.$productName;
            $message='You have won the bid on, '.$productName.'. If delivery is required another Rs.50.00 will be added';
            $header="From: {$from}\r\nContent-Type: text/html;";

            $send_result=mail($to,$subject,$message,$header);  


        }
        else{
            echo "Error updating record: " . $con->error;
        }
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