<?php 

    include ('../src/session.php'); 
    include ('../config/dbconfig.php');

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
            echo "<img class=\"dp\" src=\"http://localhost/vegemart/images/users/{$rowUser['profilePic']}\" alt=\"Avatar\">";
        }                       
    }    //$userID=6;
    else{
        echo"<li><button class=\"loginbtn\" onClick=\"location.href='http://localhost/vegemart/login.php';\">Login</button><li>";
    } 
    mysqli_close($con);

?> 