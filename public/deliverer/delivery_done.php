<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/delivery-done.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/footer.css">
        <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <title>Delivery Complete | Vegemart</title>
    </head>
    <body>  
        <?php include "../deliverer/deliverer_nav.php"; ?>  

        <div class="row">
            <div class="columns group mt-1 mb-1">
                <div class="column is-3 mt-0"></div>
                <div class="column is-6 mt-0">
                    <div class="row pl-2 pr-2 mt-0 has-text-centered"> 
                        <div class="card has-text-centered mt-1 mb-1">
                            <h2 class="title mt-0 mb-0">Your job is done!</h2>
                            
                            <img class="delpic mt-0 pt-1" src="https://localhost/vegemart/public/images/deliverydone.jpg">
                            <p>You successfully delivered order <a href="#">#1656346</a></p>
                            <p>Your payment will be credited to your bank account</p>
                            <p>If you have any questions or queries feel free to contact us at the Vegemart help desk </p><br>
                            <a id="ab" href="https://localhost/vegemart/public/deliverer/deliverer_home.php"><i class="fa fa-hand-o-left pr-1" style="font-size:22px; font-weight:500; color:#3e8e41;"></i>Back To Home</a>                 
                            <br>
                            <img class="logo mt-2 mb-1" src="https://localhost/vegemart/public/images/logob.png">
                        </div>
                    </div>
                  </div>
                <div class="column is-3 mt-0"></div>
            </div>
        </div>
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
    <?php include_once "../includes/footer.php"; ?>      
    </body>
</html>
            