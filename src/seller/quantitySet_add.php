<?php    
    
    include ('../../config/dbconfig.php');
    include ('../session.php');
             
             
    //Uploading to Database

    if (isset($_POST['add'])){
                
            $quantity = $_POST['quantity'];  
            $minPrice = $_POST['minPrice'];
            $productID = $_POST['productID'];
            
           //select no of rows is inserted
            
            
                $noOfQuantitySetInfo="SELECT COUNT(ProductID) AS NumberOfQuantitySets FROM quantitysets where productID ='$productID';";
                $quantitySetExecuteQuery = mysqli_query($con,$noOfQuantitySetInfo); 
                $rowQuantity = mysqli_fetch_assoc($quantitySetExecuteQuery);
                $maxNofQuantity = $rowQuantity['NumberOfQuantitySets'];
            
            
                if($maxNofQuantity > 9){
                    ?>
                    <script>
                    alert('You have entered maximum number of quantity sets');
                    var productID=<?php echo $productID ?>;
                    window.location.href='../../public/seller/seller_product_quantityset.php?id='+productID;
                    </script>";
                <?php
                }

            else{
                                    
                    $quantitySet = "INSERT INTO `quantitysets` (`productID`,`quantity`,`minPrice`) VALUES ('".$productID."','".$quantity."','".$minPrice."');";
                    if (mysqli_query($con, $quantitySet)) {
                        
                        
                            $productAvailable= "UPDATE `products` SET `availability`=1 WHERE `productID`='$productID' ";
                            if ($con->query($productAvailable) === true) {
                                echo "Record updated successfully";
                            } else {
                                echo "Error updating record: " . $con->error;
                            }
                        

                        $message = base64_encode(urlencode("Quantity Set Added."));
                        header("Location:{$_SERVER['HTTP_REFERER']}");
                        exit();
                    } else {
                        $message = base64_encode(urlencode("SQL Error while Adding products"));
                        header('Location:../../public/seller/seller_product_add.php?msg=' . $message);
                        exit();
                    }
                }
            }
        
        mysqli_close($con);
    
?>

