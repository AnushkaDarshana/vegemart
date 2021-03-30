
<?php include('../../config/dbconfig.php'); ?>
<?php
    session_start();
    ?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> View Co-Admin | Vegemart </title>
        <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <link rel="stylesheet" type="text/css" href="../css/admin1.css">

        <script src="../../js/manage-user-search.js"></script>
    </head>
    <body>

        <!--Start of nav-->
        <div>
            <?php include "../includes/admin_nav.php"; ?>       
        </div>
        <!--End of nav-->

        
        <div class="content-div">
            <br><br>        
            <h1><font-color="black">Co-Admins of the System</h1>

            <div class="coadmin-table">

            <table class="user" id="myTable">
                        <tr>
                            <th>Co-Admin ID</th>
                            <th>Co-Admin Name</th>
                            <th>Co-Admin Email</th>
                            <th>Contact No.</th>
                            <th>number</th>
                            <th>Street</th>
                            <th>City</th>
                            <th>Status</th>
                        </tr>
                    
                    <?php
                    
                    $sql ="SELECT * FROM `co-admin`";

                    $result = mysqli_query($con,$sql);        
                    while($row = mysqli_fetch_assoc($result)){
                    
                        echo "
                            <tr>                  
                                <td>".$row['id']."</td>
                                <td>".$row['name']."</td>
                                <td>".$row['email']."</td>
                                <td>".$row['phone']."</td>
                                <td>".$row['add1']."</td>
                                <td>".$row['street']."</td>
                                <td>".$row['city']."</td>
                                <td>".$row['active_status']."</td>
                            </tr>";
                            
                    } 
                    echo "</table>";
                    ?>
            </div>
            <div class="vl"></div>
            <div class="coadmin-dashboard">
                <form class="update-box" method="POST" action="submit-co-admin.php">
                    <table>
                        <tr>
                            <th>Admin Name : </th>
                            <td><input class="input-l" type="text" placeholder="Admin Name" id="name" name="name" pattern="^[A-Za-z ]+$" required></td>
                        </tr>
                        <tr>
                            <th>Admin Email : </th>
                            <td><input class="input-l" type="email" placeholder="Admin Email" id="email" name="email" required></td>
                        </tr>
                        <tr>
                            <th>Contact No. : </th>
                            <td><input class="input-l" type="text" placeholder="Contact" id="contact_no" name="contact" pattern='^\+?\d{11}' required></td>
                        </tr>
                        <tr>
                            <th>Admin Type : </th>
                            <td><input class="input-m" type="text" placeholder="Type" id="type" name="type"  required></td>
                        </tr>
                        <tr>
                            <th>Password : </th>
                            <td><input class="input-m" type="password" placeholder="Password" id="password" name="password"
                            pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"></td>
                        </tr>

                    </table>

                    <input type="submit" style="width: 40%" class="btn-coadmins"  name="update" value="Update">
                    <input type="submit" style="width: 40%" class="btn-coadmins"  name="delete" value="Delete">
                </form>
            </div>
        </div>
        


<script>
    var table = document.getElementById('myTable');
                
        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {
                document.getElementById("name").value = this.cells[1].innerHTML;
                document.getElementById("email").value = this.cells[2].innerHTML;
                document.getElementById("contact_no").value = this.cells[3].innerHTML;
                document.getElementById("type").value = this.cells[4].innerHTML;
                // document.getElementById("password").value = this.cells[3].innerHTML;
                
            };
        }

</script>

        <!--script for onClickNav() for the navigation menu-->
    <script src="../../js/onClickNav.js"></script>

    </body>
</html>