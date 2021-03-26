<?php
    require '../config/dbconfig.php';
    $alert='';
   
    if(isset($_POST['send'])){
        $email=$_POST['email'];
        $query="SELECT email FROM users WHERE email='$email'";
        $result=mysqli_query($con,$query);
        if(mysqli_num_rows($result)>0){
            $token=uniqid(md5(time()));
            $query="INSERT INTO tokens (email,token) VALUES ('$email','$token')";
            $insert_result=mysqli_query($con,$query);
            //send token to the email
            $to=$email;
            $from='vegemartucsc@gmail.com';
            $subject="Password reset token";
            $message='A request has been recieved to change the password for your vegemart accoount.';
            $message.='Please follow the url and reset your password.The link will only be valid for one time use only.<br>';
            $message.='http://localhost/vegemart/public/password_reset.php?token='.$token;
            $header="From: {$from}\r\nContent-Type: text/html;";

            $send_result=mail($to,$subject,$message,$header);
            if($send_result)            
            echo "<script>alert('Reset Link is sent to the email');
                  window.location = '../public/login.php';
                  </script>";   

            else
                $alert="<div class='failed'>Failed to send the mail!</div>";
        }
        else 
        $alert="<p class='error'>The entered email is not a registerd email address!Please try with a valid email address.</p>";
    }
    mysqli_close($con);

?>