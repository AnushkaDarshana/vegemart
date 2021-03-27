<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="../css/seller-product-quantityset.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <script src="../jquery-3.5.1.min.js"></script>
    <title>Add Quantity Set</title>
</head>

<body>
    <?php 
           
        include ('../../config/dbconfig.php');
        include ('../../src/session.php');
        include "./seller_nav.php"; 
        
        //get product ID through URL
        $productID=$_GET['id'];                                 
    ?>

    <div class="row">
        <div class="columns group">
            <div class="column is-3 pl-1 pr-1"></div>
            <div class="column is-6 pl-1 pr-1">
                <div class="row">

                    <div class="updateForm">
                        <h2 style="font-size:20px;">Add Quantity Set</h2>

                        <p id="bid_desc" class="justify-text">You can divide the total quantity of your product to sets. The customer can bid for one of the quantity sets you set below. </p>
                        <p id="bid_desc" class="justify-text">Remember! You can add up to 10 sets of quantity</p>

                        <h2 class="mt-0 mb-0 pt-0 pb-0">Current Quantity sets</h2>

                        <?php
                            
                            //retrieve quantity sets
                            $quantitySetQuery = "SELECT * FROM quantitysets where `productID` ='$productID'";
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

                        <form method="POST" action = "../../src/seller/quantitySet_add.php" enctype="multipart/form-data">

                            <div class="columns group">
                                <div class="column is-6 pl-1 pr-1">
                                    <h2>Minimum price per unit(Rs)</h2>
                                    <div class="input-row">
                                        <!-- <label for="bid_minPrice">Minimum price per unit(Rs):</label> -->
                                        <input type="number" class="input-box" id="minPrice" name="minPrice" placeholder="ex: 100" min="100" step="10" required /><br>
                                    </div>
                                </div>
                                <div class="column is-6 pl-1 pr-1">
                                    <h2>Quantity (kg):</h2>
                                    <div class="input-row">
                                        <input type="number" class="input-box" id="quantity" name="quantity" placeholder="ex: 10" min="10" step="5" required /><br>
                                    </div>
                                </div>
                                
                            </div>
                            <input type="hidden" class="input-box" id="productID" name="productID" value="<?php echo $productID ?>" required /><br>
                            <div class="addon-group" id="addon-group"></div>
              
                            <input class="form-button" type="submit" name="add" value="+">                            

                            <br>

                            <div class="row mt-1">

                                <?php
                                //check if there are rows inserted
                                   $quantitySet = "SELECT * FROM quantitysets where `productID` ='$productID'";
                                   $quantitySetQuery = mysqli_query($con,$quantitySet);  
                            
                                    if(mysqli_num_rows($quantitySetQuery) >0){
                                ?>
                                    <input class="form-button" type="button" name="submit" onclick="window.location.replace('seller_home.php')" value="Save">
                                    
                                <?php
                                    }
                                ?>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="column is-3 pl-1 pr-1"></div>
        </div>
    </div>
    <br>
    
    <?php include_once "../includes/footer.php"; ?>
</body>

</html>