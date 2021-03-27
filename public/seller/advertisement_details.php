<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/advertisement.css">
    <link href="http://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
    <title>Advertisemt Details</title>
</head>
<body>
    <div class="row">
        <div class="columns group">
            <div class="column is-4 pl-1 pr-1"></div>
            <div class="column is-4 pl-1 pr-1">
                <div class="row">
                    <div class="adForProduct">
                        <h2>Post Advertisement</h2>
                        <form id="adForProduct" action="../../src/seller/advertisement_submit.php" method="post" enctype="multipart/form-data">
                        <div class="image-row">
                            <img class="item-img" src= "../images/products/<?php echo $rowProduct['imageName']?>">
                        </div>
                        <h3><?php echo $rowProduct['name']?></h3>
                        <div class="details">
                            <div class="columns group">
                            <div class="column is-1 pl-1 pr-1"></div>
                                <div class="column is-10 pl-1 pr-1">
                                    <div class="input-row">
                                        <input type="date" id="date" name="date"><br>  
                                    </div>
                                    <div class="input-row">
                                        <textarea rows="8" cols="40" name="description" placeholder="Product description" form="adForProduct"></textarea>
                                    </div>
                                </div>
                                <div class="column is-1 pl-1 pr-1"></div>
                            </div>
                        </div>
                        <br><br><br>
                        <input class="form-button"  type="submit" name="submit" value="Save">
                        <input class="form-button" type="button" name="cancel" onclick="window.location.replace('seller_home.php')" value="Cancel">
                                        
                        </form>
                        <h3 class="error-msg"><?php include_once ('../includes/message.php'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="column is-4 pl-1 pr-1"></div>
        </div>
    </div>
    
</body>
</html>