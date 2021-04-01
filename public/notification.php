<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <link rel="stylesheet" type="text/css" href="./css/notification.css">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/footer.css">
        <title>Notifications | Vegemart</title>
    </head>
    <body>  
    <?php 
    include "./includes/nav.php"; 
    include ('../config/dbconfig.php');
    include ('../src/session.php');
    
    ?>  
        <div class="row">
            <div class="columns group mt-0">
                <div class="heading">
                    <h1 id="title"><i class="fa fa-bell" style="font-size:35px; padding:20px;"></i>Notifications</h1>
                </div>
                
                <div class="column is-6 mt-0 ml-3">
                    <div>            
                        <?php include_once "../src/show_notification.php"; ?>              
                    </div>
                    <div>
                        <?php include_once "../src/forum/forum_notification.php"; ?>  
                    </div>
                </div>
                <div class="column is-6 mt-0"></div>
                
            </div>   
        </div>
        <br>
        <?php include_once "./includes/footer.php"; ?>  
        
        
        <!-- <script>
            function myFunction() { 
                var e = document.getElementById("notif");
                var c = window.getComputedStyle(e).backgroundColor;
                if (c === "rgb(242, 243, 244)") {
                    document.getElementById("notif").style.background = "#ffffff";
                }
            }
        </script> -->
    </body>
</html>