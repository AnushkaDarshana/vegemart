<?php
    include ('../../config/dbconfig.php');
    include ('../../src/session.php');
    

    $deliveryID = $_GET['id'];
    $userID = $_SESSION["loggedInDelivererID"];

    $deliveryConfirmQuery= "UPDATE `deliveries` SET `deliveryStatus`=1 WHERE `deliveryID`='$deliveryID' ";
    if ($con->query($deliveryConfirmQuery) === true) {
        echo "Record updated successfully";

        $deliveryConfirmQuery = "SELECT * FROM deliveries WHERE `deliveryID`='$deliveryID'";
        $deliveryConfirmResult = mysqli_query($con, $deliveryConfirmQuery);
        $deliveryConfirmRow = mysqli_fetch_row($deliveryConfirmResult);
        $delivererID = $deliveryConfirmRow[1];
        $orderID = $deliveryConfirmRow[2];
        $buyerID = $deliveryConfirmRow[3];
        $sellerID = $deliveryConfirmRow[4];

        //send notification to buyer
        $notification = "INSERT INTO `notification` (`type`,`forUser`,`entityID`, `notif_read`, `notif_time`) VALUES (7,'".$userID."', '".$orderID."',0, now());";
        mysqli_query($con,$notification);

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
        $vehicle = $rowDeliverer[5];    
        $vehicleNo = $rowDeliverer[6];

        $toBuyer=$email;
        $from='vegemartucsc@gmail.com';
        $subject= 'Your order has been delivered';
        $message='Order # '.$orderID.' has been delivered by '.$delivererName.'. He will be arriving by a '.$vehicle.' his vehicle no is '.$vehicleNo.' .You can contact deliverer through '.$phoneNum;
        $header="From: {$from}\r\nContent-Type: text/html;";

        $send_result=mail($toBuyer,$subject,$message,$header);  

        $toSeller=$emailSeller;
        $subjectSeller= 'Confirmation products were delivered to customer';
        $messageSeller=$delivererName.' has deliverer the products to customer. You can contact deliverer through '.$phoneNum;
        
        $send_result=mail($toSeller,$subjectSeller,$messageSeller,$header); 

        $deliveryIDQuery = mysqli_query($con, "SELECT deliveryID FROM deliveries where orderID ='$orderID'");
        $rowDeliveryID = mysqli_fetch_row($deliveryIDQuery);
        $deliveryID = $rowDeliveryID[0]; 
        
        header('Location:../../public/deliverer/delivery_done.php?id=' . $orderID);
    }
    else{
        echo "Error updating record: " . $con->error;
    }
?>