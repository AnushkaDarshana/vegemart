<?php
    include ('../src/session.php'); 
    include ('../config/dbconfig.php'); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="images/logo.png" rel="shortcut icon">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" rel="stylesheet">
        <link href="http://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <script src="https://kit.fontawesome.com/85eb26c5dd.js" crossorigin="anonymous"></script>
        <style>
            * {
                box-sizing: border-box;
            }
            body {
                line-height: 1.6;
                margin: 0;
                min-height: 90vh;
                max-width:100;
            }

            ul {
                margin: 0;
                padding: 0;
                color:black;
                list-style: none;
            }

            .header {
                display:flex;
                position: -webkit-sticky;
                position: sticky;
                top: 0;
                z-index: 4;
                padding: 5px 1.5%;
                border-bottom: 1px solid #D7DBDD;
                width: 100%;
                background-color: white;
            }

            .logopic{
                margin:auto;
                margin-top:2px;
                padding-bottom:0;
                margin-bottom:0;
                cursor: pointer;
                max-height:40px;
            }

            input[type=text] {
                width: 160px;
                max-height: 30px;
                box-sizing: border-box;
                border-color: transparent;
                border-bottom: 2px solid #ccc;
                margin-bottom: 1px;
                margin-right:0;
                font-size: 16px;
                background-color: white;
                background-image: url('searchicon.png');
                background-position: 10px 0px; 
                background-repeat: no-repeat;
                padding: 12px 20px 5px 10px;
                -webkit-transition: width 0.4s ease-in-out;
                transition: width 0.4s ease-in-out;
            }
            
            input[type=text]:focus {
                outline-width: 0;
                /* width: 80%; */
            }

            form .searchbtn{
                float: right;
                min-width:30px !important;
                max-height: 30px;
                background: #138D75;
                font-size: 17px;
                border: none;
                cursor: pointer;
            }

            .main-nav a {
                text-decoration: none;
                display: block;
                padding: 0px 15px;
                margin:auto;
                text-align: center;
                color:black;
                font-family: Candara;
                font-weight:500;               
                font-size: 1.2rem;
            }

            .main-nav a:hover {
                color: #A2D9CE;
            }

            .loginbtn {
                background-color: #138D75;
                border-color: transparent;
                color: #fff;
                font-family: Candara;
                font-size: 1.1rem;
                cursor: pointer;
                justify-content: center;
                margin: 0 1em;
                padding: 0.4em 1em;
                text-align: center;
                white-space: nowrap;
                border-radius: 0.3em;
            }

            button > i{
                color: white !important;
            }

            .notifbtn {
                background-color: transparent;
                border-color: transparent;
                margin:0 1em 0 1px;
                padding: 0.4em 1em 0.4em 0.2em;
                font-family: Candara;
                font-size: 1.2rem;
                border: none;
                cursor: pointer;
                color:black;
            }
            /* <i class=\"fa fa-bell\" style=\"font-size:16px; color:black; margin-left:1em; margin-right:0; padding-right:0;\"></i> */

            .dp{
                border-radius: 100%;
                max-height: 40px;
                cursor:pointer;
                padding: 0.3em 0 0 0;
                margin:0;
            } 

            .nav-dropdown {
                position: relative;
                display: inline-block;
            }

            #notifDrop{
                min-width: 250px !important; 
            }
            #notifDrop a{
                text-align:right;
                font-size:14px;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                right:10%;
                background-color: #F4F6F6;
                min-width:160px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                border-radius:5px;
                z-index: 1;
            }

            .dropdown-content a {
                display: block;
                text-decoration: none;
                color: black;
                font-size: 1.1rem;
                padding: 5px 16px;
            }

            .show {display: block;}

            .nav-dropdown:hover .dropdown-content {
                display: block;
            }

            /* ================================= 
            Media Queries
            ==================================== */

            @media (min-width: 769px) {
                .header,
                .main-nav {
                    display: flex;
                    align-items:center;
                    
                }
                .header {
                    flex-direction: column;
                    align-items: center;
                    .header{
                        width: 80%;
                        margin: 0 auto;
                        max-width: 1150px;
                    }
                }

            }

            @media (min-width: 1025px) {
                .header {
                    flex-direction: row;
                    justify-content: space-between;
                }
            }
        </style>
    </head>

    <body>
        <header class="header">
            <a href="./products.php"><img class="logopic" src="http://localhost/vegemart/public/images/logob.png"></a>
            
            <ul class="main-nav">
                <li><a href="http://localhost/vegemart/public/products.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="http://localhost/vegemart/public/forum_home.php">Forum</a></li>
                <li><a href="http://localhost/vegemart/public/shopping_cart.php"><i class="fas fa-shopping-cart mr-0" style="font-size:16px; color:black; padding-right:0.4em;"></i>Cart</a></li>
                
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
                            echo "
                        <li>
                        <div class=\"nav-dropdown\">
                            <i class=\"fa fa-bell\" style=\"font-size:16px; color:black; margin-left:1em; margin-right:0; padding-right:0;\"></i><button onclick=\"dropFunc()\" class=\"notifbtn\">Notifications</button>
                            <div id=\"notifDrop\" class=\"dropdown-content\">
                                <a href=\"#home\">You have a message from Nimal Bandara</a>
                            </div>
                        </div>
                        </li>

                        <li>
                        <div class=\"nav-dropdown\">
                            <img class=\"dp\" src=\"http://localhost/vegemart/public/images/users/{$rowUser['profilePic']}\" alt=\"Avatar\">
                            <div class=\"dropdown-content\">
                                <a href=\"http://localhost/vegemart/public/buyer_profile_edit.php\">View Profile</a>
                                <a href=\"http://localhost/vegemart/public/help_desk.php\">Help Desk</a>
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