<?php
    include ('../../config/dbconfig.php');
    include ('../../src/session.php');  
    //if(isset($_GET['res_id'])){
        $id=$sellerID;
        //  $retriewMenu = "SELECT * FROM restaurant WHERE res_id = ".$_GET['res_id'];
        $retriewMenu = "SELECT * FROM client WHERE user_id = ".$id;
        $resultMenu = mysqli_query($con,$retriewMenu);
        
    

?>