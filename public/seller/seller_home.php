<?php
    include ('../../config/dbconfig.php');
    include ('../../src/session.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/seller-home.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/footer.css">
        <link href="http://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <title>Seller Dashboard | Vegemart</title>
    </head>

    <body>
        <?php include "./seller_nav.php"; ?>
        <div class="row">

            <div class="columns group mt-0">
                <div class="column is-8 mt-0">
                    <div class="row pl-1 pr-1 mt-0">
                        <fieldset>
                            <legend>Seller Profile</legend>
                            <div class="columns group mt-0">                            
                                <?php
                                    include ('../../src/seller/seller_dashboard/seller_details.php'); 
                                    sellerProfile($con);                               
                                    while ($rowUser  = mysqli_fetch_assoc($resultInfo)) {
                                        $_SESSION["loggedInSellerID"] = $rowUser['id'];?>
                                        <div class="column is-3">
                                            <div class="row pt-3 pb-2 pl-2">
                                                <img class="user-image" src= "../images/users/<?php echo $rowUser['profilePic']?>" alt="Display Picture">
                                            </div>
                                        </div>    
                                        <div class="column is-1"></div>
                                        <div class="column is-7 has-text-left">
                                            <div class="row  pl-2 has-text-left">
                                                <h2 class="mb-1 pl-1" style="font-size:27px;"><?php echo $rowUser['fName'] . " " . $rowUser['lName'] ?></h2><br>        
                                                <div class="column is-3">
                                                    <h3 class="mb-0 mt-0 pr-1" style="text-align-left">Phone:</h3><br>
                                                    <h3 class="mb-0 mt-0" style="text-align-left">Location:</h3><br>
                                                </div>
                                                
                                                <div class="column is-4 has-text-left pb-1 pl-1">
                                                    <h3 class="mb-0 mt-0" style="text-align-left"><?php echo $rowUser['phoneNum']?> </h3><br>
                                                    <h3 class="mb-0 mt-0" style="text-align-left"><?php echo $rowUser['address1']?></h3>
                                                    <h3 class="mb-0 mt-0" style="text-align-left"><?php echo $rowUser['address2']?></h3>
                                                    <h3 class="mb-0 mt-0" style="text-align-left"><?php echo $rowUser['city']?></h3>                
                                                </div> 
                                                <?php
                                                        include "../../src/seller/seller_dashboard/map.php";
                                                        while($rowProduct  = mysqli_fetch_assoc($resultMenu)){  ?>
                                                            <div class="mapouter">
                                                                <div class="gmap_canvas">
                                                                    <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $rowProduct['address1']?>%20<?php echo $rowProduct['address2']?>%20<?php echo $rowProduct['city']?>&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>                               
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                    mysqli_close($con);
                                                ?>         
                                            </div>                                            
                                        </div> 
                                    <?php
                                        }                                    
                                    ?>                            
                            </div>
                            <div class="row has-text-right mt-2 mb-1 mr-1">
                                <button class="button" onClick="location.href='http://localhost/vegemart/public/seller/seller_profile_edit.php';"><i class="fas fa-cog mr-1"></i>Edit Profile</button>
                            </div>
                       </fieldset>                        
                    </div>
                    <br/>
                
                    <div class="items-grid pl-1 pr-2 mt-0">
                        <div class="row item-legend has-text-centered mt-0">
                        <h1 id="title" style="padding-bottom:0;">Available products</h1>
                            <div class="columns group">
                                <div class="column is-3">
                                    <h4></h4>
                                </div>
                                <div class="column is-2">
                                    <h4>Item</h4>
                                </div>
                                <div class="column is-2">
                                    <h4>Unit Price (Rs.)</h4>
                                </div>
                                <div class="column is-2">
                                    <h4>Quantity (kg)</h4>
                                </div>
                                <div class="column is-3">
                                    <h4></h4>
                                </div>
                            </div>
                        </div>
                        <?php
                            include ('../../src/seller/seller_dashboard/product_details.php');
                            while ($row = mysqli_fetch_assoc($result)) {
                                $_SESSION["loggedInSellerID"] = $row['sellerID'];?>
                                <div class="item-table">
                                    <div class="row item-row has-text-centered mb-0">
                                        <div class="columns group">
                                            <div class="column is-3">
                                                <img class="item-img" src= "../images/products/<?php echo $row['imageName']?>">
                                            </div>
                                            <div class="column is-2">
                                                <h4><?php echo $row['name'] ?> </h4>
                                            </div>
                                            <div class="column is-2">
                                                <h4><?php echo $row['minPrice'] ?> </h4>
                                            </div>
                                            <div class="column is-2">
                                                <h4><?php echo $row['quantity'] ?></h4>
                                            </div>
                                            <div class="column is-3">
                                                <button class="button" onClick="location.href='http://localhost/vegemart/public/seller/seller_product_edit.php?id=<?php echo $row['productID']?>';">Update Product</button>               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            mysqli_close($con);
                        ?>
                    
                        <div id="addProduct">
                            <button class="button" onClick="location.href='http://localhost/vegemart/public/seller/seller_product_add.php';">Add New Product</button>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="row pl-1 pr-3">
                    <h1 id="title" style="text-align:center;">Reviews from Customers</h1>
                        <div class="user-data pt-1 pb-1">
                            <img src="https://www.flaticon.com/svg/static/icons/svg/1484/1484836.svg" class="user-image" alt="Use Image">
                            <h2>4.3</h2>
                            <div class="rating-block">
                                <i class="fas fa-star star-colored"></i>
                                <i class="fas fa-star star-colored"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <?php
                            include ('../../src/seller/seller_dashboard/reviews.php');                               
                            while($row = mysqli_fetch_assoc($result)){
                                $buyerID = $row['userID']; 
                                //echo "123";
                                // $buyerID = 7;
                                $retrieveUserInfo =  "SELECT * FROM client WHERE id='$buyerID';"; //Selecting all data from Table
                                $resultUserInfo = mysqli_query($con, $retrieveUserInfo); //Passing SQL
                                while($rowPic= mysqli_fetch_assoc($resultUserInfo)){?> 
                                    <div class="row mt-1">
                                        <div class="columns group">
                                            <div class="column is-3 mt-2">
                                                <img class="review-image" src="../images/users/<?php echo $rowPic['profilePic'] ?>" alt="">
                                            </div>
                                            <div class="column is-9">
                                                <p class="justify-text"><?php echo $row['review'] ?> </p>
                                            </div>
                                        </div>
                                    <hr>
                                    </div>
                                <?php
                                }  
                            }  
                            mysqli_close($con);                           
                            if(isset($_SESSION["loggedInUserID"])){?>
                                <div class="row has-text-centered mt-2 pl-1">                            
                                    <textarea rows="5" cols="30" id="description" name="description" placeholder="Give Feedback" form="addReview"></textarea>
                                </div>
                                <form action="../../src/seller/seller_dashboard/give_reviews.php" method="post" id="addReview" name="addReview">
                                    <input type="hidden" class="input-box" id="userID" name="userID" value="<?php echo $_SESSION["loggedInUserID"]?>" required/>
                                    <input type="hidden" class="input-box" id="sellerID" name="sellerID" value="<?php echo $sellerID?>" required/>
                                    <button type="submit" class="button ml-5 pr-1 pl-1 mt-1" name="send"><i class="fas fa-cog mr-1"></i>Save</button>
                                </form>
                        <?php
                        } 
                        ?>                   
                    </div>
                </div>
            </div>
        </div>
        <?php include_once "../includes/footer.php"; ?> 
    </body>
</html>