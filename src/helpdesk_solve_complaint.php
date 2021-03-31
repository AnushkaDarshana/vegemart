<?php
    include ('../../config/dbconfig.php');
    include ('../../src/session.php');
    include ('../../src/utils/helpers.php');

    if (!function_exists('mysqli_result')) {
        function mysqli_result($res, $row, $field=0)
        {
            $res->data_seek($row);
            $datarow = $res->fetch_array();
            return $datarow[$field];
        }
    }

    $get_complaint = "SELECT * from `help_desk` where `complaint_status` = 0 order by `date_time` asc";
    $get_complaint_res = mysqli_query($con, $get_complaint) or trigger_error(mysqli_error($con));

    if (mysqli_num_rows($get_complaint_res) > 0) {
        $display_block = "<div class=\"mb-1 has-text-centered\">";

        while ($complaint_info = mysqli_fetch_array($get_complaint_res)) {
            $complaint_id = $complaint_info['complaint_id'];
            $name = $complaint_info['name'];
            $phone_num = $complaint_info['phoneNum'];
            $email = $complaint_info['email'];
            $date_time = $complaint_info['date_time'];
            $issue = nl2br(stripslashes($complaint_info['issue']));
            $description = nl2br(stripslashes($complaint_info['description']));
            
            //add to display
            $display_block .=
            "<tr> 
                <td>CM00$complaint_id</td>
                <td>$date_time</td>
                <td>$name</td>
                <td>$email</td>
                <td>$phone_num</td>
                <td>$issue</td>
                <td><a class=\"green-button mt-0 mb-0\" style=\"text-decoration: none; color:white; \" href=\"../admin/helpdesk_give_solution.php?cid=$complaint_id\">Resolve</a></td>
            </tr> ";           
        }
        
        
    }
    $display_block .= "</div>"; 
  //close up the table
    print $display_block;

?>