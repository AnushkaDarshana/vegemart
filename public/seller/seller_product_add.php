<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="../css/seller-product-edit.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css"> 
    <script src="../jquery-3.5.1.min.js"></script>   
    <title>Add New Product</title>
</head>
    <body>
        <?php 
        include ('../../config/dbconfig.php');
        include ('../../src/session.php');
        include "./seller_nav.php"; 
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
        ?> 
        <div class="row">
            <div class="columns group">
                <div class="column is-3 pl-1 pr-1"></div>
                <div class="column is-6 pl-1 pr-1">
                    <div class="row">
                        <div class="updateForm">
                            <h2 style="font-size:20px;">Add Product</h2><br>
                            <form id="addProduct" name="addProduct" action="../../src/seller/seller_product_add_submit.php" method="post" enctype="multipart/form-data">
                            <div class="columns group">
                                <div class="column is-12 pl-2 pr-2">
                                    <div class="input-row">                                  
                                        <label for="product">Product Name</label>                                        
                                        <select name="productName" form="addProduct">
                                            <option value="Beans">Beans</option>
                                            <option value="Beetroot">Beetroot</option>
                                            <option value="Broccoli">Broccoli</option>
                                            <option value="Cabbage">Cabbage</option>
                                            <option value="Carrot">Carrot</option>
                                            <option value="Cucumber">Cucumber</option>
                                            <option value="Eggplant">Eggplant</option>
                                            <option value="Garlic">Garlic</option>
                                            <option value="Onion">Onion</option>
                                            <option value="Pumpkin">Pumpkin</option>
                                            <option value="Potato">Potato</option>
                                            <option value="Radish">Radish</option>
                                            <option value="Sweetpotato">Sweet Potato</option>             
                                            <option value="Tomato">Tomato</option>                                          
                                        </select>          
                                    </div>                                    
                                    <div class="input-row">                                               
                                        <label for="image">Image:</label>
                                        <input class="image-input has-text-left" type="file" id="fileToUpload" name="fileToUpload" required/><br> 
                                    </div>
                                    <?php
                                        include ('../../src/seller/seller_profile_details.php');
                                        while($row = mysqli_fetch_assoc($userquery)){
                                    ?>
                                    <div class="input-row">                                               
                                        <label for="address">Address:</label>
                                    <input type="text" class="input-box" id="address1" name="address1" placeholder="ex: 75/2" value="<?php echo $row['address1']?>" required/><br>
                                    </div>
                                    <div class="input-row">   
                                    <label for="address"></label>                                            
                                        <input type="text" class="input-box" id="address2" name="address2"placeholder="ex: Bandarawella road" value="<?php echo $row['address2']?>" required/><br>
                                    </div>
                                    <div class="input-row">   
                                        <label for="address"></label>                                             
                                        <input type="text" class="input-box" id="address3" name="city"placeholder="ex: Badulla" value="<?php echo $row['city']?>" required/><br> 
                                    </div>
                                    <?php
                                        }
                                    ?>
                                    <div class="input-row">   
                                        <label for="description">Description:</label>                                             
                                        <textarea rows="5" cols="35" name="description" form="addProduct" placeholder="Product description" required></textarea>
                                    </div>                               
                                    <p style="color: red; text-align:center;">Your products will be automatically removed after 7 days.</p>                        
                                    
                                </div>
                                
                            </div>
                            <div class="row">
                                <input class="form-button"  type="submit" name="submit" value="Save">
                                <input class="form-button" type="button" name="cancel" onclick="window.location.replace('seller_home.php')" value="Cancel">                                           
                            </div>
                            </form>
                            <h3 class="error-msg"><?php include_once('../includes/message.php'); ?></h3>
                        </div>
                    </div>
                </div>
                <div class="column is-3 pl-1 pr-1"></div>
            </div>
        </div>
    
    
    <?php include_once "../includes/footer.php"; ?>   
    </body>
</html>

