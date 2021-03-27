<?php
    include ('../src/session.php'); 
    include ('../config/dbconfig.php');
    
    if (basename($_SERVER['PHP_SELF']) == "products.php"){

        if(isset($_POST["submit"]))
            {
                $location = $_POST["location"];
                $search = $_POST["search"];
                if($location=="Location"){
                    $retrieveProduct = "SELECT * FROM `products` WHERE name LIKE '$search%' AND `availability`=1 "; //Selecting all data from Table
                }
                            // $_GET['id]
                
                else if($location!="Location"){      
                    $retrieveProduct = "SELECT * FROM `products` WHERE `city`= '".$location."' AND name LIKE '$search%' AND `availability`=1"; //Selecting all data from Table
                }
                
            }
        else{
                $retrieveProduct = "SELECT * FROM `products` WHERE `availability`=1"; //Selecting all data from Table
            }
            $resultProduct = mysqli_query($con, $retrieveProduct); //Passing SQL         
        
    }
    
    elseif(basename($_SERVER['PHP_SELF']) == "bid.php"){
        $retrieveProduct = "SELECT * FROM `products` WHERE productID='".$productID."' AND `availability`=1"; //Selecting all data from Table
        $resultProduct = mysqli_query($con, $retrieveProduct); //Passing SQL  
    }     
?>