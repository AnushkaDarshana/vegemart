<?php
    
    $cartID=$_GET['id'];

    $cartStatus= "UPDATE `cart` SET `cartStatus`=1 WHERE `cartID`='$cartID' ";
    if ($con->query($quantityStatus) === true) {
        echo "Record updated successfully";
        

                header('Location:../public/bid.php?id=' . $productID);
        }else{
            echo "Error updating record: " . $con->error;
        }

    
?>