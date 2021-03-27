<?php
    include ('../../config/dbconfig.php');
    include ('../session.php');

    $quantitySetId=$_GET['id'];

    //getting productID of respective quantityset
   // $productID = "SELECT productID FROM quantitysets where quantityID ='$quantitySetId' ";
    $productID = mysqli_query($con, "SELECT productID FROM quantitysets where quantityID ='$quantitySetId'");
    $productQuery = mysqli_fetch_row($productID);
    $productRowID = $productQuery[0];

    //delete quantity set
    $removeQuantitySet = "DELETE FROM quantitysets WHERE quantityID='$quantitySetId'";
    if ($con->query($removeQuantitySet) === TRUE) {
        $message = base64_encode(urlencode("Quantity Set Deleted."));
        header("Location:{$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        $message = base64_encode(urlencode("SQL Error while Deleting products"));
        header('Location:../../public/seller/seller_product_add.php?msg=' . $message);
        exit();
    }

    $con->close();



?>