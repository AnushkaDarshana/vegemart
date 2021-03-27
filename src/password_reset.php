<?php
    $alert='';
    require '../config/dbconfig.php';
    $token=$_POST['token'];
    if(isset($_POST['reset'])){
        $salt = md5(uniqid(rand(), true));
        $password=md5($salt.$_POST["password"]);
        $re_password=md5($salt.$_POST["re_password"]);
        if($password===$re_password){
            $ret_query="SELECT email FROM tokens WHERE token='$token'";            
            $ret_result=mysqli_query($con,$ret_query);
            if(mysqli_num_rows($ret_result)>0){
                $ret_array=mysqli_fetch_assoc($ret_result);
                $email=$ret_array['email'];
                $update_query="UPDATE users SET `password`='".$password."', `salt`='".$salt."' WHERE `email`='$email' ";
                $update_result=mysqli_query($con,$update_query);
                
                if(mysqli_affected_rows($con)>0){                
                    $delete_query="DELETE FROM tokens WHERE token='$token'";
                    $delete_result=mysqli_query($con,$delete_query);
                   echo "<script>alert('Password reset successfully');
                         window.location = '../public/login.php';
                        </script>"; 

                }
                else{
                    
                    echo "<script>alert('Failed to reset password');
                        window.location = '../public/login.php';                         
                        </script>"; 

                }

            }else{
                echo "<script>alert('Access denied token has used before');
                        window.location = '../public/email_verify.php';                         
                        </script>"; 
            }
        }
        else{
            echo "<script>
                    alert('Passwords does not match');
                    window.location = '../public/password_reset.php';                         
                    </script>";
        }
    }
    mysqli_close($con);
?>