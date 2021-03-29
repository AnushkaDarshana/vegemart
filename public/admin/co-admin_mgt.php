<?php include('../../config/dbconfig.php'); ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="../css/admin.css">

        <title> Manage Co-admin | Vegemart </title>
    </head>
    <body>
        <?php include "../includes/admin_nav.php"; ?>
        <div class="heading">
            <h1>MANAGE CO-ADMINISTRATOR</h1>
        </div>
        <div class="tab has-text-centered">
            <button class="tabButton" onclick="openfun(event, 'View')" id="defaultOpen">View | Edit | Delete Co-Admin</button>
            <button class="tabButton" onclick="openfun(event, 'Add')">Add Co-Admin</button>
        </div>
        <div id="View" class="tabcontent">
            <div class="columns group">
                <div class="column is-8 mt-1 pt-1">
                    <table class="user" id="myTable">
                        <tr>
                            <th>Co-Admin ID</th>
                            <th>Co-Admin Name</th>
                            <th>Co-Admin Email</th>
                            <th>Contact No.</th>
                            <th>No.</th>
                            <th>Street</th>
                            <th>City</th>
                            <th>Status</th>
                        </tr>
                            
                    <?php
                        $userType="coadmin";
                        $sql ="SELECT * FROM `users` WHERE userType='$userType'";
                        $result = mysqli_query($con,$sql);        
                        while($row = mysqli_fetch_assoc($result)){ 
                        $adminID =$row['id']; 
                        $sql_admin ="SELECT * FROM `admin` WHERE `user_id`='$adminID'"; 
                        $result_admin = mysqli_query($con,$sql_admin);
                        while($row_admin = mysqli_fetch_assoc($result_admin)){  
                            if ($row['active_status'] == 1){
                                $active_status = "active";
                            }
                            else{
                                $active_status = "Non-active";
                            }                     
                            echo "
                                <tr>                  
                                    <td>".$row['id']."</td>
                                    <td>".$row_admin['name']."</td>
                                    <td>".$row['email']."</td>
                                    <td>".$row_admin['contactNum']."</td>
                                    <td>".$row_admin['address1']."</td>
                                    <td>".$row_admin['address2']."</td>
                                    <td>".$row_admin['city']."</td>
                                    <td> $active_status</td>                                  
                                </tr>";                         
                            }
                        }
                        echo "</table>";
                    ?> 
                </div>   
            
                <div class="vl"></div>    
                <div class="column is-4 mt-1 ml-1 mr-0 pr-0 has-text-centered">
                    <div class="coadmin-dashboard">
                        <form class="update-box" method="POST" action="submit-co-admin.php"  enctype="multipart/form-data" autocomplete="off">
                            <table>
                                <tr>
                                    <th> ID : </th>
                                    <td><input class="input-l" type="text" placeholder="ID" id="id" name="id" readonly=true required></td>
                                </tr>
                                <tr>
                                    <th> Name : </th>
                                    <td><input class="input-l" type="text" placeholder="Admin Name" id="name" name="name" pattern="^[A-Za-z ]+$" required></td>
                                </tr>
                                <tr>
                                    <th> Email : </th>
                                    <td><input class="input-l" type="email" placeholder="Admin Email" id="email" name="email" required></td>
                                </tr>

                                <tr>
                                    <th>Contact No. : </th>
                                    <td><input class="input-l" type="text" placeholder="Contact" id="contact_no" name="contact" pattern='^\+?\d{11}' required></td>
                                </tr>
                                <tr>
                                    <th> No : </th>
                                    <td><input class="input-l" type="text" placeholder="Postal number" id="postal" name="postal"  required></td>
                                </tr>
                                <tr>
                                    <th> Street : </th>
                                    <td><input class="input-l" type="text" placeholder="Street" id="street" name="street"  required></td>
                                </tr>
                                <tr>
                                    <th> City : </th>
                                    <td><input class="input-l" type="text" placeholder="City" id="city" name="city"  required></td>
                                </tr>
                                <tr>
                                    <th> Status : </th>
                                    <td><input class="input-l" type="text" placeholder="Active status" id="status" name="status"  required></td>
                                </tr>
                            </table>

                            <input type="submit" class="form-button" name="update" value="Update">
                            <input type="submit" class="form-button" name="delete" value="Delete">
                        </form>
                        <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/admin-dash.php';">Back</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var table = document.getElementById('myTable');       
                for(var i = 1; i < table.rows.length; i++)
                {
                    table.rows[i].onclick = function()
                    {
                        document.getElementById("id").value = this.cells[0].innerHTML;
                        document.getElementById("name").value = this.cells[1].innerHTML;
                        document.getElementById("email").value = this.cells[2].innerHTML;
                        document.getElementById("contact_no").value = this.cells[3].innerHTML;
                        document.getElementById("postal").value = this.cells[4].innerHTML;
                        document.getElementById("street").value = this.cells[5].innerHTML;
                        document.getElementById("city").value = this.cells[6].innerHTML;
                        document.getElementById("status").value = this.cells[7].innerHTML;
                        // document.getElementById("password").value = this.cells[3].innerHTML;  
                    };
                }
        </script>

        <!--script for onClickNav() for the navigation menu-->
        <script src="../../js/onClickNav.js"></script>
        <!--view content ends here-->

        <!--add content starts here-->
        <div id="Add" class="tabcontent">
            <div class="row">
                <div class="columns group">
                    <div class="column is-4"></div>
                    <div class="column is-4 pl-1 pr-1 has-text-centered">
                        <form action="add_coadmin.php" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="image-row">
                                <img class="user-img" src="../images/users/co-admin.png" alt="image" class="pg">
                            </div>
                            <div class="input-row">   
                                <label for="name">Name</label>                                            
                                <input type="text" class="input-box" placeholder="Name" id="name" name="name" pattern="^[A-Za-z ]+$" required><br>
                            </div>
                            <div class="input-row">   
                                <label for="name">Email</label>                                            
                                <input type="text" class="input-box" type="email" placeholder="Co-Admin Email" id="email" name="email" required><br>
                            </div>
                            <div class="input-row">   
                                <label for="name">Password</label>                                            
                                <input type="password" class="input-box" placeholder="Password" id="password" name="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br>
                            </div>
                            <div class="input-row">   
                                <label for="name">Profile Picture</label>                                            
                                <input type="file" id="profilePic" name="profilePic" required><br>
                            </div>
                            <div class="input-row">   
                                <label for="name">Contact Number</label>                                            
                                <input type="text" class="input-box" placeholder="Contact Number" id="phone" name="contact" pattern='^\+?\d{11}'><br>
                            </div>
                            <div class="input-row">   
                                <label for="name">Address Line 1</label>                                            
                                <input type="text" class="input-box" id="add1" name="address1" placeholder="House number" required><br>
                            </div>
                            <div class="input-row">   
                                <label for="name">Address Line 2</label>                                            
                                <input type="text" class="input-box" id="street" name="address2" placeholder="Address line 2" required><br>
                            </div>
                            <div class="input-row">   
                                <label for="name">City</label>                                            
                                <input type="text" class="input-box" id="city" name="city" placeholder="City" required><br>
                            </div>
                            <div class="row has-text-centered ml-1 mr-1">
                                <input type="submit" class="form-button" name="submit" value="Save"/>
                                <input type="reset" class="form-button" value="Reset">
                            </div>

                        </form>
                        <div class="row has-text-centered ml-1 mr-1">
                            <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/admin-dash.php';">Back</button>
                        </div>
                    </div>
                    <div class="column is-4"></div>
                </div>
            </div>
        </div>
        

        <script>
            function openfun(evt, funcname) {
            var i, tabcontent, tabButton;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tabButton = document.getElementsByClassName("tabButton");
            for (i = 0; i < tabButton.length; i++) {
                tabButton[i].className = tabButton[i].className.replace(" active", "");
            }
            document.getElementById(funcname).style.display = "block";
            evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>

    </body>
</html>