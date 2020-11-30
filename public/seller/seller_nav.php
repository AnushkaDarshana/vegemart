<?php     
    include ('../../src/session.php');
    include ('../../config/dbconfig.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="http://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <link rel="stylesheet" type="text/css" href="../css/nav.css">
    </head>

    <body>
        <header class="header">
            <a href="./seller_home.php"><img class="logopic" src="../images/logob.png"></a>
            
            <ul class="main-nav">
                <li><a href="http://localhost/vegemart/public/seller/seller_home.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="http://localhost/vegemart/public/forum.php">Forum</a></li>
                <li><a href="http://localhost/vegemart/public/help_desk">Help Desk</a></li>
                <?php  
                    if(isset($_SESSION["loggedInUserID"])||isset($_SESSION["loggedInSellerID"])){
                        if (isset($_SESSION["loggedInUserID"])) {
                            $userID = $_SESSION["loggedInUserID"];
                        }
                        elseif (isset($_SESSION["loggedInSellerID"])) {
                            $userID = $_SESSION["loggedInSellerID"];
                        }
                        $retrieveInfo =  "SELECT * FROM client WHERE id='$userID';"; //Selecting all data from Table
                        $resultInfo = mysqli_query($con, $retrieveInfo); //Passing SQL
                        while($rowUser  = mysqli_fetch_assoc($resultInfo)){
                            echo "
                        <li>
                        <div class=\"nav-dropdown\">
                        <i class=\"fa fa-bell\" style=\"font-size:16px; color:black; margin-left:1em; margin-right:0; padding-right:0;\"></i><button onclick=\"dropFunc()\" class=\"notifbtn\">Messages</button>
                            <div id=\"notifDrop\" class=\"dropdown-content\">
                                <a href=\"#home\">You have a message from Nimal Bandara</a>
                            </div>
                        </div>
                        </li>

                        <li>
                        <div class=\"nav-dropdown\">
                            <img class=\"dp\" src=\"http://localhost/vegemart/public/images/users/{$rowUser['profilePic']}\" alt=\"Avatar\">
                            <div class=\"dropdown-content\">
                                <a href=\"http://localhost/vegemart/public/seller/seller_profile_edit.php\">View Profile</a>
                                <a href=\"http://localhost/vegemart/src/logout.php\">Logout</a>
                            </div>
                        </div>
                        </li>";
                    }                       
                }    
                else{
                    // echo"<li><a href=\"../login.php\">Login</a></li>";
                    echo"<li><button class=\"loginbtn\" onClick=\"location.href='http://localhost/vegemart/public/login.php';\">Login</button><li>";
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