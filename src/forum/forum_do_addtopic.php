<?php
    include ('../../config/dbconfig.php');
    include ('../session.php');

    //check for required fields from the form
    if ((!$_POST['topic_owner']) || (!$_POST['topic_title']) || (!$_POST['post_text'])) {
        header("Location: ../../public/forum.php");
        exit;
    }

    $topic_title = $_POST['topic_title'];
    $topic_owner = $_POST['topic_owner'];  
    $post_text = $_POST['post_text']; 

    //create and issue the first query
    $add_topic = "INSERT INTO `forum_topics` (`topic_id`,`topic_title`,`topic_create_time`, `topic_owner`) VALUES ('','".$topic_title."', now(),'".$topic_owner."');";
    mysqli_query($con,$add_topic) or die(mysqli_error());
    
    //get the id of the last query 
    $topic_id = mysqli_insert_id($con);

    //create and issue the second query
    $add_post = "INSERT INTO `forum_posts` (`topic_id`,`post_text`,`post_create_time`, `post_owner`) VALUES ('".$topic_id."','".$post_text."', now(),'".$topic_owner."');";
    mysqli_query($con,$add_post) or die(mysqli_error($con));
    header('Location:../../public/forum.php');
?>


