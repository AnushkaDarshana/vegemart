<?php
     include ('../config/dbconfig.php');
     include ('session.php');
 
     $orderID=$_GET['id'];
 
     $cancelOrder= "UPDATE `orders` SET `canceled_orders`=1 WHERE `orderID`='$orderID'";
     if ($con->query($cancelOrder) === true) {
         echo "Record updated successfully";  

        $userIDQuery = mysqli_query($con, "SELECT userID FROM orders where orderID ='$orderID'");
        $rowUser = mysqli_fetch_row($userIDQuery);
        $userID = $rowUser[0];

        $suspendAccount= "UPDATE `users` SET `active_status`=0 WHERE `id`='$userID'";
        if ($con->query($productAvailable) === true) {
            echo "Record updated successfully";

            $emailQuery = mysqli_query($con, "SELECT email FROM users where id ='$userID'");
            $rowUserEmail = mysqli_fetch_row($emailQuery);
            $email = $rowUserEmail[0];
            
            $userNameQuery = mysqli_query($con, "SELECT fName FROM client where user_id ='$userID'");
            $rowUserName = mysqli_fetch_row($userNameQuery);
            $user = $rowUserName[0];

            $orderDetailsQuery = mysqli_query($con, "SELECT * FROM orders where orderID ='$orderID'");
            while ($rowOrder  = mysqli_fetch_assoc($orderDetailsQuery)) {
                $productID = $rowOrder['productID'];
                $quantityID = $rowOrder['quantityID'];

                $productAvailable = "UPDATE `products` SET `availability`=1 WHERE `productID`='$productID'";
                if ($con->query($productAvailable) === true) {
                    echo "Record updated successfully";

                    $quantitySetAvailable = "UPDATE `quantitysets` SET `quantitySetStatus`=0 WHERE `quantityID`='$quantityID'";
                    if ($con->query($quantitySetAvailable) === true) {
                        echo "Record updated successfully";
                    }
                    else{
                        echo "Error updating record: " . $con->error;
                    }
                }    
                else{
                    echo "Error updating record: " . $con->error;
                }
            }
            //send email product removed from cart
                $to=$email;
                $from='vegemartucsc@gmail.com';
                $subject= 'Account suspended.';
                $message=$user.' your account has been suspended. Visit helpdesk and contact admin for more details';
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