<?php
    include ('../config/dbconfig.php');
    include ('./session.php');    
   
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneNum = $_POST['phoneNum'];
        $issue = $_POST['issue'];
        $issue_description = $_POST['issue_description'];

        $insertComplaint = "INSERT INTO `help_desk` ( `date_time`,`name`, `email`, `phoneNum`,`issue`, `description`, `complaint_status`) VALUES ( NOW(),'".$name."','".$email."','".$phoneNum."','".$issue."','".$issue_description."', 0);";
        
        if (mysqli_query($con, $insertComplaint) === true) {
            $message = base64_encode(urlencode("Complaint recorded."));
            echo "<script>alert('Your complaint is submitted');</script>";
            header('Location:../public/help_desk.php');
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

