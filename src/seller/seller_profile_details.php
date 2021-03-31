<?php
    include ('../../config/dbconfig.php');
    include ('../../src/session.php');

    $userID = $_SESSION["loggedInSellerID"];    
    $selectusers = "SELECT * FROM client WHERE user_id='$userID'";
    $selectemail = "SELECT * FROM users WHERE id='$userID'";
    $userquery = mysqli_query($con,$selectusers);
    $emailquery=mysqli_query($con,$selectemail);    

?>
