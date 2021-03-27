<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/delivery.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/footer.css">
        <link href="http://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <title> Ongoing Delivery</title>
    </head>
    <body>
        <?php include "../deliverer/deliverer_nav.php"; ?>  
        <div class="row">
            <div class="columns group">
                <div class="column is-1 pl-1 pr-1"></div>
                <div class="column is-5 pl-1 pr-1">
                    <div class="flip-card-3D-wrapper mt-0 pt-0">
                        <div id="flip-card">
                            <div class="flip-card-front">
                                <div class="mapouter">
                                    <div class="gmap_canvas">
                                        <iframe width="100%" height="120%" id="gmap_canvas" src="https://maps.google.com/maps?q=125%20pilimathalawa%20kandy&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>                               
                                    </div>
                                </div>
                                <h2 class="mb-1">Seller</h2>
                                <h3>Anushka Darshana</h3>
                                <p>No. 44,</p>
                                <p>D. M. Rupasinghe mawatha,</p>
                                <p>Badulla</p>                                                  
                                <button class="button" id="flip-card-btn-turn-to-back">Confirm Pickup</button>                             
                            </div>
                            <div class="flip-card-back">
                                <i class="fa fa-check-circle mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#138D75;"></i><br>
                                <button class="button" id="flip-card-btn-turn-to-front">flip to front</button>   
                            </div>
                        </div>
                    </div>
                </div>
  
                <div class="column is-5 pl-1 pr-1">
                    <div class="row">
                        <div class="card">
                            <div class="columns group">
                                <div class="column is-12 has-text-centered">
                                    <div class="mapouter">
                                        <div class="gmap_canvas">
                                            <iframe width="100%" height="120%" id="gmap_canvas" src="https://maps.google.com/maps?q=kandy%20kandy&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>                               
                                        </div>
                                    </div>
                                    <h2 class="mb-1">Buyer</h2>
                                    <h3>Chanaka Malshan</h3>
                                    <p>No. 44,</p>
                                    <p>D. M. Rupasinghe mawatha,</p>
                                    <p>Kandy</p>
                                </div>
                            </div>
                            <div class="row pb-1">
                                <button class="button" onClick="location.href='http://localhost/vegemart/public/deliverer/delivery_done.php';">Confirm Delivery</button><br>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-1 pl-1 pr-1"></div>
                <!-- <p>when the delivery guy press confirm pickup, seller kotuwa nathi wela buyer kotuwa witharak pennanna oni</p> -->
 
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