<?php
    include('../../config/dbconfig.php');
    include('../../src/session.php');

  
    $get_posts = "SELECT `post_id`,`topic_id`, `post_text`, date_format(post_create_time, '%b %e %Y at %r') as `fmt_post_create_time`, `post_owner` from `forum_posts` where `review_status` = 0 order by `post_create_time` asc";
    $get_posts_res = mysqli_query($con, $get_posts) or trigger_error(mysqli_error($con));

    if (mysqli_num_rows($get_posts_res) < 1) {
        $display_block = "<p><em>No posts to review!.</em></p>";
    } 
    else {
        $display_block = "<div class=\"mb-1\">";

        while ($posts_info = mysqli_fetch_array($get_posts_res)) {
            $post_id = $posts_info['post_id'];
            $topicid = $posts_info['topic_id'];
            $post_text = nl2br(stripslashes($posts_info['post_text']));
            $post_create_time = $posts_info['fmt_post_create_time'];
            $post_owner = stripslashes($posts_info['post_owner']);
            // Get information from user table
            $user_info = "SELECT CONCAT(fName, ' ', lName) AS name, profilePic FROM client WHERE `user_id`=$post_owner";
            $user_info_res = mysqli_fetch_array(mysqli_query($con, $user_info));
            $post_owner = $user_info_res['name'];
            $post_owner_pic = $user_info_res['profilePic'];
            $topic = "SELECT `topic_title` from `forum_topics` where `topic_id` = $topicid";
            $topic_res = mysqli_query($con, $topic) or die(mysqli_error($con));

            while ($posts_info = mysqli_fetch_array($topic_res)) {
                $topic_title = $posts_info['topic_title'];
        
                //add to display
                $display_block .=
                "<tr>   
                    <form method=post action=\"$_SERVER[PHP_SELF]\">     
                        <td><img class=\"user-image\" src=\"http://localhost/vegemart/public/images/users/$post_owner_pic\" alt=\"\"><br>
                        $post_owner</td>
                        <input type=\"hidden\" name=\"topic_id\" value=\"$topicid\"> 
                        <td>$topic_title</td>
                        <td class=\"justify-text\">$post_text</td>
                        <td>$post_create_time</td>
                        <td><input type=\"submit\" class=\"green-button mt-0 mb-0\" style=\"border-radius: 20px;!important\" value=\"Accept\" name=\"accepted\"></td>
                        <td><input type=\"submit\" class=\"red-button mt-0 mb-0\" style=\"border-radius: 20px;!important\" value=\"Reject\" name=\"rejected\"></td>
                    </form>
                </tr>";
            }
        }
    
        if (isset($_POST['accepted'])) {
            $topic_id=$_POST["topic_id"];
            $verify_status = "SELECT `topic_status` from `forum_topics` where `topic_id` = " . $topic_id;
            $verify_status_res = mysqli_query($con, $verify_status_res) or trigger_error(mysqli_error($con));

            $topic_status = $verify_status_res['topic_status'];

            if ($topic_status == 0) {
                $updateStatus= "UPDATE `forum_topics` SET `topic_status` = 1 where `topic_id` = " . $topic_id;
            }

            $updateQuery= "UPDATE `forum_posts` SET `review_status` = 1, `post_status` = 1 WHERE post_id = " . $post_id;

            if (mysqli_query($con, $updateQuery) === true && mysqli_query($con, $updateStatus) === true) {
                $message = base64_encode(urlencode("Successfully Edited!"));
                header('Location:../../public\admin\forum_review.php?msg='.$message);
                exit();
            } else {
                $message = base64_encode(urlencode("SQL Error while Registering"));
                header('Location:../../public\admin\forum_review.php?msg=' . $message);
                exit();
            }
        }
        if (isset($_POST['rejected'])) {
            $updateQuery= "UPDATE `forum_posts` SET `review_status` = 1, `post_status` = 0 WHERE post_id = " . $post_id;
        
            if (mysqli_query($con, $updateQuery) === true) {
                $message = base64_encode(urlencode("Successfully Edited!"));
                header('Location:../../public\admin\forum_review.php?msg='.$message);
                exit();
            } else {
                $message = base64_encode(urlencode("SQL Error while Registering"));
                header('Location:../../public\admin\forum_review.php?msg=' . $message);
                exit();
            }
        }
    }
            $display_block .= "</div>";  //close up the table
    print $display_block;
?>
