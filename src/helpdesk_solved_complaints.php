<?php
    include ('../../config/dbconfig.php');
    include ('../../src/session.php');

    $get_complaint = "SELECT * from `help_desk` where `complaint_status` = 1 order by `date_time` desc";
    $get_complaint_res = mysqli_query($con, $get_complaint) or trigger_error(mysqli_error($con));

    if (mysqli_num_rows($get_complaint_res) < 1) {
        $display_block = "<p><em>No complaints!</em></p>";
    } 
    else {
        $display_block = "<div class=\"mb-1 has-text-centered\">";

        while ($complaint_info = mysqli_fetch_array($get_complaint_res)) {
            $complaint_id = $complaint_info['complaint_id'];
            $date_time = $complaint_info['date_time'];
            $issue = nl2br(stripslashes($complaint_info['issue']));
            $description = nl2br(stripslashes($complaint_info['description']));
            $solution = nl2br(stripslashes($complaint_info['solution']));
            $user = stripslashes($complaint_info['name']);
            $user_phone = $complaint_info['phoneNum'];
            
            //add to display
            $display_block .=
            "<tr> 
                <td>CM00$complaint_id</td>
                <td>$date_time</td>
                <td>$user</td>
                <td>$user_phone</td>
                <td>$issue</td>
                <td>$description</td>
                <td>$solution</td>
                </tr>";    
        }
    }
    $display_block .= "</div>";  //close up the table
    print $display_block;
?>

