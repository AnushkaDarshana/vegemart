<?php
    include ('./session.php'); 
    include ('../config/dbconfig.php');
    // include ('../config/crypt.php');  
    include ('./utils/helpers.php');

    if(isset($_POST["login"])){
        $email=$_POST["email"];
        $sql = "SELECT * FROM `users` WHERE email='".$email."'";
        $result = mysqli_query($con, $sql);

        if($result === FALSE){
            writeLog(mysqli_error($con), "./logs");
        }
        if(mysqli_num_rows($result) >0){
            
            while($row = mysqli_fetch_assoc($result)){
                $salt = $row['salt'];
                $password = md5($salt.$_POST["password"]); 

                $active_status= $row['active_status'];
                $_SESSION["type"] =$row['userType'];
                
                if($password === $row['password'])  {
                    $logString = "USER ". $row['id'] ." ===> ". "logged in ";
                    writeLog($logString, "./logs");

                    if($row['userType'] === "seller"){ 
                        $_SESSION["loggedInSellerID"] =$row['id']; 
                        $_SESSION["userType"] =$row['userType'];                         
                        if($active_status == 1){
                            header('Location:../public/seller/seller_home.php'); 
                        } 
                         
                    }
                    elseif($row['userType'] === "user"){
                        $_SESSION["loggedInUserID"] =$row['id']; 
                        $_SESSION["userType"] =$row['userType']; 
                        if($active_status == 1){
                            header('Location:../public/products.php');
                        } 
                        
                    }
                    elseif($row['userType'] === "deliverer"){
                        $_SESSION["loggedInDelivererID"] =$row['id'];
                        $_SESSION["userType"] =$row['userType']; 
                        if($active_status == 1){
                            header('Location:../public/deliverer/deliverer_home.php');
                        }  
                        
                    }
                    elseif($row['userType'] === "admin"){
                        $_SESSION["loggedInAdminID"] =$row['id']; 
                        $_SESSION["userType"] =$row['userType']; 
                        if($active_status == 1){
                            header('Location:../public/admin/admin-dash.php'); 
                        } 
                        
                    }
                    elseif($row['userType'] === "coadmin"){
                        $_SESSION["loggedInCoAdminID"] =$row['id']; 
                        $_SESSION["userType"] =$row['userType']; 
                        if($active_status == 1){
                            header('Location:../public/admin/admin-dash.php'); 
                        } 
                    }
                }
                
                else{  
                    //return false;  
                    echo "<script>alert('Password does not match');
                    window.history.back();
                    </script>";
                    $_SESSION["valid"] = 0;  
                }
            }
        }
        else{
            
            echo "<script>alert('Email is incorrect');
            window.location = '../public/login.php';
            </script>";
            $_SESSION["valid"] = 0; 
        }
    }
    mysqli_close($con);
?>
