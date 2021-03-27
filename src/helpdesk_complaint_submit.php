<?php
    include ('../config/dbconfig.php');
    include ('./session.php');

    if(isset($_SESSION["loggedInUserID"])||isset($_SESSION["loggedInSellerID"])){
        if (isset($_SESSION["loggedInUserID"])) {
            $userID = $_SESSION["loggedInUserID"];
        }
        elseif (isset($_SESSION["loggedInSellerID"])) {
            $userID = $_SESSION["loggedInSellerID"];
        }
    }    
    else{
        echo"<li><button class=\"loginbtn\" onClick=\"location.href='http://localhost/vegemart/login.php';\">Login</button><li>";
    } 
   
   if(isset($_POST['submit'])){
        // $first_name = $_POST['first_name'];
        // $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        // $phoneNum = $_POST['phoneNum'];
        $issue = $_POST['issue'];
        $issue_description = $_POST['issue_description'];

        $insertComplaint = "INSERT INTO `help_desk` (`user_id`, `date_time`, `email`, `issue`, `description`, `complaint_status`) VALUES ('".$userID."', now(),'".$email."','".$issue."','".$issue_description."', 0;";
        mysqli_query($con, $insertComplaint)  or die(mysqli_error($con));

        if (mysqli_query($con, $insertComplaint) === true) {
            $message = base64_encode(urlencode("Complaint recorded."));
            header('Location:../public/helpdesk_after_complaint.php');
            exit();
        } 
        else {
            $message = base64_encode(urlencode("SQL Error while Registering"));
            header('Location:../public/help_desk.php');
            exit();
        }

    }

    mysqli_close($con);

?>

