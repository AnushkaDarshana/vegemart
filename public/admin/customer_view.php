<?php include('../../config/dbconfig.php'); ?>
<?php
    session_start();
?> 
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> View Customer | Vegemart </title>
        <link rel="stylesheet" type="text/css" href="../css/admin1.css">

        <script src="../../js/manage-user-search.js"></script>
    </head>
    <body>

        <!--Start of nav-->
        <div>
        <?php include "../includes/admin_nav.php"; ?>
        </div>
        <!--End of nav-->

        <div class="search-user-container">
            <form name="form-display-selected">
                <!--heading-->
		        <h3>Search From Name , Email or ID</h3>
		        <!--Input-------->
		        <div class="search-input">
                    <input type="text" id="myInput" onkeyup="myFunctionCustomer()" 
                    placeholder="Enter Name , Email or ID"/>
                </div>
                <br/>
            </form>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
    <!-- Adding the table with customer details -->
        
        <table class="user" id="myTable">
            <tr>
                <th>Seller ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Seller Email</th>
                <th>Contact No.</th>
                <th>No</th>
                <th>Street</th>
                <th>City</th>
                <th>Status</th>
            </tr>
        
            <?php
        
                $userType="user";
                $sql ="SELECT * FROM `users` WHERE userType='$userType'";
                $result = mysqli_query($con,$sql);        
                while($row = mysqli_fetch_assoc($result)){ 
                $sellerID=$row['id']; 
                $sql_seller ="SELECT * FROM `client` WHERE id='$sellerID'"; 
                $result_seller = mysqli_query($con,$sql_seller);
                while($row_seller = mysqli_fetch_assoc($result_seller)){
            
                    echo "
                        <tr>                  
                            <td>".$row['id']."</td>
                            <td>".$row_seller['fName']."</td>
                            <td>".$row_seller['lName']."</td>
                            <td>".$row['email']."</td>
                            <td>".$row_seller['phoneNum']."</td>
                            <td>".$row_seller['address1']."</td>
                            <td>".$row_seller['address2']."</td>
                            <td>".$row_seller['city']."</td>
                            <td>".$row['active_status']."</td>
                        </tr>";
                    
                    } 
                }
            echo "</table>";
            ?>
        
        
        </div>

<script>
    var table = document.getElementById('myTable');
                
        for(var i = 1; i < table.rows.length; i++)
        {
            table.rows[i].onclick = function()
            {
                document.getElementById("fname").value = this.cells[1].innerHTML;
                document.getElementById("id").value = this.cells[0].innerHTML;
                document.getElementById("lname").value = this.cells[2].innerHTML;
                document.getElementById("email").value = this.cells[3].innerHTML;
                document.getElementById("street").value = this.cells[6].innerHTML;
                document.getElementById("postal_number").value = this.cells[5].innerHTML;
                document.getElementById("city").value = this.cells[7].innerHTML;
                document.getElementById("contact_number").value = this.cells[4].innerHTML;
                document.getElementById("active_status").value = this.cells[8].innerHTML;
            };
        }

</script>
    </div>

         <div class="row">
            <div class="col-0"></div>
            <div class="col-11">
         <h3>Details of Selected Customer</h3>
                
                <div class="update-box">

                    <table>
                        <tr>
                            <th>Customer ID :</th>
                            <td><input class="input-l" type="text" placeholder="ID" id="id" name="id" readonly="true" required></td>
                            <th>Postbox No. :</th>
                            <td><input class="input-m" type="text" placeholder="Postbox" id="postal_number" readonly="true" required></td>
                            <th>Customer Email :</th>
                            <td><input class="input-l" type="text" placeholder="Customer Email" id="email" readonly="true" required></td>
                        </tr>
                        <tr>
                            <th>First Name :</th>
                            <td><input width="50px" class="input-l" type="text" placeholder="First Name" id="fname" readonly="true" required></td>
                            <th>Street Name :</th>
                            <td><input class="input-l" type="text" placeholder="Street" id="street" readonly="true" required></td>
                            <th>Contact No. :</th>
                            <td><input class="input-l" type="text" placeholder="Contact" id="contact_number" readonly="true" required></td>
                        </tr>
                        <tr>
                            <th>Last Name :</th>
                            <td><input width="50px" class="input-l" type="text" placeholder="Last Name" id="lname" readonly="true" required></td>
                            <th>City :</th>
                            <td><input class="input-l" type="text" placeholder="City" id="city" readonly="true" required></td>
                            <th>Active Status :</th>
                            <td><input class="input-s" type="text" id="active_status" placeholder="Status" readonly="true" required></td>
                        </tr>
                    </table>


                </div>
                
            </form>
        </div>
        <br/> 
        <div>

       <!--script for onClickNav() for the navigation menu-->
    <script src="../../js/onClickNav.js"></script>
    <div class="row">
            <div class="col-7"></div>
            <div class="col-1"><a href="#" class="button"> Update </a></div>
            <div class="col-0"></div>
            <div class="col-1"><a href="#" class="button"> Delete </a></div>
            <div class="col-0"></div>
            <div class="col-1"><a href="admin-dash.php" class="button"> Back </a></div>
            <div class="col-1"></div>

        </div>


    </body>
</html>