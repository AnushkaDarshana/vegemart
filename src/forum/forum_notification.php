<?php
    
    //type 10 = post is submitted to review
    //type 11 = post is accepted
    //type 12 = post is rejected

    if (isset($_SESSION["loggedInUserID"])||isset($_SESSION["loggedInSellerID"])) {
        if (isset($_SESSION["loggedInUserID"])) {
            $userID = $_SESSION["loggedInUserID"];
        } 
        elseif (isset($_SESSION["loggedInSellerID"])) {
            $userID = $_SESSION["loggedInSellerID"];
        }

        $get_notification = "SELECT * from `notification` where `forUser` = $userID";
        $get_notification_res = mysqli_query($con, $get_notification);

        if (mysqli_num_rows($get_notification_res) > 0) {
            
            while ($notification = mysqli_fetch_assoc($get_notification_res)) {
                $display_block = "<div id=\"notif-block\" class=\"notif mb-1 pl-1 has-text-left\">";
                $get_notif = "SELECT * from `notification` where `type` = 10 order by `notif_time` desc";
                $get_notif_res = mysqli_query($con, $get_notif);
            
                if (mysqli_num_rows($get_notif_res) > 0) { 
                    while ($notification = mysqli_fetch_assoc($get_notif_res)) {
                        $notif_time = $notification['notif_time'];
                        $postID = $notification['entityID'];

                        $post = "SELECT * from `forum_posts` where `post_id` = $postID";
                        $post_res = mysqli_query($con, $post) or die(mysqli_error($con));
                        while ($notification = mysqli_fetch_array($post_res)) {
                            $topic_id= $notification['topic_id'];

                            $topic = "SELECT `topic_title` from `forum_topics` where `topic_id` = $topic_id";
                            $topic_res = mysqli_query($con, $topic) or die(mysqli_error($con));
                            while ($forum_notification = mysqli_fetch_array($topic_res)) {
                                $topic_title= $forum_notification['topic_title'];
                    
                                $display_block .="
                                <h2>Your post is submitted to review.</h2>
                                <h4 class=\"mb-0\">Your post for the topic $topic_title has been submitted to review.</h4>
                                <p class=\"mt-0 pl-3\">$notif_time</p>
                                <br><hr>";
                            }
                        }
                    }
                }

                $get_notif = "SELECT * from `notification` where `type` = 11 order by `notif_time` desc";
                $get_notif_res = mysqli_query($con, $get_notif);
            
                if (mysqli_num_rows($get_notif_res) > 0) {
                    // $display_block = "<div id=\"notif-block\" class=\"notif mb-1 pl-1 has-text-left\">";
            
                    while ($notification = mysqli_fetch_assoc($get_notif_res)) {
                        $notif_time = $notification['notif_time'];
                        $postID = $notification['entityID'];

                        $post = "SELECT * from `forum_posts` where `post_id` = $postID";
                        $post_res = mysqli_query($con, $post) or die(mysqli_error($con));
                        while ($notification = mysqli_fetch_array($post_res)) {
                            $topic_id= $notification['topic_id'];

                            $topic = "SELECT `topic_title` from `forum_topics` where `topic_id` = $topic_id";
                            $topic_res = mysqli_query($con, $topic) or die(mysqli_error($con));
                            while ($forum_notification = mysqli_fetch_array($topic_res)) {
                                $topic_title= $forum_notification['topic_title'];
                    
                                $display_block .="
                                <h2>Your forum post is accepted to view.</h2>
                                <h4 class=\"mb-0\">Your post for the topic $topic_title accepted to view. You can view it in the forum.</h4>
                                <p class=\"mt-0 pl-3\">$notif_time</p>
                                <br><hr>";
                            }
                        }
                    }
                }

                $get_notif = "SELECT * from `notification` where `type` = 12 order by `notif_time` desc";
                $get_notif_res = mysqli_query($con, $get_notif);
            
                if (mysqli_num_rows($get_notif_res) > 0) {
                    // $display_block = "<div id=\"notif-block\" class=\"notif mb-1 pl-1 has-text-left\">";
            
                    while ($notification = mysqli_fetch_assoc($get_notif_res)) {
                        $notif_time = $notification['notif_time'];
                        $postID = $notification['entityID'];

                        $post = "SELECT * from `forum_posts` where `post_id` = $postID";
                        $post_res = mysqli_query($con, $post) or die(mysqli_error($con));
                        while ($notification = mysqli_fetch_array($post_res)) {
                            $topic_id= $notification['topic_id'];

                            $topic = "SELECT `topic_title` from `forum_topics` where `topic_id` = $topic_id";
                            $topic_res = mysqli_query($con, $topic) or die(mysqli_error($con));
                            while ($forum_notification = mysqli_fetch_array($topic_res)) {
                                $topic_title= $forum_notification['topic_title'];
                    
                                $display_block .="
                                <h2>Your forum post is rejected by the administration.</h2>
                                <h4 class=\"mb-0\">Your post for the topic $topic_title rejected due to violation of vegemart policy. 
                                Please post content that are timely relevent and appropriate.</h4>
                                <p class=\"mt-0 pl-3\">$notif_time</p>
                                <br><hr>";
                            }
                        }
                    }   
                }
                 //close up the table
            $display_block .= "</div>";
            }
           
        }
    }
    else {
        echo" <div id=\"popup2\" class=\"overlay\">
        <div class=\"popup has-text-centered\">
            <a class=\"close\" href=\"https://localhost/vegemart/public/login.php\">&times;</a>
            <p><em>Please login to view notifications.</em></p>
            
        </div>
    </div>";
    }
    print $display_block;
?>