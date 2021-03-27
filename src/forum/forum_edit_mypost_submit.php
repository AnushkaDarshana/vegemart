<?php
    include('../../config/dbconfig.php');
    include('../session.php');
    
    if (isset($_POST["submit"])) {
        $post_id= $_POST['editPostID'];
        $new_post_text = $_POST['post_content'];
        
        $updateQuery= "UPDATE `forum_posts` SET `post_text` = '".$new_post_text."' WHERE `post_id` = ". $post_id;
    
        if (mysqli_query($con, $updateQuery) === true) {
            $message = base64_encode(urlencode("Successfully Edited!"));
            header('Location:../../public/forum_myposts.php?msg='.$message);
            exit();
        } else {
            $message = base64_encode(urlencode("SQL Error while Registering"));
            header('Location:../../public/forum_myposts.php?msg=' . $message);
            exit();
        }
    } else {
        header("Location: ../../public/forum_edit_mypost.php");
        exit;
    }
    
    mysqli_close($con);
?>