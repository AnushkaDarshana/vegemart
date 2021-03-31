<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="../css/seller-product-edit.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css"> 
    <title>Update Product</title>
</head>
    <body>
        <?php 
            include ('../../config/dbconfig.php');
            include ('../../src/session.php');
            include './seller_nav.php'; 
            if(empty(session_id())){
                session_start();
            }
            if((!isset($_SESSION["loggedInSellerID"])))
            {
                echo "<script>
                alert('You have to login first');
                window.location.href='../../public/login.php';
                </script>";
            }
            include ('../../src/seller/seller_product_edit_details.php');
            while($row = mysqli_fetch_assoc($productQuery)){?>
        <div class="row">
            <div class="columns group">
                <div class="column is-1 pl-1 pr-1"></div>
                <div class="column is-10 pl-1 pr-1">
                    <div class="row">
                        <div class="updateForm">
                            <h2 style="font-size:20px;" class="mb-0">Update Product</h2>
                            <form id="UpdateProduct" action="../../src/seller/seller_product_edit_submit.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" class="input-box" id="editProductID" name="editProductID" value="<?php echo $row['productID']?>" required/><br>
                            <div class="columns group mt-0">
                                   
                                <div class="column is-5 pl-1 pr-0 mr-0 has-text-left">
                                    <h3 style="font-size:16px;">Update Product Details</h3>
                                    <div class="image-row">
                                        <img class="item-img" src= "../images/products/<?php echo $row['imageName']?>">   
                                    </div> 
                                    <div class="input-row">
                                        <label>Display Picture</label>
                                        <input class="image-input" type="file" id="fileToUpload" name="fileToUpload"/>   
                                    </div>
                                    <div class="input-row">
                                        <label for="productName">Product Name:</label>
                                        <input type="text" class="input-box" id="productName" name="editProductName" placeholder="Product Name" value="<?php echo $row['name']?>" readonly=true required/><br>
                                    </div>
                                    <!-- <div class="input-row">                                              
                                        <label for="quantity">Quantity (kg):</label>
                                        <input type="text" class="input-box" id="quantity" name="editQuantity" placeholder="Quantity" value="<?php echo $row['quantity']?>" required/><br>
                                    </div> -->
                                    <div class="input-row">                                               
                                        <label for="address">Address Line 1:</label>
                                        <input type="text" class="input-box" id="address1" name="editAddress1" placeholder="Address line 1" value="<?php echo $row['address1']?>" required /><br>
                                    </div>
                                    <div class="input-row">   
                                        <label for="address">Address Line 2:</label>                                            
                                        <input type="text" class="input-box" id="address2" name="editAddress2" placeholder="Address line 2"  value="<?php echo $row['address2']?>" required/><br>
                                    </div>
                                    <div class="input-row">   
                                        <label for="address">City:</label>                                             
                                        <input type="text" class="input-box" id="city" name="editCity" placeholder="City"  value="<?php echo $row['city']?>" required/><br> 
                                    </div>
                                    <div class="input-row">   
                                        <label for="description">Description</label>   <br> 
                                        <textarea rows="5" cols="30" name="Description" form="UpdateProduct" placeholder="Product Description" value="<?php echo $row['description']?>"><?php echo $row['description']?></textarea>
                                    </div>
                                    <br>
                                </div>
                                <div class="column is-7 ml-1 pl-1">
                                    <h3 style="font-size:16px;">Update Bid Quantity</h3>
                                    

                                <?php
                            
                                    //retrieve quantity sets
                                    $quantitySetQuery = "SELECT * FROM quantitysets where `productID` ='$productID' AND quantitySetStatus = 0";
                                    $quantitySetExecuteQuery = mysqli_query($con,$quantitySetQuery);  
                                    while ($rowquantitySet = mysqli_fetch_assoc($quantitySetExecuteQuery)) {  

                                ?>
                                <div class="columns group mt-0 mb-0">
                                    <div class="column is-4 mt-0 pl-1 pr-1">
                                        <h3>Rs. <?php echo $rowquantitySet['minPrice']?></h3>
                                    </div>
                                    <div class="column is-4 mt-0 pl-1 pr-1">
                                        <h3><?php echo $rowquantitySet['quantity']?> kg</h3>
                                    </div>
                                    
                                    <a class="button" href="../../src/seller/removeQuanitySet.php?id=<?php echo $rowquantitySet['quantityID']?>" id="removeOne"><i class="fa fa-minus" style=" margin-left:1em;margin-top: 1em; color:red; font-size:24px; text-align:left;"></i></a><br>
                                </div>

                                <?php
                                    }
                                        
                                ?>
                                <form method="POST" id="add" action = "../../src/seller/quantitySet_add.php" enctype="multipart/form-data">

                                    <div class="columns group">
                                        <div class="column is-6 pl-1 pr-1">
                                            <h2>Minimum price per unit(Rs)</h2>
                                            <div class="input-row">
                                                <!-- <label for="bid_minPrice">Minimum price per unit(Rs):</label> -->
                                                <input type="number" class="input-box" id="minPrice" name="minPrice" placeholder="ex: 100" min="100" step="10" /><br>
                                            </div>
                                        </div>
                                        <div class="column is-6 pl-1 pr-1">
                                            <h2>Quantity (kg):</h2>
                                            <div class="input-row">
                                                <input type="number" class="input-box" id="quantity" name="quantity" placeholder="ex: 10" min="10" step="5" /><br>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <input type="hidden" class="input-box" id="productID" name="productID" value="<?php echo $productID ?>" required /><br>
                                    <div class="addon-group" id="addon-group"></div>

                                    <input class="form-button" formaction="../../src/seller/quantitySet_add.php" type="submit" name="add" value="+">                            

                                    <br>

                                    <div class="row mt-1">                                        
                                    </div>
                                </form>
                                  

                                <?php } mysqli_close($con);?>     
                                    </div>  
                                </div>
                                
                                <input class="form-button"  type="submit" name="submit" form="UpdateProduct" value="Save">
                                <input class="form-button" type="button" name="cancel" onclick="window.location.replace('seller_home.php')" value="Cancel">                                           
                                
                            </form>
                        
                    </div>                  
                    <h3 class="error-msg"><?php include_once ('../includes/message.php'); ?></h3>
                </div>
                <div class="column is-1 pl-1 pr-1"></div>
            </div>
        </div>
        <?php include_once "../includes/footer.php"; ?>
        
                          
    </body>
</html>