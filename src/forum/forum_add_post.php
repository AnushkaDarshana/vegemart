<?php
    include ('../../config/dbconfig.php');
    include ('../session.php');

    if (!function_exists('mysqli_result')) {
        function mysqli_result($res, $row, $field=0) {
            $res->data_seek($row);
            $datarow = $res->fetch_array();
            return $datarow[$field];
        }
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

    if ($_POST["op"] != "addpost") {
        // showing the form; check for required item in query string
        if (!$_GET['post_id']) {
          header("Location:./forum_show_posts#popup$post_id.php");
           exit;
        }
    
        //still have to verify topic and post
        $verify = "SELECT `ft.topic_id`, `ft.topic_title` from `forum_posts` as `fp` left join `forum_topics` as `ft` on `fp.topic_id` = `ft.topic_id` where `fp.post_id` = $_GET[post_id]";
   
        $verify_res = mysqli_query($verify, $con) or die(mysqli_error($con));
        if (mysqli_num_rows($verify_res) < 1) {
            //this post or topic does not exist
            header("Location:../../public/forum_home.php");
            exit;
        } 
        else {
            //get the topic id and title
            $topic_id = mysqli_result($verify_res, 0, 'topic_id');
            $topic_title = stripslashes(mysqli_result($verify_res,0,'topic_title'));
        }
    } 
    else if ($_POST['op'] == "addpost") {
            //check for required items from form
        if ((!$_POST['topic_id']) || (!$_POST['post_text'])) {
            header("Location:../../public/forum_home.php");
                exit;
        }

        $topic_id = $_POST['topic_id']; 
        $post_text = $_POST['post_text']; 

        $insertQuery = "INSERT INTO `forum_posts` (`topic_id`,`post_text`,`post_create_time`, `post_owner`, `review_status`, `post_status`) VALUES ('".$topic_id."','".$post_text."', now(),'".$userID."', 0, 0)";
        $post_id = mysqli_insert_id($con); 

        if (mysqli_query($con, $insertQuery) === true) {
            $message = base64_encode(urlencode("Successfully Edited!"));
            header('Location:../../public/forum_home.php?msg='.$message);

            $notification = "INSERT INTO `notification` (`type`,`forUser`,`entityID`, `notif_read`, `notif_time`) VALUES (10,'".$userID."', '".$post_id."',0, now());";
            mysqli_query($con,$notification); 

            exit();
        } else {
            $message = base64_encode(urlencode("SQL Error while Registering"));
            header('Location:../../public/forum_home.php?msg=' . $message);
            exit();
        }
    }
?>