<?php
    include ('../../config/dbconfig.php');
    include ('../session.php');  
    
    $target_dir = "../../public/images/users/";
    $target_file = $target_dir . basename($_FILES["profilePic"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
              
    // if everything is ok, try to upload file
    else {
        if (move_uploaded_file($_FILES["profilePic"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["profilePic"]["name"]). " has been uploaded.";
        } 
        else {
            $message = base64_encode(urlencode("Sorry, there was an error uploading your file."));
            header('Location:../../public/deliverer/deliverer_edit_details.php?msg=' . $message);
            exit();
            }
    }

    if(isset($_POST['submit']) || isset($_POST['deactivate'])){
        $id= $_POST['editID'];
        $newFName = $_POST['editFName'];
        $newLName = $_POST['editLName'];
        $newEmail = $_POST['editEmail'];
        $newPhoneNum = $_POST['editPhoneNum'];
        $newVehicle = $_POST['vehicle'];
        $newVehicleNo = $_POST['vehicleNo'];
        $newCity = $_POST['editCity'];
        $imageName = $_FILES["profilePic"]["name"];
        $imageData = $_FILES["profilePic"]["tmp_name"];
        $imageType = $_FILES["profilePic"]["type"];
        
    
        $sql = "SELECT * FROM users WHERE id='".$id."'";
        $result = mysqli_query($con, $sql);
        
        while($row = mysqli_fetch_assoc($result)){
            $salt = $row['salt'];
            $oldPassword = md5($salt.$_POST['password']);
            if($_POST['editPassword'] == ""){
                $newPassword=$oldPassword;
                $newConfirmPassword=$oldPassword;
            } else{
                $newPassword = md5($salt.$_POST['editPassword']);
                $newConfirmPassword = md5($salt.$_POST['editConfirmPassword']);
            }

            if($oldPassword === $row['password'])  {    
        
                if ($newPassword != $newConfirmPassword){
                    $message = base64_encode(urlencode("Passwords do not match"));
                    header('Location:../../public/deliverer/deliverer_edit_details.php.php?msg=' . $message);
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

                    //update profile                    
                        $updateUser= "UPDATE `users` SET email = '".$newEmail."',`password` = '".$newPassword."' WHERE id = '".$id."' ";      
                        
                        if($imageName==""){
                            $updateQuery= "UPDATE `deliverer` SET fName = '".$newFName."', lName = '".$newLName."', phoneNum = '".$newPhoneNum."', vehicle = '".$newVehicle."', vehicleNo = '".$newVehicleNo."', city = '".$newCity."' WHERE user_id = '".$id."' ";
                        }
                        else{
                            $updateQuery= "UPDATE `deliverer` SET fName = '".$newFName."', lName = '".$newLName."', phoneNum = '".$newPhoneNum."',profilePic = '".$imageName."', vehicle = '".$newVehicle."', vehicleNo = '".$newVehicleNo."', city = '".$newCity."' WHERE user_id = '".$id."' ";   
                        }   
                        if (mysqli_query($con,$updateQuery)&&mysqli_query($con,$updateUser)) {
                            $message = base64_encode(urlencode("Successfully Edited!"));
                            header('Location:../../public/deliverer/deliverer_home.php?msg=' . $message);
                            exit();
                        } 
                        else {
                            $message = base64_encode(urlencode("SQL Error while Registering"));
                            header('Location:../../public/deliverer/deliverer_edit_details.php.php?msg=' . $message);
                            exit();
                        }
                }
            }
            else{  
                //return false;  
                echo "<script>alert('Current password does not match');
                window.history.back();
                </script>";
            }
        }    
    }
    
    mysqli_close($con);
?>