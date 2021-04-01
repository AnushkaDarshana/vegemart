
<?php
    include ('./session.php'); 
    include ('../config/dbconfig.php');
 
    if(empty(session_id())){
        session_start();
    }

    
    $target_dir = "../public/images/users/";
    $target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
          
    // Check if file already exists
    if (file_exists($target_file)) {
      //  echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
            
    // if everything is ok, try to upload file
    else{
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } 
        else {
        $message = base64_encode(urlencode("Sorry, there was an error uploading your file."));
       // header('Location:../../public/seller/seller_product_edit.php?msg=' . $message);
        exit();
        }
    }
    

    if(isset($_POST['submit']) || isset($_POST['deactivate'])){
        $id= $_POST['editID'];
        $newFName = $_POST['editFName'];
        $newLName = $_POST['editLName'];
        $newEmail = $_POST['editEmail'];
        $newPhoneNum = $_POST['editPhoneNum'];
        $newAddress1 = $_POST['editAddress1'];
        $newAddress2 = $_POST['editAddress2'];
        $newCity = $_POST['editCity'];
        $imageName = $_FILES["profilePic"]["name"];
        $imageData = $_FILES["profilePic"]["tmp_name"];
        $imageType = $_FILES["profilePic"]["type"];
        
        $user = "SELECT * FROM `users` WHERE id='".$id."'";
        $resultuser = mysqli_query($con, $user);
        
        while($row = mysqli_fetch_assoc($resultuser)){
            $salt = $row['salt'];
            $oldPassword = md5($salt.$_POST['password']);
            if($_POST['editPassword'] == ""){
                $newPassword=$oldPassword;
                $newConfirmPassword=$oldPassword;
            } else{
                $newPassword = md5($salt.$_POST['editPassword']);
                $newConfirmPassword = md5($salt.$_POST['editConfirmPassword']);
            }
            

            if($oldPassword === $row['password']) {   
        
                if ($newPassword != $newConfirmPassword){
                    $message = base64_encode(urlencode("Passwords do not match"));
                    header('Location:../public/buyer_profile_edit.php?msg=' . $message);
                    exit();
                }
                
                else{                   
                     //deactivate account
                     

                    if(isset($_POST['deactivate'])){
                        $userDeactivate= "UPDATE `users` SET `active_status`=0 WHERE `id`='$id' ";
                        
                        if ($con->query($userDeactivate) === true) {
                            echo "Record updated successfully";        
                            header('Location:https://localhost/vegemart/public/login.php');
                        } else {
                            echo "Error updating record: " . $con->error;
                        }
                    } 

                    //update details
                    else{
                        $updateUser= "UPDATE `users` SET email = '".$newEmail."',`password` = '".$newPassword."' WHERE id = '".$id."' ";
                        
                        if ($imageName=="") {
                            $updateQuery= "UPDATE `client` SET fName = '".$newFName."', lName = '".$newLName."', phoneNum = '".$newPhoneNum."', address1 = '".$newAddress1."', address2 = '".$newAddress2."', city = '".$newCity."' WHERE `user_id` = '".$id."' ";
                        } else {
                            $updateQuery= "UPDATE `client` SET fName = '".$newFName."', lName = '".$newLName."', phoneNum = '".$newPhoneNum."',profilePic = '".$imageName."', address1 = '".$newAddress1."', address2 = '".$newAddress2."', city = '".$newCity."' WHERE `user_id` = '".$id."' ";
                        }

                        if (mysqli_query($con, $updateQuery) && mysqli_query($con, $updateUser)) {
                            $message = base64_encode(urlencode("Successfully Edited!"));
                            header('Location:../public/buyer_profile_edit.php?msg=' . $message);
                            exit();
                        } else {
                            $message = base64_encode(urlencode("SQL Error while Registering"));
                             header('Location:../public/buyer_profile_edit.php?msg=' . $message);
                            exit();
                        }
                    }
                }
            }
            else{  
                //return false;  
                echo "<script>alert('Password does not match');
                window.history.back();
                </script>";
            }
        }    
    }
    
    mysqli_close($con);
?>