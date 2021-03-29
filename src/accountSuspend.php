<?php
     include ('../config/dbconfig.php');
     include ('session.php');
 
     $orderID=$_GET['id'];
 
     $productAvailable= "UPDATE `orders` SET `canceled_orders`=1 WHERE `orderID`='$orderID' AND notifyStatus=1 ";
     if ($con->query($productAvailable) === true) {
         echo "Record updated successfully";  

        $userIDQuery = mysqli_query($con, "SELECT userID FROM orders where orderID ='$orderID'");
        $rowUser = mysqli_fetch_row($userIDQuery);
        $userID = $rowUser[0];

        $suspendAccount= "UPDATE `users` SET `active_status`=0 WHERE `userID`='$userID'";
        if ($con->query($productAvailable) === true) {
            echo "Record updated successfully";

            $emailQuery = mysqli_query($con, "SELECT email FROM users where id ='$userID'");
            $rowUserEmail = mysqli_fetch_row($emailQuery);
            $email = $rowUserEmail[0];
            
            $userNameQuery = mysqli_query($con, "SELECT fName FROM client where user_id ='$userID'");
            $rowUserName = mysqli_fetch_row($userNameQuery);
            $user = $rowUserName[0];



            

            //send email product removed from cart
            $to=$email;
            $from='vegemartucsc@gmail.com';
            $subject= $user.' your account has been suspended';
            $message='Visit helpdesk and contact admin for more details';
            $header="From: {$from}\r\nContent-Type: text/html;";

            $send_result=mail($to, $subject, $message, $header);
            header('Location:../public/login.php');
        }
        else{
            header('Location:../public/products.php');
        }
    } else {
        header('Location:../public/shopping_cart.php');
     }
     $con->close();


?>