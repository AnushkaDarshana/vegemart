<?php
    include ('../../config/dbconfig.php');
    include ('../../src/session.php');

    $orderID = $_GET['id'];
    $userID = $_SESSION["loggedInDelivererID"];

    $deliveryAcceptQuery= "UPDATE `orders` SET `acceptDelivery`=1 WHERE `orderID`='$orderID' ";
    if ($con->query($deliveryAcceptQuery) === true) {
        echo "Record updated successfully";

        $orderQuery = "SELECT * FROM orders WHERE `orderID`='$orderID'";
        $orderResult = mysqli_query($con, $orderQuery);
        $orderRow = mysqli_fetch_row($orderResult);
        $buyerID = $orderRow[1];
        $sellerID = $orderRow[2];

        //get the email of the buyer
                    
        $emailQuery = mysqli_query($con, "SELECT email FROM users where id ='$buyerID'");
        $rowUserEmail = mysqli_fetch_row($emailQuery);
        $email = $rowUserEmail[0];        
            
        //get the email of the seller
                    
        $emailSellerQuery = mysqli_query($con, "SELECT email FROM users where id ='$sellerID'");
        $rowSellerEmail = mysqli_fetch_row($emailSellerQuery);
        $emailSeller = $rowSellerEmail[0]; 
        
        //deliverer details
        $delivererDetailsQuery = mysqli_query($con, "SELECT * FROM deliverer where user_id ='$userID'");
        $rowDeliverer = mysqli_fetch_row($delivererDetailsQuery);
        $delivererName = $rowDeliverer[2]; 
        $vehicleNo = $rowDeliverer[6];     
        
        
        $delivery = "INSERT INTO `deliveries` (`delivererID`,`orderID`,`buyerID`, `sellerID`) VALUES ('".$userID."', '".$orderID."','".$buyerID."','".$sellerID."');";
        mysqli_query($con,$delivery); 

        $toBuyer=$email;
        $from='vegemartucsc@gmail.com';
        $subject= 'Deliverer has accepted your delivery request';
        $message=$delivererName.' has accepted your delivery request. He is on the way to pickup your order from the seller. You can contact deliverer through '.$phoneNum;
        $header="From: {$from}\r\nContent-Type: text/html;";

        $send_result=mail($toBuyer,$subject,$message,$header);  

        $toSeller=$emailSeller;
        $subjectSeller= 'Deliverer has accepted delivery request';
        $messageSeller=$delivererName.' vehicle No '.$vehicleNo.' is on the way to pick up the order. You can contact deliverer through '.$phoneNum;
        
        $send_result=mail($toSeller,$subjectSeller,$messageSeller,$header); 

        $deliveryIDQuery = mysqli_query($con, "SELECT deliveryID FROM deliveries where orderID ='$orderID'");
        $rowDeliveryID = mysqli_fetch_row($deliveryIDQuery);
        $deliveryID = $rowDeliveryID[0]; 
        
        header('Location:../../public/deliverer/deliveryDetails.php?id=' . $deliveryID);
    }
    else{
        echo "Error updating record: " . $con->error;
    }



?>