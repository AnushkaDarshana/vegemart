<?php
    include ('../../config/dbconfig.php');
    include ('../session.php');

    $productID=$_GET['id'];

    //getting productID of respective quantityset
   // $productID = "SELECT productID FROM quantitysets where quantityID ='$quantitySetId' ";
    $productAvailable= "UPDATE `products` SET `availability`=0 WHERE `productID`='$productID' ";
    if ($con->query($productAvailable) === true) {
        echo "Record updated successfully";        
        header("Location:{$_SERVER['HTTP_REFERER']}");
    } else {
        echo "Error updating record: " . $con->error;
    }
    $con->close();
?>