<?php

 include('../../config/dbconfig.php');


 $name = $_POST["name"];
 $email = $_POST["email"];
 $password = $_POST["password"];
 $phone = $_POST["phone"];
 $dob = $_POST["add1"];
 $street = $_POST["street"];
 $city = $_POST["city"];
 $active_status = $_POST["active_status"];


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


        $delete_sql = "DELETE FROM co-admin WHERE email = '$email'";
        if (mysqli_query($con,$delete_sql) == TRUE) {
            $message = base64_encode(urlencode("Deleted Successful"));
            header('Location:./view-co-admin.php?msg=' . $message);

            echo "test 3";
            exit();
        } 
        
        else {
             $message = base64_encode(urlencode("SQL Error"));
             header('Location:view-co-admin.php?msg=' . $message);
             echo "test 4";
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


    $update_sql = "UPDATE co-admin 
                    SET name = '$name', email ='$email', phone = '$phone', type ='$type'
                    WHERE email = '$email' ";
    
    if (mysqli_query($con,$update_sql) == TRUE) {
        $message = base64_encode(urlencode("Updated Successful"));
        header('Location:view-co-admin.php?msg=' . $message);
        echo "test 5";
        exit();
    } 
    
    else {
         $message = base64_encode(urlencode("SQL Error"));
         header('Location:view-co-admin.php?msg=' . $message);
         echo "test 6";
         exit();
    }
}


mysqli_close($con);

?>