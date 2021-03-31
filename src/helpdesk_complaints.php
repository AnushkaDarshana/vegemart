<?php
    if(empty(session_id())){
        session_start();
    }
    include ('../../config/dbconfig.php');
    if((!isset($_SESSION["loggedInAdminID"])) && (!isset($_SESSION["loggedInCoAdminID"])))
    {
        echo "<script>
        alert('You have to login first');
        window.location.href='../../public/login.php';
        </script>";
    }  
    else if(isset($_SESSION["loggedInAdminID"])){
        $userID = $_SESSION["loggedInAdminID"];
    } 
    else if(isset($_SESSION["loggedInCoAdminID"])){
        $userID = $_SESSION["loggedInCoAdminID"];
    } 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <title>Help Desk | Vegemart</title>
    </head>
    <body>
        <?php include "../includes/admin_nav.php"; ?>       
        <div class="row">
            <div class="heading-help">
                <h1><i class="fa fa-question" style="font-size:25px; color:#138D75; padding:0.2em;"></i>Help Desk (Administration)</h1>
            </div>
            <div class="tab has-text-centered">
                <button id="tab-button" style="background-color: #D7DBDD;" onClick="location.href='./helpdesk_complaints.php';">Pending issues</button>
                <button id="tab-button" onClick="location.href='./helpdesk_resolved.php';">Resolved issues</button>
            </div>
            <div class="columns group mt-0">              
                <div class="column is-12 ml-1 mr-1">
                    <table class="user" id="myTable">
                        <tr>
                            <th>Ref No.</th>
                            <th>Date & Time Created</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Issue</th>
                            <th></th>
                        </tr> 
                        <?php include_once "../../src/helpdesk_solve_complaint.php"; ?>                              
                    </table>                         
                </div>
            </div>
        </div>
    </body>
</html>