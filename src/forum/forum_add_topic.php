<?php
    include ('../../config/dbconfig.php');
    include ('../session.php');

    //check for required fields from the form
    if ((!$_POST['topic_title']) || (!$_POST['post_text'])) {
        header("Location: ../../public/forum_home.php");
        exit;
    }

    if(isset($_SESSION["loggedInUserID"])||isset($_SESSION["loggedInSellerID"])){
        if (isset($_SESSION["loggedInUserID"])) {
            $userID = $_SESSION["loggedInUserID"];
        }
        elseif (isset($_SESSION["loggedInSellerID"])) {
            $userID = $_SESSION["loggedInSellerID"];
        }
    }    
    else{
        echo"<li><button class=\"loginbtn\" onClick=\"location.href='https://localhost/vegemart/login.php';\">Login</button><li>";
    } 

    $topic_title = $_POST['topic_title']; 
    $post_text = $_POST['post_text']; 

    //create and issue the first query
    $add_topic = "INSERT INTO `forum_topics` (`topic_id`,`topic_title`,`topic_create_time`, `topic_owner`, `topic_status`) VALUES ('','".$topic_title."', now(),'".$userID."', 0);";
    mysqli_query($con, $add_topic);
    
    $topic_id = mysqli_insert_id($con); //get the id of the last query 

    //create and issue the second query
    $add_post = "INSERT INTO `forum_posts` (`topic_id`,`post_text`,`post_create_time`, `post_owner`,`review_status`, `post_status`) VALUES ('".$topic_id."','".$post_text."', now(),'".$userID."', 0, 0);";
   
    if (mysqli_query($con, $add_post) === true) {

        $notification = "INSERT INTO `notification` (`type`,`forUser`,`entityID`, `notif_read`, `notif_time`) VALUES (11,'".$userID."', '".$topic_id."',0, now());";
        mysqli_query($con,$notification); 

        echo "
            <script>alert('Your post is sumbitted to review');
            window.location = '../../public/forum_home.php';        
            </script>";
        $message = base64_encode(urlencode("Successfully Added!"));
        exit();
    } else {
        $message = base64_encode(urlencode("SQL Error while Registering"));
       // header('Location:../../public/forum_home.php?msg=' . $message);
        exit();
    }


?>


