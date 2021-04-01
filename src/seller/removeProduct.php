<?php
    include ('../../config/dbconfig.php');
    include ('../session.php');
    

    $productID=$_GET['id'];

    //getting productID of respective quantityset
   // $productID = "SELECT productID FROM quantitysets where quantityID ='$quantitySetId' ";
    $productAvailable= "UPDATE `products` SET `availability`=0 WHERE `productID`='$productID' ";
    if ($con->query($productAvailable) === true) {
        echo "Record updated successfully";   
        
        //seller ID
        $productQuery = mysqli_query($con, "SELECT * FROM products where productID ='$productID'");
        $rowProduct = mysqli_fetch_row($productQuery);
        $sellerID = $rowProduct[1];
        $productName = $rowProduct[2];


        //seller email
        $emailQuery = mysqli_query($con, "SELECT email FROM users where id ='$sellerID'");
        $rowUserEmail = mysqli_fetch_row($emailQuery);
        $email = $rowUserEmail[0];  

        //send email product removed     
        $to=$email;
        $from='vegemartucsc@gmail.com';
        $subject= 'Product has been removed';
        $message=$productName.' has been removed';
        $header="From: {$from}\r\nContent-Type: text/html;";
        $send_result=mail($to,$subject,$message,$header);

        
        header("Location:{$_SERVER['HTTP_REFERER']}");
    } else {
        echo "Error updating record: " . $con->error;
    }
    $con->close();
?>