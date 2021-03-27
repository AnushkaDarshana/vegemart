<?php
    include ('../../config/dbconfig.php');
    include ('../../src/session.php'); 

    $sellerID=$sellerID;  
    
    $retrieve = "SELECT * FROM products WHERE sellerID='$sellerID' AND `availability`=1;";
    $result = mysqli_query($con, $retrieve); //Passing SQL

    
?>