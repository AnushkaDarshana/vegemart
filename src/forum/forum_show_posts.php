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
    
    if (isset($_GET['topic_id'])) {//user selects a topic
        $encoded_topic_id=$_GET['topic_id'];//verify the topic exists
        $topic_id = base64_decode(urldecode($encoded_topic_id));
        $verify_topic = "SELECT `topic_title` from `forum_topics` where `topic_id` = $topic_id";
        $verify_topic_res = mysqli_query($con, $verify_topic) or die(mysqli_error($con));
    } else { //when user just loads the page without selects topic
        $verify_topic = "SELECT `topic_title` from `forum_topics`";
        $verify_topic_res = mysqli_query($con, $verify_topic) or die(mysqli_error($con));
    }
    
    while ($topic=mysqli_fetch_array($verify_topic_res)) {
        if (isset($_GET['topic_id'])) { //if user selects a topic
            $get_posts = "SELECT `post_id`,`topic_id`, `post_text`, date_format(post_create_time, '%b %e %Y at %r') as `fmt_post_create_time`, `post_owner` from `forum_posts`  where `topic_id` = $topic_id AND `post_status` = 1";
            $get_posts_res = mysqli_query($con, $get_posts) or trigger_error(mysqli_error($con));
        } else {//if user dont select a topic
            $get_posts = "SELECT `post_id`,`topic_id`, `post_text`, date_format(post_create_time, '%b %e %Y at %r') as `fmt_post_create_time`, `post_owner` from `forum_posts` where `post_status` = 1 order by `post_create_time` desc";
            $get_posts_res = mysqli_query($con, $get_posts) or trigger_error(mysqli_error($con));
        }

        if ((mysqli_num_rows($get_posts_res) < 1) && (mysqli_num_rows($verify_topic_res) < 1)) {
            //there are no posts, so say so
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
                $post_owner = stripslashes($posts_info['post_owner']);

                $user_info = "SELECT CONCAT(fName, ' ', lName) AS name, profilePic FROM client WHERE `user_id`=$post_owner";  // Get information from user table
                $user_info_res = mysqli_fetch_array(mysqli_query($con, $user_info));
                $post_owner = $user_info_res['name'];
                $post_owner_pic = $user_info_res['profilePic'];

                $topic = "SELECT `topic_title` from `forum_topics` where `topic_id` = $topicid";
                $topic_res = mysqli_query($con, $topic) or die(mysqli_error($con));

                while ($posts_info = mysqli_fetch_array($topic_res)) {
                    $topic_title = $posts_info['topic_title'];
                    //add to display
                    $display_block .=
                    "<div class=\"columns group pl-1 pr-2\">
                        <div class=\"column is-2\">
                            <div class=\"row\">
                                <img class=\"user-image\" src=\"http://localhost/vegemart/public/images/users/$post_owner_pic\" alt=\"\">
                                <h4>$post_owner<br></h4>
                            </div>                                   
                        </div>
                        <div class=\"column is-10\">
                            <div class=\"row\">
                                <h3 class=\"justify-text\">$topic_title</h3>
                                <p class=\"justify-text\">$post_text</p>
                                <p style=\"color:grey;\" class=\" mt-0 mb-0 pt-0 has-text-right\">$post_create_time</p>
                                <div class=\"row has-text-left\">
                                    <a style=\"text-decoration: none; color:#138D75; \" href=\"#popup1$post_id\">Reply</a>              
                                </div>                                                                                             
                            </div>                                   
                        </div>
                    </div>
                    <hr>";

                    $popup_block .= 
                    "<div id=\"popup1$post_id\" class=\"overlay\">
                        <div class=\"popup has-text-centered\">
                            <a class=\"close\" href=\"./forum_home.php\">&times;</a>
                            <h2 id=\"title\">Add a new post</h2>
                            <form method=\"POST\" action=\"../src/forum/forum_add_post.php\">
                                <input type=\"text\" class=\"input-box\" id=\"topic_title\" name=\"topic_title\" value=$topic_title readonly=true required/><br>
                                <textarea rows=\"6\" cols=\"70\" wrap=virtual name=\"post_text\" placeholder=\"Post Text\"></textarea>
                                <div class=\"row\">
                                    <input type=\"hidden\" name=\"op\" value=\"addpost\">
                                    <input type=\"hidden\" name=\"topic_id\" value=\"$topic_id\"> 
                                    <p><input type=\"submit\" class=\"form-button\" name=\"submit\" value=\"Add Post\" onclick=\"myFunction()\"></p>                 
                                </div>
                            </form>
                        </div>";
        
                }
                    $popup_block .= "</div>";// close up the pop up block
            }
        }
        
        $display_block .= "</div>"; //close up the table
        
        
    }
    print $display_block; 
        print $popup_block;
    
?>
    <!-- <html>
        <head>
        </head>
        <body>
             print $display_block; 
            print $popup_block;
        </body>
    </html> -->
