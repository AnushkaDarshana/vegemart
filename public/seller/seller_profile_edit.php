<?php 
    include  ('../../config/dbconfig.php'); 
    include ('../../src/session.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="http://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <link type="text/css" rel=stylesheet href="../css/profile-edit.css">
        <link rel="stylesheet" type="text/css" href="../css/client-records.css">
        <link rel="stylesheet" type="text/css" href="../css/footer.css"> 
        <title>Edit Profile</title>
    </head>
    <body>

    <?php
        include ("./seller_nav.php");
        include ('../../src/seller/seller_profile_details.php');
        while($row = mysqli_fetch_assoc($userquery)){?>
                <div class="tab has-text-centered">
                    <button class="tabButton" onclick="openfun(event, 'profile')" id="defaultOpen">My Profile</button>
                    <button class="tabButton" onclick="openfun(event, 'sales')">My Sales</button>
                </div>
                <div id="profile" class="tabcontent">
                    <div class="columns group">
                        <div class="column is-3 pl-1 pr-1"></div>
                        <div class="column is-6 pl-1 pr-1">
                            <div class="updateForm">
                                <form id="UpdateProduct" action="../../src/seller/seller_profile_edit_submit.php" method="post" enctype="multipart/form-data">
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
                                            <input class="input-box" type="text" name="editFName" placeholder="Edit first name" value=<?php echo $row['fName']?> required>      
                                        </div>
                                        <div class="input-row">
                                            <label>Last Name</label>
                                            <input class="input-box" type="text" name="editLName" placeholder="Edit last name" value=<?php echo $row['lName']?> required>
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
                                            <input class="input-box" type="text" name="editPhoneNum" placeholder="Edit contact number" value=<?php echo $row['phoneNum']?> required>
                                        </div>
                                        <div class="input-row">
                                            <label>Address Line 1</label> 
                                            <input class="input-box" type="text" name="editAddress1" placeholder="Address line 1" value=<?php echo $row['address1']?> required>                                    
                                        </div>
                                        <div class="input-row">
                                            <label>Address Line 2</label> 
                                            <input class="input-box" type="text" name="editAddress2" placeholder="Address line 2" value=<?php echo $row['address2']?> required>                                    
                                        </div>
                                        <div class="input-row">
                                            <label>City</label> 
                                            <input class="input-box" type="text" name="editCity" placeholder="Edit city" value=<?php echo $row['city']?> required>                            
                                        </div>
                                        <div class="input-row">
                                            <label>New Password</label> 
                                            <input class="input-box" type="password" name="editPassword" id="new_password" onkeyup="check()" placeholder="Change password">                                         
                                        </div>
                                        <div class="input-row">
                                            <label>Confirm new Password</label> 
                                            <input class="input-box" type="password" name="editConfirmPassword" id="confirm_new_password" onkeyup="check()" placeholder="Confirm password"> 
                                        </div>
                                        <span id="message"></span>
                                        <br>
                                        <span>Enter your password to confirm</span>
                                        <div class="input-row">
                                            <label>Password</label> 
                                            <input class="input-box" type="password" name="Password" placeholder="Current password" required>                                         
                                        </div>
                                    </div>
                                    <div class="column is-1 pl-1 pr-1"></div>
                                </div>
                                <div class="row">
                                    <input type="hidden" value=<?php echo $row['id']?> name="ditID">
                                    <input class="form-button"  type="submit" name="submit" value="Save">
                                    <input class="form-button" type="button" name="cancel" onclick="window.location.replace('seller_home.php')" value="Cancel">                                           
                                    <a style="color:#138D75; font-size:18px; font-family:Candara ; margin-top:10%;" href="#">Deactivate account</a>
                                </div>
                                </form>
                                <h3 class="error-msg"><?php include_once ('../includes/message.php'); ?></h3>
                            </div>
                        </div>
                        <div class="column is-3 pl-1 pr-1"></div>
                    </div>
                </div>
                <div id="sales" class="tabcontent">
                    <div class="columns group mt-1 pt-1">
                        <div class="column is-1 mt-0"></div>
                        <div class="column is-10 mt-0">
                            <table>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                
                                    <th>Buyer Name</th>
                                    <th>Picked up/ Delivered</th>
                                    <th>Deliverer Name</th>
                                    <th>Earned amount (Rs.)</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <td>#1</td>
                                    <td>02/01/2020</td>
                                
                                    <td>Nimal Perera</td>
                                    <td>Delivered</td>
                                    <td>Thusitha Bandara</td>
                                    <td>200.00</td>
                                    <td class="has-text-centered"><a href="#">View reciept</a></td>
                                </tr>
                                <tr>
                                    <td>#2</td>
                                    <td>07/03/2020</td>
                                    
                                    <td>Amal Silva</td>
                                    <td>Delivered</td>
                                    <td>Kamal Diaz</td>
                                    <td>740.00</td>
                                    <td  class="has-text-centered"><a href="#">View reciept</a></td>
                                </tr>
                                <tr>
                                    <td>#3</td>
                                    <td>02/01/2020</td>
                                    
                                    <td>Nimal Perera</td>
                                    <td>Picked up</td>
                                    <td>-</td>
                                    <td>200.00</td>
                                    <td class="has-text-centered"><a href="#">View reciept</a></td>
                                </tr>
                                <tr>
                                    <td>#4</td>
                                    <td>07/03/2020</td>
                                    
                                    <td>Amal Silva</td>
                                    <td>Delivered</td>
                                    <td>Kamal Diaz</td>
                                    <td>740.00</td>
                                    <td  class="has-text-centered"><a href="#">View reciept</a></td>
                                </tr>
                                <tr>
                                    <td>#5</td>
                                    <td>02/01/2020</td>
                                    
                                    <td>Nimal Perera</td>
                                    <td>Delivered</td>
                                    <td>Thusitha Bandara</td>
                                    <td>200.00</td>
                                    <td class="has-text-centered"><a href="#">View reciept</a></td>
                                </tr>
                                <tr>
                                    <td>#6</td>
                                    <td>07/03/2020</td>
                                    
                                    <td>Amal Silva</td>
                                    <td>Picked up</td>
                                    <td>-</td>
                                    <td>740.00</td>
                                    <td  class="has-text-centered"><a href="#">View reciept</a></td>
                                </tr>
                                <tr>
                                    <td>#7</td>
                                    <td>02/01/2020</td>
                                
                                    <td>Nimal Perera</td>
                                    <td>Delivered</td>
                                    <td>Thusitha Bandara</td>
                                    <td>200.00</td>
                                    <td class="has-text-centered"><a href="#">View reciept</a></td>
                                </tr>
                                <tr>
                                    <td>#8</td>
                                    <td>07/03/2020</td>
                                    
                                    <td>Amal Silva</td>
                                    <td>Delivered</td>
                                    <td>Kamal Diaz</td>
                                    <td>740.00</td>
                                    <td  class="has-text-centered"><a href="#">View reciept</a></td>
                                </tr>
                                <tr>
                                    <td>#9</td>
                                    <td>02/01/2020</td>
                                    
                                    <td>Nimal Perera</td>
                                    <td>Picked up</td>
                                    <td>-</td>
                                    <td>200.00</td>
                                    <td class="has-text-centered"><a href="#">View reciept</a></td>
                                </tr>
                            </table><br><br>
                        </div>
                        <div class="column is-1 mt-0">
                            <button onclick="topFunction()" id="toTopBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>   
                        </div>
                    </div>
                </div>                
        <?php
        }
        mysqli_close($con);
    ?>

    <script>
        var check = function() {
            if (document.getElementById('new_password').value == document.getElementById('confirm_new_password').value){
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Password is matching';
            } 
            else{
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').style.backgroundColor = 'white';
                document.getElementById('message').innerHTML = 'Password does not match';
            }
        }

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

            var mybutton = document.getElementById("toTopBtn");
            window.onscroll = function() {scrollFunction()};
            function scrollFunction() {
                if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 250) {
                    mybutton.style.display = "block";
                } else {
                    mybutton.style.display = "none";
                }
            }
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }

        </script>
        <?php include_once "../includes/footer.php"; ?>   
    </body>
</html>