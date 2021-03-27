<?php
    include ('../src/session.php'); 
    include ('../config/dbconfig.php');

    $sql = "SELECT DISTINCT `city` FROM `products`;";
    $result = mysqli_query($con,$sql);
    
?>