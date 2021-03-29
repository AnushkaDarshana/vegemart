<?php include('../../config/dbconfig.php'); ?>
<?php
    session_start();
    if((!isset($_SESSION["loggedInAdminID"])) && (!isset($_SESSION["loggedInCoAdminID"])))
    {
        echo "<script>
        alert('You have to login first');
        window.location.href='../../public/login.php';
        </script>";
    }  
?> 

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/footer.css">
        <link href="images/logo.png" rel="shortcut icon">
        <title> Admin Dashboard | Vegemart </title>
    </head>
    <body>
        <?php include "../includes/admin_nav.php"; ?>
        <div class="columns group mb-0">
        
            <div class="column is-3 mt-3 pt-2 ml-2 mr-0 pl-2 pr-2">
                <fieldset>
                    <legend><b>Admin Profile Details:</b></legend>
                    <div class="row has-text-centered ml-2 mr-2 mb-1">
                        <img src="../images/users/admin.jpg" alt="image" class="image" >              
                    </div> 

                <div class="column is-5 mt-0 ml-1 pl-0 pr-0">
                    <table style="font-family:Candara;">
                        <tr>
                            <td style="font-weight:600;">Admin ID</td>
                        </tr>
                        <tr>
                            <td style="font-weight:600;">Name</td>
                        </tr>
                        <tr>
                            <td style="font-weight:600;">Email</td>
                        </tr>
                        <tr>
                            <td style="font-weight:600;">Contact No.</td>
                        </tr>
                        <tr>
                            <td style="font-weight:600;">Address</td>
                        </tr>
                    </table>
                </div>

                <div class="column is-2 mt-0 ml-0 pl-0 pr-0">
                    <table class="user" id="myTable"> 
                    
                    <?php
                        $userType="admin";
                        $sql ="SELECT * FROM `users` WHERE userType='$userType'";
                        $result = mysqli_query($con,$sql);        
                        while($row = mysqli_fetch_assoc($result)){ 
                            $adminID=$row['id']; 
                            $sql_admin ="SELECT * FROM `admin` WHERE adminID='$adminID'"; 
                            $result_admin = mysqli_query($con,$sql_admin);
                            while($row_admin = mysqli_fetch_assoc($result_admin)){                       
                            echo "<tr>                  
                                    <td>".$row['id']."</td>
                                    </tr>";
                            echo "<tr>
                                    <td>".$row_admin['name']."</td>
                                    </tr>";
                            echo "<tr>
                                    <td>".$row['email']."</td>
                                    </tr>";
                            echo "<tr>
                                    <td>".$row_admin['contactNum']."</td>
                                    </tr>";
                            echo "<tr>
                                    <td>".$row_admin['address1']." ".$row_admin['address2']." ".$row_admin['city']."</td>
                                    </tr>";                        
                            }
                        }
                        echo "</table>";
                    ?>
                    </div>
 
                </fieldset>
            </div>
            
        <div class="column is-8 mt-0 ml-2 pl-1 pr-1">
            <h1 style="text-align:center; font-size: 30px; margin-bottom:0;">ADMIN DASHBOARD</h1>
                <div class="row mt-2 ml-0 mr-0">
                    <div class="card pl-1 pr-1 ml-0 mr-0 pt-1 pb-1">
                        <h2 id="title" class="has-text-left pl-1">User Management </h2>
                        <?php
                            if(isset($_SESSION["loggedInAdminID"])) {
                            ?>  
                        <div class="columns group has-text-centered">                                                      
                            <div class="column is-3 pl-0 pr-2 has-text-centered">
                                <img src="../images/co-admin.png" alt="image" class="image">
                                <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/co-admin_mgt.php';">Co-Admin Management</button>
                            </div>
                        
                            <div class="column is-3 pl-0 pr-2 has-text-centered">
                                <img src="../images/farmer2.jpg" alt="image" class="image">
                                <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/seller_view.php';">Seller Management</button>                               
                            </div>
                            <div class="column is-3 pl-0 pr-2  has-text-centered">
                                <img src="../images/customer1.jpg" alt="image" class="image">
                                <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/customer_view.php';">Customer Management</button> 
                                
                            </div>
                            <div class="column is-3 pl-0 pr-2 has-text-centered">
                                <img src="../images/deliverer.jpg" alt="image" class="image">
                                <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/deliverer_view.php';">Delieverer Management</button> 
                            </div>
                        </div>
                        <?php      
                            }
                            else{
                        ?>
                        <div class="columns group has-text-centered">                                                      
                            
                            <div class="column is-4 pl-4 pr-5 has-text-centered">
                                <img src="../images/farmer2.jpg" alt="image" class="image">
                                <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/seller_view.php';">Seller Management</button>                               
                            </div>
                            <div class="column is-4 pl-4 pr-5 has-text-centered">
                                <img src="../images/customer1.jpg" alt="image" class="image">
                                <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/customer_view.php';">Customer Management</button> 
                                
                            </div>
                            <div class="column is-4 pl-4 pr-5 has-text-centered">
                                <img src="../images/deliverer.jpg" alt="image" class="image">
                                <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/deliverer_view.php';">Delieverer Management</button> 
                            </div>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>

                <div class="row mt-2 ml-0 mr-0">
                    <div class="card pl-1 pr-1 ml-0 mr-0 pt-1 pb-1">
                        <h2 id="title" class="has-text-left pl-1">Sales Records</h2>
                        <div class="columns group has-text-centered">
                            <div class="column is-4 pl-4 pr-5 has-text-centered">
                                <img src="../images/farmer4.jpg" alt="image" class="image" >
                                <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/records_seller.php';">Seller Records</button>                               
                            </div>
                            <div class="column is-4 pl-4 pr-5 has-text-centered">
                                <img src="../images/buyer5.jpg" alt="image" class="image" >
                                <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/records_buyer.php';">Buyer Order Records</button>   
                            </div>
                            <div class="column is-4 pl-4 pr-5 has-text-centered">
                            <img src="../images/deliverer2.jpg" alt="image" class="image">
                                <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/records_deliverer.php';">Delieverer Records</button> 
                            </div>
                        </div>
                        <div class="columns group has-text-centered mt-1">
                            <div class="column is-4 pl-4 pr-5 has-text-centered">
                                <img src="../images/prod.jpg" alt="image" class="image">
                                <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/records_products.php';">Product Sales Records</button>
                            </div>
                            <div class="column is-4 pl-4 pr-1 pr-5 has-text-centered">
                            <img src="../images/bid.jpg" alt="image" class="image" >
                                <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/records_bidding.php';">Auction Records</button>                               
                            </div>
                            <div class="column is-4 pl-4 pr-1 pr-5 has-text-centered">
                                <img src="../images/pay.jpg" alt="image" class="image" >
                                <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/records_payment.php';">Payment Records</button>                               
                            </div>                           
                        </div>
                    </div>
                </div>
                <div class="row mt-2 ml-0 mr-0">
                    <div class="card pl-1 pr-1 ml-0 mr-0 pt-1 pb-1">
                        <h2 id="title" class="has-text-left pl-1">Reports</h2>
                        <div class="columns group has-text-centered mt-0 pt-0">
                            <div class="column is-2 pl-1 pr-2 has-text-centered"></div>

                            <div class="column is-4 pl-1 pr-5 has-text-centered">
                            <img src="../images/forum.jpg" alt="image" class="image" >
                                <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/forum_review.php';">Forum Reports</button>                               
                            </div>
                            <div class="column is-4 pl-1 pr-5 has-text-centered">
                            <img src="../images/feedbk.jpg" alt="image" class="image" >
                                <button class="card-button" onClick="location.href='https://localhost/vegemart/public/admin/helpdesk_complaints.php';">Help Desk</button>                        
                            </div>

                            <div class="column is-2 pl-0 has-text-centered"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-1 ml-0 mr-0"></div>
        </div>
        <br>
    </body>
</html>