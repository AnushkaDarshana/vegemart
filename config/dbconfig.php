<?php
    $con = mysqli_connect("127.0.0.1","root","","vegemart2");
          
    if(!$con)
        {
            die("Cannot connect to DB server");
        }
          
    if ($con->connect_error) {
        die("Connection Failed". $conn->connect_error);
    }	
 ?>
