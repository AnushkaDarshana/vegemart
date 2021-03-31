<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <link rel="stylesheet" type="text/css" href="https://localhost/vegemart/public/css/nav.css">
    </head>

    <body>
        <header class="header">
            <a href="./seller_home.php"><img class="logopic" src="https://localhost/vegemart/public/images/logob.png"></a>
            
            <ul class="main-nav">
                <?php  
                if(isset($_SESSION["loggedInSellerID"])){?>
                    <li><a href="https://localhost/vegemart/public/seller/seller_home.php">Home</a></li>
                <?php
                }
                ?>
                <?php  
                if(isset($_SESSION["loggedInUserID"])){?>
                    <li><a href="https://localhost/vegemart/public/products.php">Home</a></li>
                <?php
                }
                ?>
                <li><a href="#">About</a></li>
                <li><a href="https://localhost/vegemart/public/forum_home.php">Forum</a></li>
                
                <?php  
                    if(isset($_SESSION["loggedInUserID"])||isset($_SESSION["loggedInSellerID"])){
                        if (isset($_SESSION["loggedInUserID"])) {
                            $userID = $_SESSION["loggedInUserID"];
                        }
                        elseif (isset($_SESSION["loggedInSellerID"])) {
                            $userID = $_SESSION["loggedInSellerID"];
                        }
                        $retrieveInfo =  "SELECT * FROM `client` WHERE `user_id`='$userID';"; //Selecting all data from Table
                        $resultInfo = mysqli_query($con, $retrieveInfo); //Passing SQL
                        while($rowUser  = mysqli_fetch_assoc($resultInfo)){

                            $notificationQuery ="SELECT COUNT(notificationID) AS unread FROM `notification` WHERE forUser='$userID' AND notif_read=0";
                            $resultNotification = mysqli_query($con,$notificationQuery);
                            while ($rowNotification = mysqli_fetch_assoc($resultNotification)) {  
                                $notification = $rowNotification['unread'];
                            }
                        
                        if ($notification>0) {
                            echo "
                            <li>
                            <div class=\"number\">$notification</div>";
                        }
                            echo"
                                <i class=\"fa fa-bell\" style=\"font-size:20px; color:black; margin-left:1em; margin-right:8; padding-right:0;\"></i><button class=\"notifbtn\" onClick=\"location.href='http://localhost/vegemart/src/read_notification.php';\">Messages</button>
                            </li>                        
                        
                        <li>
                        <div class=\"nav-dropdown\">
                            <img class=\"dp\" src=\"https://localhost/vegemart/public/images/users/{$rowUser['profilePic']}\" alt=\"Avatar\">
                            <div class=\"dropdown-content\">";
                            if(isset($_SESSION["loggedInUserID"])){
                               echo" <a href=\"https://localhost/vegemart/public/buyer_profile_edit.php\">View Profile</a>";
                            }
                            if(isset($_SESSION["loggedInSellerID"])){
                                echo" <a href=\"https://localhost/vegemart/public/seller/seller_profile_edit.php\">View Profile</a>";
                             }
                                echo"<a href=\"https://localhost/vegemart/public/help_desk.php\">Help Desk</a>";
                                echo"<a href=\"https://localhost/vegemart/src/logout.php\">Logout</a>
                            </div>
                        </div>
                        </li>";
                    }                       
                }    
                else{
                    // echo"<li><a href=\"../login.php\">Login</a></li>";
                    echo"<li><button class=\"loginbtn\" onClick=\"location.href='https://localhost/vegemart/public/login.php';\">Login</button><li>";
                }   
            ?> 
            </ul>
        </header>
        <script>
            /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
            function dropFunc() {
            document.getElementById("notifDrop").classList.toggle("show");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('.notifbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
        </script>
    </body>
</html>