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

    //check to see if we're showing the form or adding the post
    if ($_POST['op'] != "addpost") {

        // showing the form; check for required item in query string
        if (!$_GET['post_id']) {
            header("Location: topiclist.php");
            exit;
        }
        $post_id = $_GET['post_id'];
          //still have to verify topic and post
        $verify = "SELECT ft.topic_id, ft.topic_title from `forum_posts` as `fp` left join `forum_topics` as `ft` on fp.topic_id = ft.topic_id where fp.post_id = $post_id";

        $verify_res = mysqli_query($con,$verify) or die(mysqli_error($con));
        if (mysqli_num_rows($verify_res) < 1) {
            //this post or topic does not exist
            header("Location: ../../public/forum.php");
            exit;
        } 
        else {
            //get the topic id and title
            $topic_id = mysqli_result($verify_res,0,'topic_id');
            $topic_title = stripslashes(mysqli_result($verify_res,0,'topic_title'));

            print "<html>
                <head>
                </head>
                <body>
                <form method=\"POST\" action=\"$_SERVER[PHP_SELF]\">
                    <input type=\"text\" class=\"input-box\" name=\"post_owner\" placeholder=\"Your name\" required/><br>
                    <textarea rows=\"6\" cols=\"80\" wrap=virtual name=\"post_text\" placeholder=\"Post Text\"></textarea>
                    <div class=\"row\">
                        <input type=\"hidden\" name=\"op\" value=\"addpost\">
                        <input type=\"hidden\" name=\"topic_id\" value=\"$topic_id\"> 
                        <P><input type=\"submit\" name=\"submit\" value=\"Add Post\"></p>                 
                    </div>
                </form>
                </body>
            </html>";
        }
    } else if ($_POST['op'] == "addpost") {
        //check for required items from form
        if ((!$_POST['topic_id']) || (!$_POST['post_text']) || (!$_POST['post_owner'])) {
            header("Location: ../../public/forum.php");
            exit;
        }

        $topic_id = $_POST['topic_id'];
        $post_text = $_POST['post_text'];
        $post_owner = $_POST['post_owner'];

     
        //add the post
        $add_post = "INSERT INTO `forum_posts` values ('', '".$topic_id."', '".$post_text."', now(), '".$post_owner."');";
        mysqli_query($con,$add_post) or die(mysqli_error());
     
        //redirect user to topic
        header("Location: ../../public/forum.php");
        exit;
    }
?>