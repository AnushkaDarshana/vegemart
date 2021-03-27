<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/order-done.css">
        <link rel="stylesheet" type="text/css" href="./css/progress-bar.css">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/footer.css">
        <link href="http://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
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
            <div class="columns group mt-0 mb-1">
                <div class="column is-2 mt-0"></div>
                <div class="column is-8 mt-0">
                    <div class="row pl-2 pr-2 mt-0 has-text-centered"> 
                        <div class="card has-text-centered mt-1 mb-1">
                            <img class="typic mt-1 pt-1" src="https://www.flaticon.com/svg/static/icons/svg/1145/1145941.svg">
                            <h2 class="title mt-0">We recieved your Order!</h2>
                            <p>Thank you for placing order <a href="#">#1656346</a></p>
                            <p>You can pick up your order at</p>
                            
                            <div class="columns group mt-1 mb-1">
                                <div class="column is-7 mt-0 pl-2 pr-0 mr-0 pb-0 has-text-centered">
                                    <div class="mapouter pl-1">
                                        <div class="gmap_canvas">
                                            <iframe width="340px" height="320px" id="gmap_canvas" src="https://maps.google.com/maps?q=125%20pilimathalawa%20kandy&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>                               
                                        </div>
                                    </div>  
                                </div>
                                <div class="column is-5 mt-0 has-text-left pb-0 pl-0 mr-0">
                                    <h2 style="text-align:left; padding-bottom:0;">Conditions:</h2>
                                    <p style="text-align:left;">Pickup location is shown in the map</p>
                                    <p style="text-align:left;">Self Pickup should be done before 8pm</p><br>
                                    <h2 style="text-align:left; margin-bottom:0; padding-bottom:0;">Seller</h2>
                                    <h3 style="text-align:left; margin-top:0; padding-top:0;">Anushka Darshana</h3>
                                    <p style="text-align:left;">No. 44,</p>
                                    <p style="text-align:left;">D. M. Rupasinghe mawatha,</p>
                                    <p style="text-align:left;">Badulla</p>   
                                </div>
                            </div>

                            <p>Don't forget to rate the seller and give feedback once you recieve your items</p>
                            <p>If you have any questions or queries feel free to contact us at the Vegemart help desk </p><br>
                                                
                            <img class="logo mt-2 mb-1" src="http://localhost/vegemart/public/images/logob.png">
                        </div>  
                    </div><br>
                    <a id="ab" href="http://localhost/vegemart/public/products.php"><i class="fa fa-hand-o-left pr-1" style="font-weight:500; color:#138D75;"></i>Continue shopping</a>
                    <br>
                </div>
                <div class="column is-2 mt-0"></div>
            </div>
        </div>
        <br>
        <script>
            document.addEventListener('DOMContentLoaded', function(event) {

            document.getElementById('flip-card-btn-turn-to-back').style.visibility = 'visible';
            document.getElementById('flip-card-btn-turn-to-front').style.visibility = 'visible';

            document.getElementById('flip-card-btn-turn-to-back').onclick = function() {
            document.getElementById('flip-card').classList.toggle('do-flip');
            };

            document.getElementById('flip-card-btn-turn-to-front').onclick = function() {
            document.getElementById('flip-card').classList.toggle('do-flip');
            };

            });
        </script>
    <?php include_once "./includes/footer.php"; ?>      
    </body>
</html>
            