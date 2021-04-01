<?php
    include ('../config/dbconfig.php');
    include ('./session.php');
    include ('./utils/helpers.php');

    if (isset($_POST['resolved'])) {
        $complaint_id=$_POST["complaint_id"];
        $verify_status = "SELECT `complaint_status` from `help_desk` where `complaint_id` = " . $complaint_id;
        $verify_status_res = mysqli_query($con, $verify_status);
        $rowUser_verify_status = mysqli_fetch_row($verify_status_res);
        $complaint_status = $rowUser_verify_status[0];

        $updateStatus= "UPDATE `help_desk` SET `complaint_status` = 1, `solution`='$solution' where `complaint_id` = " . $complaint_id;

        if (mysqli_query($con, $updateStatus) === true) {
            $message = base64_encode(urlencode("Successful!"));
            header('Location:../public\admin\helpdesk_resolved.php?msg='.$message);
            exit();
        } else {
            $message = base64_encode(urlencode("SQL Error while Registering"));
            header('Location:../public\admin\helpdesk_complaints.php?msg=' . $message);
            exit();
        }
    }
    if (isset($_POST['failed'])) {
        header('Location:../public\admin\helpdesk_complaints.php');
        $logString = "ADMIN failed to resolve complaint ". $complaint_id;
        writeAppLog($logString, "../logs");
    }

