<?php
include ('../config/dbconfig.php');
include ('../src/session.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="images/logo.png" rel="shortcut icon">
        <title>Forum | Vegemart</title>
        <link rel="stylesheet" href="./css/forum.css">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/nav.css">
        <link rel="stylesheet" href="./css/footer.css">
    </head>

    <body>
        <?php if (isset($_SESSION["loggedInUserID"])) {
                include_once "./includes/nav.php";
            }
            if (isset($_SESSION["loggedInSellerID"])) {
                include_once "./seller/seller_nav.php";
            } 
        ?>
        <div class="heading">
            <h1><i class="fa fa-comments" style="font-size:38px; color:white; padding-right:0.2em;"></i>Vegemart Forum</h1>
        </div>
        <div class="tab has-text-centered">
            <button id="tab-button" onClick="location.href='./forum_home.php';">Home</button>
            <button id="tab-button" style="background-color: #D7DBDD;" onClick="location.href='./forum_myposts.php';">My Posts</button>
        </div>

        <div class="columns group">
            <div class="column is-2 mt-1 pt-1 ml-0 mr-0">
            </div>       
            <div class="column is-8 mt-1 ml-0 mr-1 has-text-centered">
                <div id="showtopic" class="card mt-2 pt-1 pb-2 pl-2 pr-2 has-text-centered"> 
                    <h2 id="title">Edit post</h2>

                    <?php
                        $post_id = $_GET['pid'];
                        $selectpost = "SELECT * FROM `forum_posts` WHERE post_id='".$post_id."'";
                        $postQuery = mysqli_query($con,$selectpost);
                    
                        $topic_id = $_GET['tid'];
                        $selecttopic = "SELECT `topic_title` FROM `forum_topics` WHERE topic_id='".$topic_id."'";
                        $topic_title = mysqli_fetch_assoc(mysqli_query($con,$selecttopic))['topic_title'];
                                                                        // echo print_r($topicQuery);

                        while($row = mysqli_fetch_assoc($postQuery)){?>
                            <form id="editPost" method="POST" action ="../src/forum/forum_edit_mypost_submit.php">
                                <input type="hidden" class="input-box" id="editPostID" name="editPostID" value="<?php echo $row['post_id']?>" required/><br>
                                <input type="text" class="input-box" id="topic_title" name="topic_title" value="<?php echo $topic_title ?>" readonly=true required/><br>
                                <!-- <textarea  placeholder="Post Text">post text pis supposed to be here</textarea> -->
                                <textarea class="ml-1 pl-1" rows="10" cols="110" wrap=virtual name="post_content" form="editPost" placeholder="Post content" value=""><?php echo $row['post_text']?></textarea>
                                <br>
                                <input class="form-button"  type="submit" name="submit" value="Save" onclick="myFunction()">
                                <input class="form-button" type="button" name="cancel" onclick="window.location.replace('./forum_show_myposts.php')" value="Cancel">                                           
                                <?php 
                                echo "<a style=\"text-decoration: none; color:#138D75; font-size:18px; font-family:Candara ; margin-top:10%;\" href=\"../src/forum/forum_delete_mypost.php?del=".$row['post_id']."\">Delete Post</a>
                            </form>";
                        }
                        mysqli_close($con);
                    ?>                                  
                                    
                </div>
                <br>
            </div>
            <div class="column is-2 mt-1 pt-1 ml-0 mr-0">
            </div>      
        </div>

        <script>
            function myFunction() {
                alert("Your post is submitted to review");
            }
        </script>

        <?php include_once "./includes/footer.php"; ?> 
    </body>
</html>