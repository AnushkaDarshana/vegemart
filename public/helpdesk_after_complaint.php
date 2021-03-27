<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <link rel="stylesheet" type="text/css" href="./css/order-done.css">
        <link rel="stylesheet" type="text/css" href="./css/progress-bar.css">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/footer.css">
        <title>Order Complete | Vegemart</title>
    </head>
    <body>  
        <?php include "./includes/nav.php"; ?>
        <div class="columns group mb-0">
            <div class="column is-2"></div>
            <div class="column is-8 mt-2 mb-0">
                <section>
                    <ol class="progress-bar">
                        <li class="is-complete"><span>Shopping Cart</span></li>  
                        <li class="is-complete"><span>Confirmation</span></li>  
                        <li class="is-complete"><span>Payment</span></li>
                        <li class="is-active"><span>Finish</span></li>    
                    </ol>
                </section>
            </div>
            <div class="column is-2"></div>
        </div>

        <div class="row">
            <div class="columns group mt-1 mb-1">
                <div class="column is-3 mt-0"></div>
                <div class="column is-6 mt-0">
                    <div class="row pl-2 pr-2 mt-0 has-text-centered"> 
                        <div class="card has-text-centered mt-1 mb-1">
                            <img class="typic mt-1 pt-1" src="https://www.flaticon.com/svg/static/icons/svg/1145/1145941.svg">
                            <h2 class="title mt-0">We recieved your Order!</h2>
                            <p>Thank you for placing order <a href="#">#1656346</a></p>
                            <p>Don't forget to rate the seller and give feedback once you recieve your items</p>
                            <p>If you have any questions or queries feel free to contact us at the Vegemart help desk </p><br>
                                               
                            <img class="logo mt-2 mb-1" src="http://localhost/vegemart/public/images/logob.png">
                        </div>
                    </div>
                    <br>
                    <a id="ab" href="http://localhost/vegemart/public/products.php"><i class="fa fa-hand-o-left pr-1" style="font-size:22px; font-weight:500; color:#3e8e41;"></i>Continue shopping</a>
                    <br>
                </div>
                <div class="column is-3 mt-0"></div>
            </div>
        </div>
    <?php include_once "./includes/footer.php"; ?>      
    </body>
</html>
            