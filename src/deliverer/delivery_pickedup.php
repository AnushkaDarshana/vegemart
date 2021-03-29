<?php
    include ('../../config/dbconfig.php');
    include ('../../src/session.php');

    $deliveryID = $_GET['id'];
    $userID = $_SESSION["loggedInDelivererID"];

    $deliveryPickupQuery= "UPDATE `deliveries` SET `pickupStatus`=1 WHERE `deliveryID`='$deliveryID' ";
    if ($con->query($deliveryPickupQuery) === true) {
        echo "Record updated successfully";

        $pickupQuery = "SELECT * FROM deliveries WHERE `deliveryID`='$deliveryID'";
        $pickupResult = mysqli_query($con, $pickupQuery);
        $pickupRow = mysqli_fetch_row($pickupResult);
        $delivererID = $pickupRow[1];
        $orderID = $pickupRow[2];
        $buyerID = $pickupRow[3];
        $sellerID = $pickupRow[4];

        //get the email of the buyer
                    
        $emailQuery = mysqli_query($con, "SELECT email FROM users where id ='$buyerID'");
        $rowUserEmail = mysqli_fetch_row($emailQuery);
        $email = $rowUserEmail[0];        
            
        //get the email of the seller
                    
        $emailSellerQuery = mysqli_query($con, "SELECT email FROM users where id ='$sellerID'");
        $rowSellerEmail = mysqli_fetch_row($emailSellerQuery);
        $emailSeller = $rowSellerEmail[0]; 
        
        //deliverer details
        $delivererDetailsQuery = mysqli_query($con, "SELECT * FROM deliverer where user_id ='$delivererID'");
        $rowDeliverer = mysqli_fetch_row($delivererDetailsQuery);
        $delivererName = $rowDeliverer[2];  
        $phoneNum = $rowDeliverer[4];    
        
        $toBuyer=$email;
        $from='vegemartucsc@gmail.com';
        $subject= 'Deliverer has picked up your order';
        $message='Order # '.$orderID.' has been picked from the seller by '.$delivererName.'. He will be arriving shortly. You can contact deliverer through '.$phoneNum;
        $header="From: {$from}\r\nContent-Type: text/html;";

        $send_result=mail($toBuyer,$subject,$message,$header);  

        $toSeller=$emailSeller;
        $subjectSeller= 'Confirmation your products were pickedup';
        $messageSeller=$delivererName.' has picked the products.';
        
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