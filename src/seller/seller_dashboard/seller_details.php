<?php
    
    if (basename($_SERVER['PHP_SELF']) == "seller_home.php"){
        if(isset($_SESSION["loggedInSellerID"])){
            $sellerID=$_SESSION["loggedInSellerID"];
        }  
        else{
            if(isset($_POST["send"])){
                $_SESSION["loggedInUserToSellerID"]=$_POST["sellerID"];
                $sellerID=$_SESSION["loggedInUserToSellerID"];
            }
            else{
                $sellerID=$_SESSION["loggedInUserToSellerID"];
            }
        }
        //$sellerID=1695357733;
        
        $retrieveInfo =  "SELECT * FROM client WHERE id='$sellerID';"; //Selecting all data from Table according to sellerID
        $resultInfo = mysqli_query($con, $retrieveInfo); //Passing SQL      
    }
    else if(basename($_SERVER['PHP_SELF']) == "bid.php"){
        $retrieveSellerProduct =  "SELECT * FROM products WHERE productID='$productID';"; //Selecting all data from Table according to sellerID
        $resultSellerProduct = mysqli_query($con, $retrieveSellerProduct); //Passing SQL
        while ($rowSellerID  = mysqli_fetch_assoc($resultSellerProduct)) {  
            $sellerID = $rowSellerID['sellerID'];        
            $retrieveSeller =  "SELECT * FROM client WHERE id='$sellerID';"; //Selecting all data from Table according to sellerID
            $resultSeller = mysqli_query($con, $retrieveSeller); //Passing SQL
        }
    }
    else if(basename($_SERVER['PHP_SELF']) == "shopping_cart.php"){
        $retrieveBid =  "SELECT * FROM bidding WHERE bidID='$bidID';"; //Selecting all data from Table according to sellerID
        $resultBid = mysqli_query($con, $retrieveBid); //Passing SQL
        while ($rowBidID  = mysqli_fetch_assoc($resultBid)) {  
            $productID = $rowBidID['productID'];        
            // $retrieveSeller =  "SELECT * FROM client WHERE id='$sellerID';"; //Selecting all data from Table according to sellerID
            // $resultSeller = mysqli_query($con, $retrieveSeller); //Passing SQL
        }
    }
?>
                       
                      