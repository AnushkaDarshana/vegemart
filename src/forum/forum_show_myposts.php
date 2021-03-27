<?php
    include('../config/dbconfig.php');
    include('../src/session.php');

    if (!function_exists('mysqli_result')) {
        function mysqli_result($res, $row, $field=0)
        {
            $res->data_seek($row);
            $datarow = $res->fetch_array();
            return $datarow[$field];
        }
    }

    if (isset($_SESSION["loggedInUserID"])||isset($_SESSION["loggedInSellerID"])) {
        if (isset($_SESSION["loggedInUserID"])) {
            $userID = $_SESSION["loggedInUserID"];
        } 
        elseif (isset($_SESSION["loggedInSellerID"])) {
            $userID = $_SESSION["loggedInSellerID"];
        }

        $verify_user = "SELECT `topic_owner` from `forum_topics` where `topic_owner` = $userID";
        $verify_user_res = mysqli_query($con, $verify_user) or die(mysqli_error($con));
    
        while ($user=mysqli_fetch_array($verify_user_res)) {
            $get_posts = "SELECT `post_id`,`topic_id`, `post_text`, date_format(post_create_time, '%b %e %Y at %r') as `fmt_post_create_time`, `post_owner` from `forum_posts` where `post_owner` = $userID order by `post_create_time` desc";
            $get_posts_res = mysqli_query($con, $get_posts) or trigger_error(mysqli_error($con));
      
            if ((mysqli_num_rows($get_posts_res) < 1) && (mysqli_num_rows($verify_user_res) < 1)) {
                //there are no topics, so say so
                $display_block = "<P><em>No posts exist.</em></p>";
            } 
            else {
                $display_block = "<div class=\"mb-1\">";
                $popup_block =  "<div>";

                while ($posts_info = mysqli_fetch_array($get_posts_res)) {
                    $post_id = $posts_info['post_id'];
                    $topicid = $posts_info['topic_id'];
                    $post_text = nl2br(stripslashes($posts_info['post_text']));
                    $post_create_time = $posts_info['fmt_post_create_time'];
                    $topic = "SELECT `topic_title` from `forum_topics` where `topic_id` = $topicid";
                    $topic_res = mysqli_query($con, $topic) or die(mysqli_error($con));
                    while ($posts_info = mysqli_fetch_array($topic_res)) {
                        $topic_title = $posts_info['topic_title'];
                        $display_block .=
                        "
                        <h3 class=\"justify-text\">$topic_title</h3>
                        <p class=\"justify-text\">$post_text</p>
                        <p style=\"color:grey;\" class=\" mt-0 mb-0 pt-0 has-text-right\">$post_create_time</p>
                                  
                        <a href=\"http://localhost/vegemart/public/forum_edit_mypost.php?pid=$post_id&tid=$topicid\" class=\"mt-0 mb-0 pt-0 has-text-right\" style=\"text-decoration: none; color:#138D75;\">Edit Post</a>                                                                                                
                    <hr>";
                        $popup_block .=
                        "<div id=\"popup1$post_id\" class=\"overlay\">
                        <div class=\"popup has-text-centered\">
                            <a class=\"close\" href=\"#\">&times;</a>
                            <h2 id=\"title\">Add a new post</h2>
                            <form method=\"POST\" action=\"../src/forum/forum_reply_post.php\">
                                <input type=\"text\" class=\"input-box\" id=\"topic_title\" name=\"topic_title\" value=$topic_title readonly=true required/><br>
                                <textarea rows=\"6\" cols=\"70\" wrap=virtual name=\"post_text\" placeholder=\"Post Text\"></textarea>
                                <div class=\"row\">
                                    <input type=\"hidden\" name=\"op\" value=\"addpost\">
                                    <input type=\"hidden\" name=\"topic_id\" value=\"$topic_id\"> 
                                    <p><input type=\"submit\" class=\"form-button\" name=\"submit\" value=\"Add Post\"></p>                 
                                </div>
                            </form>
                        </div>";
                    }
                $popup_block .= "</div>";
                }
            }
            //close up the table
            $display_block .= "</div>";
        }
    } 
    else {
        echo"<li><button class=\"loginbtn\" onClick=\"location.href='http://localhost/vegemart/login.php';\">Login</button><li>";
    }
    print $display_block;
?>
    <!-- <html>
        <head>
        </head>
        <body>
            print $display_block;

        </body>
    </html> -->
