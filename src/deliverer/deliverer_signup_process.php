<?php
    include ('../../config/dbconfig.php') ;
    include ('../session.php') ;
      
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
            header('Location:../../public/deliverer/deliverer_signup.php?msg=' . $message);
            exit();
            }
    }

    if(isset($_POST["register"])){
        $imageName = $_FILES["profilePic"]["name"];
        $imageData = $_FILES["profilePic"]["tmp_name"];
        $imageType = $_FILES["profilePic"]["type"];
        $fName = $_POST["fName"];
        $lName = $_POST["lName"];
        $email = $_POST["email"];
        $phoneNum = $_POST["phoneNum"];
        $vehicle = $_POST['vehicle'];;
        $vehicleNo = $_POST["vehicleNo"];
        $address1 = $_POST["address1"];
        $address2 = $_POST["address2"];
        $city = $_POST["city"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        $userType = "deliverer";
        $active_status=1;

        if ($password === $confirmPassword) {
            $sql_e = "SELECT * FROM users WHERE email='".$email."'";
            $res_e = mysqli_query($con, $sql_e);
            if(mysqli_num_rows($res_e) > 0){
                echo "<script type='text/javascript'>
                alert('email already exists');
                window.history.back();           
                </script>";
                        
            }else{
                $salt = md5(uniqid(rand(), true));
                $password_hash = md5($salt.$password); 

                if($imageName==""){
                    $imageName="default.png";
                }
                $user = "INSERT INTO `users` (`email`,`password`,`salt`, `userType`, `active_status`) VALUES ('".$email."','".$password_hash."','".$salt."','".$userType."','".$active_status."');";
                mysqli_query($con,$user);
                
                $user_id = mysqli_insert_id($con);

                $deliverer = "INSERT INTO `deliverer` (`user_id`, `fName`,`lName`,`phoneNum`,`vehicle`,`vehicleNo`,`address1`,`address2`,`city`,`profilePic`) VALUES ('".$user_id."','".$fName."','".$lName."','".$phoneNum."','".$vehicle."','".$vehicleNo."','".$address1."','".$address2."','".$city."','".$imageName."');";
                mysqli_query($con,$deliverer);
               
                header('Location:../../public/login.php');
            }
                              
        }else {
            echo "<script type='text/javascript'>
                alert('password does not match');
                window.history.back();           
                </script>";
        }

    }

?>