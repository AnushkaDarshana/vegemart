<?php
include('../config/dbconfig.php');
include('../src/session.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="images/logo.png" rel="shortcut icon">
        <title>Forum | Vegemart</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="./css/forum.css">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/footer.css">
    </head>

    <body>
        <?php include "./includes/nav.php"; ?>

        <div class="heading">
            <h1><i class="fa fa-comments" style="font-size:38px; color:white; padding-right:0.2em;"></i>Vegemart Forum</h1>
        </div>
        <div class="tab has-text-centered">
            <button id="tab-button" style="background-color: #D7DBDD;" onClick="location.href='./forum_home.php';">Home</button>
            <button id="tab-button" onClick="location.href='./forum_myposts.php';">My Posts</button>
        </div>
        <!-- <div class="content"> -->
            <div class="columns group">
                <div class="column is-4 mt-1 pt-1 ml-0 mr-0">
                    <a class="mainbutton" href="#popup2">Start Discussion</a>
                    <h2 id="title" class="mt-1 pt-1">Topics</h2>
                    <div class="topics">
                        <?php include_once "../src/forum/forum_show_topics.php"; ?>
                    </div>
                </div>

                <div class="column is-8 mt-1 ml-0 mr-1 has-text-centered">
                    <div id="showtopic" class="row mt-2">
                        <?php include_once "../src/forum/forum_show_posts.php"; ?>
                    </div>
                </div>
            </div>

            <!-- Start new Discussion -->
            <div id="popup2" class="overlay">
                <div class="popup has-text-centered">
                    <a class="close" href="./forum_home.php">&times;</a>
                    <h2 id="title">Start a new Discussion</h2>
                    <form method="POST" action="../src/forum/forum_add_topic.php">
                        <input type="text" class="input-box" name="topic_title" placeholder="Discussion Topic" required /><br>
                        <textarea class="ml-1 pl-1" rows="6" cols="60" wrap=virtual name="post_text" placeholder="Post Text"></textarea>
                        <div class="row">
                            <input class="form-button" type="submit" name="submit" value="Add Topic">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php include_once "./includes/footer.php"; ?>
    </body>

</html>