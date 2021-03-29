<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Sign up</title>
        <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <link type="text/css" rel=stylesheet href="./css/signup.css">
        <script src="https://kit.fontawesome.com/85eb26c5dd.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="login">
            <h2>Let's Get Started!</h2>  
            <p>Create an account to save your time!</p>  
            <form class="" action="../src/signup_process.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="inputBox">                
                    <input type="text" autocomplete="off" name="fName" id="fName" onfocus="this.placeholder = 'ex: Imashi'" onblur="this.placeholder = ''" pattern="[a-zA-Z]{1,32}" autocomplete="off" list="autocompleteOff"  title="Should be a valid name" required="">
                    <label><i class="far fa-user"></i>&nbsp;&nbsp;&nbsp;First Name</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="lName" onfocus="this.placeholder = 'ex: Dissanayake'" onblur="this.placeholder = ''" pattern="[a-zA-Z]{1,32}" autocomplete="off" title="Should be a valid name" required="">
                    <label><i class="far fa-user"></i>&nbsp;&nbsp;&nbsp;Last Name</label>    
                </div>
                <div class="inputBox">
                    <input type="email" name="email" onfocus="this.placeholder = 'ex: example@vegemart.lk'" onblur="this.placeholder = ''" autocomplete="off" title="Should be a valid email as the given in the example" required="">
                    <label><i class="fas fa-envelope"></i>&nbsp;&nbsp;&nbsp;Email</label>    
                </div> 
                <div class="inputBox">
                    <input type="text" name="phoneNum" onfocus="this.placeholder = 'ex: +94771570227'" onblur="this.placeholder = ''" pattern='^\+?\d{11}' title="Should be a valid contact number as the given in the example" autocomplete="off" required="">
                    <label><i class="fas fa-phone-alt"></i>&nbsp;&nbsp;&nbsp;Contact number</label>    
                </div>  
                <div class="inputBox">
                    <input type="text" name="address1" onfocus="this.placeholder = 'ex: 75/2'" onblur="this.placeholder = ''" title="Should be like ex: 75/2" autocomplete="off" required="">
                    <label><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;&nbsp;Address Line 1</label>    
                </div>
                <div class="inputBox">
                    <input type="text" name="address2" onfocus="this.placeholder = 'ex: Bandarawella road'" onblur="this.placeholder = ''" title="Should be like ex: Bandarawella road" autocomplete="off" required="">
                    <label><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;&nbsp;Address Line 2</label>    
                </div>
                <div class="inputBox">
                    <input type="text" name="city" onfocus="this.placeholder = 'ex: Badulla'" onblur="this.placeholder = ''" title="Should be like ex: Badulla" autocomplete="off" required="">
                    <label><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;&nbsp;City</label>    
                </div>
                <div class="inputBox">
                    <input type="file" id="profilePic" name="profilePic"/>
                    <label>Display Picture</label>    
                </div>
                <div class="inputBox">
                    <input type="password" id="password"  name="password" onfocus="this.placeholder = 'ex: Vithanage12#'" onblur="this.placeholder = ''" minlength="8" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" autocomplete="off" title="Should be in required format" required="">
                    <label><i class="fas fa-lock"></i>&nbsp;&nbsp;&nbsp;Password</label>   
                    <p style="font-size:10px;margin-top:-2%;text-align:left;color:white;">(minimum of 8 characters Including uppercase, lowercase & at least one special character)</p>                    
                </div> 
                <div class="inputBox">
                    <input type="password" id="confirm_password" name="confirm_password" minlength="8" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" autocomplete="off" title="Should be in required format" required="">
                    <label><i class="fas fa-key"></i>&nbsp;&nbsp;&nbsp;Confirm Password</label>  
                     
                </div> 
                <div class="form-check-inline">
                    <input type="radio" id="user" name="type" value="user" required>
                    <label for="user">Buyer</label>
                    <input type="radio" id="seller" name="type" value="seller" required>
                    <label for="seller">Seller</label> 
                </div> 
                <div>
                    <input class="button" type="submit" name="register" value="Sign up">
                    <input class="button" type="reset" name="" value="Reset">
                </div>                     
            </form>       
        </div>
    </body>
</html>

<script>
    var check = function() {
            var numbers = ^[0-9]+$;
        if (document.getElementById('fName').value == $numbers){
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'Password is matching';
        } 
        else{
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').style.backgroundColor = 'white';
            document.getElementById('message').innerHTML = 'Password does not match';
        }
    }
</script>
