<?php    
    include ('../src/session.php'); 
    include ('../config/dbconfig.php');

    $orderID=$_GET['order_id'];
    $amount=$_GET['amount'];
    
    $payment = "INSERT INTO `payment` (`orderID`,`paid_amount`) VALUES ('" . $orderID . "','" . $amount . "');";
    mysqli_query($con, $payment);

    $orderStatus= "UPDATE `orders` SET `paymentStatus`=1 WHERE `orderID`='$orderID' ";
    if ($con->query($orderStatus) === true) {

            $userIDQuery = mysqli_query($con, "SELECT userID FROM orders where orderID ='$orderID'");
            $rowUser = mysqli_fetch_row($userIDQuery);
            $userID = $rowUser[0];
        
            $emailQuery = mysqli_query($con, "SELECT email FROM users where id ='$userID'");
            $rowUserEmail = mysqli_fetch_row($emailQuery);
            $email = $rowUserEmail[0];


            $userNameQuery = mysqli_query($con, "SELECT fName FROM client where user_id ='$userID'");
            $rowUserName = mysqli_fetch_row($userNameQuery);
            $user = $rowUserName[0];      

            $to=$email;
            $from='vegemartucsc@gmail.com';
            $subject= $orderID.' order has been confirmed';
            $message='Thanks for the purchase, '.$user.'! Your order is confirmed';
            $header="From: {$from}\r\nContent-Type: text/html;";

            $send_result=mail($to,$subject,$message,$header);
            
        $bidIDQuery = mysqli_query($con, "SELECT bidID FROM orders where orderID ='$orderID'");
        while ($rowBidID  = mysqli_fetch_assoc($bidIDQuery)) {
            $bidID = $rowBidID['bidID'];  
            $bidPriceQuery = mysqli_query($con, "SELECT bidPrice FROM bidding where bidID ='$bidID'");
            $resultBidPrice = mysqli_fetch_row($bidPriceQuery);
            $rowBidPrice = $resultBidPrice[0];
                
            if($rowBidPrice==$amount){
                header('Location:../public/order_done_self.php?id=' . $orderID);
            }
            else{
                $deliveryStatus= "UPDATE `orders` SET `delivery`=1 WHERE `orderID`='$orderID' ";
                if ($con->query($deliveryStatus) === true) {   
                    echo "Sucessfully updated ";                  
                    header('Location:../public/order_done.php?id=' . $orderID);
                }
                
                else{
                    echo "Error updating record: " . $con->error;
                }
            }
            
        }
    
    }else{
        echo "Error updating record: " . $con->error;
    }

    
?>