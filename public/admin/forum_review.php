<?php
    include ('../../config/dbconfig.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">

        <title>Forum Review | Vegemart</title>
        <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
    </head>
    <body>
        <?php include "../includes/admin_nav.php"; ?>
        <div class="row">
            <h1 id="title" class="has-text-left ml-2 mt-1 mb-0">Forum Review</h1>
            <div class="columns group mt-0">
                <div class="column is-1"></div>
                <div class="column is-12 ml-1 mr-1">
                    <table class="user" id="myTable">
                        <tr>
                            <th>Post owner</th>
                            <th>Post Title</th>
                            <th>Post Content</th>
                            <th>Date & Time Created</th>
                            <th style="color:white;">.</th>
                            <th style="color:white;">.</th>
                        </tr>
                        <form method="post" action="../../src/forum/forum_review_posts.php">
                            <?php include_once "../../src/forum/forum_review_posts.php"; ?>         
                        </form>  
                    </table>
                </div>
                <div class="column is-1"></div>
            </div>
        </div>
    </body>
</html>