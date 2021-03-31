<?php     
    include ('../../src/session.php');
    include ('../../config/dbconfig.php');    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="images/logo.png" rel="shortcut icon">
        <link rel="stylesheet" type="text/css" href="../css/nav.css">
    </head>

    <body>
        <header class="header">
            <a href="./deliverer_home.php"><img class="logopic" src="../images/logob.png"></a>
            
            <ul class="main-nav">
                <li><a href="./deliverer_home.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="https://localhost/vegemart/public/help_desk.php">Help Desk</a></li>
                
                <li><a href="./my_deliveries.php">My Deliveries</a></li>
                <?php  
                    if(!isset($_SESSION["loggedInDelivererID"]))
                    {
                        echo "<script>
                        alert('You have to login first');
                        window.location.href='../login.php';
                        </script>";
                    }   

                    else if(isset($_SESSION["loggedInDelivererID"])){

                        $userID = $_SESSION["loggedInDelivererID"];
                        
                        $retrieveInfo =  "SELECT * FROM `deliverer` WHERE `user_id`='$userID';"; //Selecting all data from Table
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
                            <img class=\"dp\" src=\"https://localhost/vegemart/public/images/users/{$rowUser['profilePic']}\" alt=\"Avatar\">
                            <div class=\"dropdown-content\">
                                <a href=\"https://localhost/vegemart/public/deliverer/deliverer_profile_edit.php\">View Profile</a>
                                <a href=\"https://localhost/vegemart/src/logout.php\">Logout</a>
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
