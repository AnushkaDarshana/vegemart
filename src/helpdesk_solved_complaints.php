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
            $user_email = $complaint_info['email'];
            $issue = nl2br(stripslashes($complaint_info['issue']));
            $description = nl2br(stripslashes($complaint_info['description']));
            $user_id = stripslashes($complaint_info['user_id']);
            // Get information from user table
            $user_info = "SELECT CONCAT(fName, ' ', lName) AS name, `phoneNum` FROM client WHERE `user_id`=$user_id";
            $user_info_res = mysqli_fetch_array(mysqli_query($con, $user_info));
            $user = $user_info_res['name'];
            $user_phone = $user_info_res['phoneNum'];
            
            //add to display
            $display_block .=
            "<tr> 
                <td>CM00$complaint_id</td>
                <td>$date_time</td>
                <td>$user</td>
                <td>$description</td>
                <td>$user_phone</td>
                <td class=\"justify-text\">$issue</td>
                <td>Pending</td>
                <td><a class=\"green-button mt-0 mb-0\" style=\"text-decoration: none; color:#138D75; \" href=\"#popup1$complaint_id\">Resolve</a></td>
            </tr>
            </table>";
            $popup_block .= 
                    "<div id=\"popup1$complaint_id\" class=\"overlay\">
                        <div class=\"popup has-text-centered\">
                            <a class=\"close\" href=\"./helpdesk_admin.php\">&times;</a>
                            <h2 id=\"title\">Contact User</h2>
                            <form method=\"POST\" action=\"../src/forum/forum_add_post.php\">
                            <input type=\"hidden\" name=\"complaint_id\" value=\"$complaint_id\"> <br>
                                
                            <div class=\"row\">
                                <input type=\"submit\" class=\"green-button mt-0 mb-0\" style=\"border-radius: 5px;!important\" value=\"Resolved\" name=\"resolved\"></td>
                                <input type=\"submit\" class=\"red-button mt-0 mb-0\" style=\"border-radius: 5px;!important\" value=\"Failed\" name=\"failed\"></td>
                            </div>
                            </form>
                        </div>
                    </div>";
                        
        }
    }
    $display_block .= "</div>";  //close up the table
    print $display_block;
    print $popup_block;

?>

