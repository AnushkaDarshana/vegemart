<?php   
    include ('../../config/dbconfig.php');
    include ('../../src/session.php');
    $userID = $_SESSION["loggedInDelivererID"];
    
    $selectusers = "SELECT * FROM `deliverer` WHERE delivererID='$userID'";
    $selectemail = "SELECT * FROM `users` WHERE id='$userID'";

    $userquery = mysqli_query($con,$selectusers);
    $emailquery = mysqli_query($con,$selectemail);

    while($row = mysqli_fetch_assoc($userquery)){
        include ('../../public/deliverer/deliverer_edit_details.php');
    }  
    mysqli_close($con);   
?>              
        