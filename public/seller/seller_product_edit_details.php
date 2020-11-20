<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <title>Product Edit Details</title>
</head>
<body>
    <div class="row">
        <div class="columns group">
            <div class="column is-2 pl-1 pr-1"></div>
                <div class="column is-8 pl-1 pr-1">
                    <div class="row">
                        <div class="updateForm">
                            <h2>Update Product</h2><br>
                            <form id="UpdateProduct" action="../../src/seller/seller_product_edit_submit.php" method="post" enctype="multipart/form-data">
                                <div class="columns group">
                                    <div class="column is-4 pl-1">
                                    <input type="hidden" class="input-box" id="editProductID" name="editProductID" value="<?php echo $row['productID']?>" required/><br>
                                        <div class="image-row">
                                            <img class="item-img" src= "../images/products/<?php echo $row['imageName']?>"> <br>
                                            <label for="image">Dispaly Picture</label><br>
                                            <input type="file" class="image-input" id="fileToUpload" name="fileToUpload"/><br>                                
                                        </div>
                                    </div>
                                    <div class="column is-8 pl-1 has-text-left">
                                        <div class="input-row">
                                            <label for="productName">Product Name:</label>
                                            <input type="text" class="input-box" id="productName" name="editProductName" placeholder="Product Name" value="<?php echo $row['name']?>" required/><br>
                                        </div>
                                        <div class="input-row">                                              
                                            <label for="quantity">Quantity (kg):</label>
                                            <input type="text" class="input-box" id="quantity" name="editQuantity" placeholder="Quantity" value="<?php echo $row['quantity']?>" required/><br>
                                        </div>
                                        <div class="input-row">                                               
                                            <label for="minPrice">Minimum price per unit(Rs):</label>
                                            <input type="text" class="input-box" id="minPrice" name="editMinPrice" placeholder="Minimum price" value="<?php echo $row['minPrice']?>" required/><br>
                                        </div>
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
                                            <textarea rows="5" cols="30" name="Description" form="UpdateProduct" placeholder="Product Description"></textarea>
                                        </div>
                                        <br>
                                    </div>

                                        <p>For advertisements fill the below</p>
                                        <div class="input-row">
                                            <label for="ad">Advertisement</label>
                                            <input type="checkbox" style="text-align-left" id="ad" name="ad" value="ad"/>                                 
                                        </div>
                                        
                                    </div>
                                </div>                                
                                <br>
                                    <input class="form-button"  type="submit" name="submit" value="Save">
                                    <input class="form-button" type="button" name="cancel" onclick="window.location.replace('seller_home.php')" value="Cancel">                                           
                                    <a style="color:#3e8e41; font-size:16px; margin-top:10%;" href="#">Delete Product</a>
                                    </div>
                                </form>
                                <h3 class="error-msg"><?php include_once ('../includes/message.php'); ?>"</h3>
                            </div>
                        </div>
                    </div>
                <div class="column is-2 pl-1 pr-1"></div>
            </div>
        </div>
        <?php include_once "../includes/footer.php"; ?> 
    </body>
</html>