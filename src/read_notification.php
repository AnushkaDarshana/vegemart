<?php
    include ('./session.php'); 
    include ('../config/dbconfig.php');
    if (isset($_SESSION["loggedInUserID"])) {
        $userID = $_SESSION["loggedInUserID"];
    }
    elseif (isset($_SESSION["loggedInSellerID"])) {
        $userID = $_SESSION["loggedInSellerID"];
    }
    

    $orderStatus= "UPDATE `notification` SET `notif_read`=1 WHERE `forUser`='$userID' ";
    if ($con->query($orderStatus) === true) {
        echo "read the notification";
        if (isset($_SESSION["loggedInSellerID"])) {
            header('Location:../public/seller/seller_notification.php');
        }
        elseif (isset($_SESSION["loggedInUserID"])) {
            header('Location:../public/notification.php');
        }
    }
    else{
        echo "Error updating record: " . $con->error;
    }



?>