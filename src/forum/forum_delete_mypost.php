<?php
    include ('../../config/dbconfig.php');
    include ('../session.php');
    
    if(isset($_GET['del'])){
        $post_id = $_GET['del'];
        
        $deleteQuery= "DELETE from `forum_posts` WHERE post_id = ".$post_id;   
        
        if (mysqli_query($con,$deleteQuery) === TRUE) {
            $message = base64_encode(urlencode("Successfully Deleted!"));
            header('Location:../../public/forum_myposts.php?msg='.$message);
            exit();
        }  
        else {
            $message = base64_encode(urlencode("SQL Error while Registering"));
            header('Location:../../public/forum_myposts.php?msg=' . $message);
            exit();
        }
        
    }
    else{
        header("Location: ../../public/forum_edit_mypost.php");
        exit;
    }
    
    mysqli_close($con);
?>