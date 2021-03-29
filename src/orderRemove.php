<?php
     include ('../config/dbconfig.php');
     include ('session.php');
 
     $orderID=$_GET['id'];
 
     //order will be removed after 2 days of time if you didn't pay
     $cartExpirationDateQuery = "SELECT DATE_ADD(NOW(),INTERVAL 1 MINUTE) AS DateAdd;";
     $cartExpirationDateResult = mysqli_query($con,$cartExpirationDateQuery); 
     $rowCartExpirationDate = mysqli_fetch_assoc($cartExpirationDateResult);
     $cartExpirationDate = $rowCartExpirationDate['DateAdd'];

     $productAvailable= "UPDATE `orders` SET `notifyStatus`=1,`orderCancelDate`='$cartExpirationDate' WHERE `orderID`='$orderID'";
     if ($con->query($productAvailable) === true) {
         echo "Record updated successfully";  

        $userIDQuery = mysqli_query($con, "SELECT userID FROM orders where orderID ='$orderID'");
        $rowUser = mysqli_fetch_row($userIDQuery);
        $userID = $rowUser[0];
        
        $emailQuery = mysqli_query($con, "SELECT email FROM users where id ='$userID'");
        $rowUserEmail = mysqli_fetch_row($emailQuery);
        $email = $rowUserEmail[0];        
        
        $userNameQuery = mysqli_query($con, "SELECT fName FROM client where user_id ='$userID'");
        $rowUserName = mysqli_fetch_row($userNameQuery);
        $user = $rowUserName[0]; 

        

        //send email product removed from cart     
        $to=$email;
        $from='vegemartucsc@gmail.com';
        $subject= 'Payment for the order #'.$orderID.'should be completed within two days';
        $message=$user.' you have not paid to order #'.$orderID.'. you have to complete your payment within two days if you are not able to pay your account will be suspended';
        $header="From: {$from}\r\nContent-Type: text/html;";

        $send_result=mail($to,$subject,$message,$header); 
         header('Location:../public/shopping_cart.php');
    } else {
        header('Location:../public/shopping_cart.php');
     }
     $con->close();


?>