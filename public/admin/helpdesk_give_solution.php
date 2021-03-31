<?php
include('../../config/dbconfig.php');
include('../../src/session.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/footer.css">
    <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
    <title>Help Desk | Vegemart</title>
</head>

<body>
    <?php include "../includes/admin_nav.php"; ?>
    <div class="heading-help">
        <h1><i class="fa fa-question" style="font-size:25px; color:#138D75; padding:0.2em;"></i>Help Desk (Administration)</h1>
    </div>
    <div class="tab has-text-centered">
        <button id="tab-button" style="background-color: #D7DBDD;" onClick="location.href='./helpdesk_complaints.php';">Pending issues</button>
        <button id="tab-button" onClick="location.href='./helpdesk_resolved.php';">Resolved issues</button>
    </div>
    <div class="columns group">
        <div class="column is-3 mt-1 pt-1 ml-0 mr-0"> </div>
        <div class="column is-6 mt-1 pt-1 ml-0 mr-0">
        <div class="solution-card">

        


                <?php
                $complaint_id = $_GET['cid'];
                $get_complaint = "SELECT * from `help_desk` where `complaint_id` = '" . $complaint_id . "'";
                $get_complaint_res = mysqli_query($con, $get_complaint) or trigger_error(mysqli_error($con));

                while ($row = mysqli_fetch_assoc($get_complaint_res)) {
                    $complaint_id = $row['complaint_id'];
                    $name = $row['name'];
                    $phone_num = $row['phoneNum'];
                    $email = $row['email'];
                    $date_time = $row['date_time'];
                    $issue = nl2br(stripslashes($row['issue']));
                    $description = nl2br(stripslashes($row['description']));

                    echo "<h2 id=\"title\">Contact User</h2>
                    <form method=\"POST\" action=\"../../src/helpdesk_give_solution_submit.php\">
                        <div class=\"columns group\">
                            <div class=\"column is-3 mt-1 pt-1 ml-0 mr-0\"> </div>    
                            <div class=\"column is-3 mt-1 pt-1 ml-0 mr-0\"> <input type=\"hidden\" name=\"complaint_id\" value=\"$complaint_id\"> <br>
                                <h3 class=\"mt-0 mb-0 ml-0\" style=\"color:white;\">Name</h3>
                                <p class=\"mb-0\">Email: </p>
                                <p class=\"mt-0 mb-0\">Contact number: </p>
                                <p class=\"mt-0  mb-0\">Issue: </p>
                                <p class=\"mt-0 mb-0\">issue Description: </p>
                            </div>
                            <div class=\"column is-6 mt-1 pt-1 ml-0 mr-0\">
                                <input type=\"hidden\" name=\"complaint_id\" value=\"$complaint_id\"> <br>
                                <h3 class=\"mt-0 mb-0 ml-0\" style=\"text-align:left;\">$name</h3>
                                <p class=\"mb-0\">$email</p>
                                <p class=\"mt-0 mb-0\">$phone_num</p>
                                <p class=\"mt-0  mb-0\">$issue</p>
                                <p class=\"mt-0 mb-0\">$description</p>
                            </div>
                        </div>
                        <br><textarea style=\"border-color:transparent; background-color: rgb(241, 247, 243);\" rows=\"4\" cols=\"50\" wrap=virtual name=\"solution\" placeholder=\"Solution\"></textarea><br>
                        <div class=\"row mt-1\">
                        <br>
                            <input type=\"submit\" class=\"green-button mt-0\" style=\"border-radius: 5px !important; color:white;\" value=\"Resolved\" name=\"resolved\"></td>
                            <input type=\"submit\" class=\"red-button mt-0\" style=\"border-radius: 5px;!important\" value=\"Failed\" name=\"failed\"></td>
                        </div>
                    </form>";
                }

                mysqli_close($con);
                ?>
            </div>
        </div>
        <div class="column is-3 mt-1 pt-1 ml-0 mr-0"></div>
       
    </div>
    <br>
    <?php include_once "../includes/footer.php"; ?>
</body>

</html>