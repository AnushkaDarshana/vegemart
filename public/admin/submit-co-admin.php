<?php

    include('../../config/dbconfig.php');
    if(empty(session_id())){
        session_start();
    }
    if((!isset($_SESSION["loggedInAdminID"])) && (!isset($_SESSION["loggedInCoAdminID"])))
    {
        echo "<script>
        alert('You have to login first');
        window.location.href='../../public/login.php';
        </script>";
    }  
    else if(isset($_SESSION["loggedInAdminID"])){
        $userID = $_SESSION["loggedInAdminID"];
    } 
    else if(isset($_SESSION["loggedInCoAdminID"])){
        $userID = $_SESSION["loggedInCoAdminID"];
} 

 $id = $_POST["id"];
 $name = $_POST["name"];
 $email = $_POST["email"];
 $phone = $_POST["contact"];
 $dob = $_POST["postal"];
 $street = $_POST["street"];
 $city = $_POST["city"];
 

if(isset($_POST['add'])){

            $add_sql = "INSERT INTO co-admin (name, password, email, phone, type) 
            VALUES ('$name','$password','$email','$phone','$type')";
            
            if (mysqli_query($con,$add_sql) == TRUE) {
                $message = base64_encode(urlencode("Added Successful"));
                header('Location:./view-co-admin.php?msg=' . $message);
                echo "test 1";
				exit();
            } 
            
            else {
                 $message = base64_encode(urlencode("SQL Error while Registering"));
                 header('Location:./view-co-admin.php?msg=' . $message);
                 echo "test 2";
				 exit();
            }
}

    if(isset($_POST['delete'])){

        $suspend_sql = "UPDATE `users` 
                        SET `active_status` = 0
                        WHERE id = '$id' ";
        
        if (mysqli_query($con, $suspend_sql) == true) {
            $message = base64_encode(urlencode("Updated Successful"));
            header('Location:co-admin_mgt.php?msg=' . $message);
            exit();
        }
        else {
            $message = base64_encode(urlencode("SQL Error"));
            header('Location:co-admin_mgt.php?msg=' . $message);
            exit();
        }
        
    }

    if(isset($_POST['activate'])){

        $suspend_sql = "UPDATE `users` 
                        SET `active_status` = 1
                        WHERE id = '$id' ";
        
        if (mysqli_query($con, $suspend_sql) == true) {
            $message = base64_encode(urlencode("Updated Successful"));
            header('Location:co-admin_mgt.php?msg=' . $message);
            exit();
        }
        else {
            $message = base64_encode(urlencode("SQL Error"));
            header('Location:co-admin_mgt.php?msg=' . $message);
            exit();
        }
        
    }
 

if(isset($_POST["submit"])){



$sql="INSERT INTO `co-admin` (`ID`, `name`, `email`, `password`, `phone`,`add1`, `street`, `city`,`active_status`) VALUES (NULL, '".$name."', '".$email."', '".$password."', '".$phone."', '".$add1."', '".$street."', '".$city."','".$active_status."');";

if(  mysqli_query($con,$sql))
      {
          echo "Database uploaded Successfully";}
      else
      {
          echo "Error in updating Database";}

} 

if(isset($_POST['update'])){

    $update_sql = "UPDATE `admin` 
                   SET `name` = '$name', `contactNum` ='$phone', `address1` = '$dob', `address2` = '$street' , `city` = '$city'
                   WHERE user_id = '$id' ";
    
    if (mysqli_query($con,$update_sql) == TRUE) {
        $update_email = "UPDATE `users` 
        SET `email` = '$email'
        WHERE id = '$id' ";
        if (mysqli_query($con, $update_email) == true) {
            $message = base64_encode(urlencode("Updated Successful"));
            header('Location:co-admin_mgt.php?msg=' . $message);
            exit();
        }
    } 
    
    else {
         $message = base64_encode(urlencode("SQL Error"));
         header('Location:co-admin_mgt.php?msg=' . $message);
         exit();
    }
}


mysqli_close($con);

?>