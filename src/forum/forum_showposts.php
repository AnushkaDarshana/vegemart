<?php
    include ('../config/dbconfig.php');
    include ('../src/session.php'); 

    if (!function_exists('mysqli_result')) {
        function mysqli_result($res, $row, $field=0) {
            $res->data_seek($row);
            $datarow = $res->fetch_array();
            return $datarow[$field];
        }
    }
    
    //$topic_id=$_GET['topic_id'];
    if(isset($_GET['topic_id'])){
    //verify the topic exists
        $encoded_topic_id=$_GET['topic_id'];
        $topic_id = base64_decode(urldecode($encoded_topic_id));
        $verify_topic = "SELECT `topic_title` from `forum_topics` where `topic_id` = $topic_id";
        $verify_topic_res = mysqli_query($con,$verify_topic) or die(mysqli_error($con));
    }
    else{        
        $verify_topic = "SELECT `topic_title` from `forum_topics`";
        $verify_topic_res = mysqli_query($con,$verify_topic) or die(mysqli_error($con));
    }
    
    while($topic=mysqli_fetch_array($verify_topic_res)){
        
        if(isset($_GET['topic_id'])){
            
            $get_posts = "SELECT `post_id`,`topic_id`, `post_text`, date_format(post_create_time, '%b %e %Y at %r') as `fmt_post_create_time`, `post_owner` from `forum_posts`  where `topic_id` = $topic_id";
            $get_posts_res = mysqli_query($con,$get_posts) or trigger_error(mysqli_error($con));
        }
        else{
            $get_posts = "SELECT `post_id`,`topic_id`, `post_text`, date_format(post_create_time, '%b %e %Y at %r') as `fmt_post_create_time`, `post_owner` from `forum_posts`";
            $get_posts_res = mysqli_query($con,$get_posts) or trigger_error(mysqli_error($con));
        }

    
    if ((mysqli_num_rows($get_posts_res) < 1) && (mysqli_num_rows($verify_topic_res) < 1)){
        //there are no topics, so say so
        $display_block = "<P><em>No posts exist.</em></p>";
    } 
    else {
        $display_block = "<div class=\"mb-1\">";
        while ($posts_info = mysqli_fetch_array($get_posts_res)) {
            $post_id = $posts_info['post_id'];
            $topicid = $posts_info['topic_id'];
            $post_text = nl2br(stripslashes($posts_info['post_text']));
            $post_create_time = $posts_info['fmt_post_create_time'];
            $post_owner = stripslashes($posts_info['post_owner']);
            $topic = "SELECT `topic_title` from `forum_topics` where `topic_id` = $topicid";
            $topic_res = mysqli_query($con,$topic) or die(mysqli_error($con));
            while ($posts_info = mysqli_fetch_array($topic_res)) {
            $topic_title = $posts_info['topic_title'];            
            
            //add to display
            $display_block .= 
            "<div class=\"columns group pl-1 pr-2\">
                <div class=\"column is-2\">
                    <div class=\"row\">
                        <img class=\"user-image\" src=\"https://www.flaticon.com/premium-icon/icons/svg/2633/2633302.svg\" alt=\"\">
                        <h4>$post_owner<br></h4>
                    </div>                                   
                </div>
                <div class=\"column is-10\">
                    <div class=\"row\">
                        <h3 class=\"justify-text\">$topic_title</h3>
                        <p class=\"justify-text\">$post_text</p>
                        <p style=\"color:grey;\" class=\" mt-0 mb-0 pt-0 has-text-right\">$post_create_time</p>
                        <div class=\"row has-text-left\">
                            <i class=\"fa fa-thumbs-up\" style=\"font-size:25px; color:#138D75; margin-right:10px;\"></i>10
                            <i class=\"fa fa-thumbs-down\" style=\"font-size:25px; color:#black; margin-left:10px; margin-right:10px;\"></i>1
                            <i class=\"fa fa-comment-o\" style=\"font-size:25px; color:#black; margin-left:25px; margin-right:15px;\"></i>3 Comments
                            <a href=\"../src/forum/forum_replytopost.php?post_id=$post_id\">Reply</a>
                        
                        </div>                                                                                                    
                    </div>                                   
                </div>
            </div>
            <hr>";
        } 
    }}
        //close up the table
        $display_block .= "</div>";
    }


    
?>
    <html>
        <head>
        </head>
        <body>
            <?php print $display_block; ?>
        </body>
    </html>
