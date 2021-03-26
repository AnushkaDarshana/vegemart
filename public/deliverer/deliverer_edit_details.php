<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deliverer Edit Details</title>
</head>
<body>
    <div class="row">
        <div class="columns group">
            <div class="column is-3 pl-1 pr-1"></div>
            <div class="column is-6 pl-1 pr-1">
                <div class="row">
                    <div class="updateForm">
                        <h2>My Profile</h2>
                        <form id="UpdateProfile" action="../../src/deliverer/deliverer_profile_edit_submit.php" method="post" enctype="multipart/form-data">
                        <div class="columns group">
                            <div class="column is-1 pl-1 pr-1"></div>
                                <div class="column is-10">
                                    <div class="image-row">
                                        <img class="user-img" src= "../images/users/<?php echo $row['profilePic']?>">
                                    </div>
                                    <div class="input-row">
                                        <label>Display Picture</label>
                                        <input class="image-input" type="file" id="profilePic" name="profilePic"/>   
                                    </div>
                                    <div class="input-row">
                                        <label>First Name</label>
                                        <input class="input-box" type="text" name="editFName" placeholder="Edit first name" value="<?php echo $row['fName']?>" required>      
                                    </div>
                                    <div class="input-row">
                                        <label>Last Name</label>
                                        <input class="input-box" type="text" name="editLName" placeholder="Edit last name" value="<?php echo $row['lName']?>" required>
                                    </div>
                                    <?php
                                        while($rowEmail = mysqli_fetch_assoc($emailquery)){?>
                                            <div class="input-row">
                                                <label>Email</label> 
                                                <input class="input-box" type="email" name="editEmail" placeholder="Edit email" value="<?php echo $rowEmail['email']?>" required>
                                            </div>
                                    <?php
                                        }
                                    ?>
                                    <div class="input-row">
                                        <label>Phone number</label>
                                        <input class="input-box" type="text" name="editPhoneNum" placeholder="Edit contact number" value="<?php echo $row['phoneNum']?>" required>
                                    </div>
                                    <div class="input-row">
                                        <label for="vehicle">Choose Vehicle:</label>
                                        <select id="vehicle" name="vehicle" form="UpdateProfile">
                                            <option value="bike"><?php echo $row['vehicle']?></option>
                                            <option value="bike">Bike</option>
                                            <option value="tuk">Tuk</option>
                                            <option value="lorry">Lorry</option>
                                        </select>   
                                    </div>
                                    <div class="input-row">
                                        <label>Vehicle Registration Number</label>
                                        <input class="input-box" type="text" name="vehicleNo" placeholder="Vehicle Registration Number" value="<?php echo $row['vehicleNo']?>" required>
                                    </div>
                                    <div class="input-row">
                                        <label>City</label> 
                                        <input class="input-box" type="text" name="editCity" placeholder="Edit city" value="<?php echo $row['city']?>" required>                            
                                    </div>
                                    <div class="input-row">
                                        <label>Username</label>    
                                        <input class="input-box" type="text" name="editUsername" placeholder="Edit username" value="<?php echo $row['username']?>" required>                                         
                                    </div>
                                    <div class="input-row">
                                        <label> Password</label> 
                                        <input class="input-box" type="password" name="Password" placeholder="Current password" required>                                         
                                    </div>
                                    <div class="input-row">
                                        <label> New Password</label> 
                                        <input class="input-box" type="password" name="editPassword" id="new_password" onkeyup="check()" placeholder="Change password">                                         
                                    </div>
                                    <div class="input-row">
                                        <label>Confirm new Password</label> 
                                        <input class="input-box" type="password" name="editConfirmPassword" id="confirm_new_password" onkeyup="check()" placeholder="Confirm password"> 
                                    </div>
                                    <span id="message"></span>
                                </div>
                                <div class="column is-1 pl-1 pr-1"></div>
                            </div>
                            <div class="row">
                                <input type="hidden" value="<?php echo $row['user_id']?>" name="editID">
                                <input class="form-button"  type="submit" name="submit" value="Save">
                                <input class="form-button" type="button" name="cancel" onclick="window.location.replace('deliverer_home.php')" value="Cancel">                                           
                                <a style="color:#3e8e41; font-size:16px; margin-top:10%;" href="#">Deactivate account</a>
                            </div>
                        </form>
                        <h3 class="error-msg"><?php include_once ('../includes/message.php'); ?></h3>
                    </div>
                </div>
            </div>
            <div class="column is-3 pl-1 pr-1"></div>
            </div>
        </div>
    </div>    
</body>
</html>