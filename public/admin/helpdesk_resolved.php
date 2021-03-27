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
        <link href="http://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <title>Help Desk | Vegemart</title>
    </head>
    <body>
        <?php include "../includes/admin_nav.php"; ?>       
        <div class="row">
            <h1 id="title" class="has-text-left ml-2 mt-1 mb-0">Help Desk (Administration)</h1>
            <div class="tab has-text-centered">
                <button id="tab-button" onClick="location.href='./helpdesk_complaints.php';">Home</button>
                <button id="tab-button" style="background-color: #D7DBDD;" onClick="location.href='./helpdesk_resolved.php';">My Posts</button>
            </div>
            <div class="columns group mt-0">
                <div class="column is-1"></div>
                <div class="column is-10 ml-1 mr-1">
                    <table class="user" id="myTable">
                        <tr>
                            <th>Ref No.</th>
                            <th>Date & Time Created</th>
                            <th>Client</th>
                            <th>Client Email</th>
                            <th>Client Phone Number</th>
                            <th>Complaint</th>
                            <th>Complaint  Status</th>
                            <th>Resolve</th>
                        </tr>        
                        <form method="post" action="../../src/forum/forum_review_posts.php">
                            <?php include_once "../../src/helpdesk_solve_complaint.php"; ?>         
                        </form> 
                        
                    
                </div>
                <div class="column is-1"></div>
            </div>
        </div>
    </body>
</html>