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

    if(isset($_SESSION["loggedInUserID"])||isset($_SESSION["loggedInSellerID"])){
        if (isset($_SESSION["loggedInUserID"])) {
            $userID = $_SESSION["loggedInUserID"];
        }
        elseif (isset($_SESSION["loggedInSellerID"])) {
            $userID = $_SESSION["loggedInSellerID"];
        }
    }    
    else{
        echo"
        <div id=\"popup2\" class=\"overlay\">
            <div class=\"popup has-text-centered\">
                <a class=\"close\" href=\"#\">&times;</a>
                <p><em>Please login to post.</em></p>
                
            </div>
        </div>";
    } 


    //gather the topics
    $get_topics = "SELECT `topic_id`, `topic_title`, date_format(topic_create_time, '%b %e %Y at %r') as `fmt_topic_create_time`, `topic_owner` from `forum_topics` where `topic_status`=1 order by `topic_create_time` desc";

    $get_topics_res = mysqli_query($con,$get_topics) or die(mysqli_error($con));
    if (mysqli_num_rows($get_topics_res) < 1) {
        //there are no topics, so say so
        $display_block = "<p><em>No topics exist.</em></p>";
    } 
    else {
        //create the display string
        $display_block = 
        "<table>";

        while ($topic_info = mysqli_fetch_array($get_topics_res)) {
            $topic_id = $topic_info['topic_id'];
            $topic_title = stripslashes($topic_info['topic_title']);
            $topic_create_time = $topic_info['fmt_topic_create_time'];
            $topic_owner = stripslashes($topic_info['topic_owner']);
            
            $user_info = "SELECT CONCAT(fName, ' ', lName) AS name FROM client WHERE `user_id`=$topic_owner"; // Get information from user table
            $user_info_res = mysqli_fetch_array(mysqli_query($con,$user_info));
            $topic_owner = $user_info_res['name'];

            //get number of posts
            $get_num_posts = "SELECT count(post_id) from `forum_posts` where `topic_id` = $topic_id";
            $get_num_posts_res = mysqli_query($con,$get_num_posts) or die(mysqli_error($con));
            $num_posts = mysqli_result($get_num_posts_res,0,'count(post_id)');
            $encode_id=urlencode(base64_encode($topic_id));

            if($num_posts > 0){
                $display_block .= 
                "<tr>
                    <td class=\"pl-2 pr-2\">
                        <a href=\"forum_home.php?topic_id=$encode_id\">$topic_title</a><br>
                        Created on $topic_create_time by $topic_owner <br>
                        <p style=\"text-align:right;\">$num_posts People are talking about this topic</p>
                        <br>
                    </td>
                </tr>";
            }

        }

        //close up the table
        $display_block .= "</table>";
        
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