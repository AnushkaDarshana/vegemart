<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link href="http://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <link type="text/css" rel=stylesheet href="./css/login.css">
        <script src="https://kit.fontawesome.com/85eb26c5dd.js" crossorigin="anonymous"></script>
        
    </head>
    <body>
                
        <div class="login">    
        <br>
            <img class="logo" src="images/logo.png">              
            <h2>Welcome back!</h2>              
            <p>Log on to your account</p>   
            <form action="../src/login_process.php" method="post">
                <div class="inputBox">
                    <input type="text" name="email" onfocus="this.placeholder = 'ex: example@vegemart.lk'" onblur="this.placeholder = ''" required="">
                    <label><i class="fas fa-user-circle">&nbsp;&nbsp;</i>Email</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required="">
                    <label><i class="fas fa-key"></i>&nbsp;&nbsp;Password</label> 
                    <div class="anchor">
                        <a href="./email_verify.php" style="color:#A9ABAB">Forgot password?</a>
                    </div>   
                </div>      
                <input class="button" type="submit" name="login" value="Login">
                <input class="button" type="reset" name="" value="Reset">
                <p style="color:Yellow; font-size:16px; margin-top:10%;">Don't have an account?  &nbsp<a  href="signup.php" style="color:#A9ABAB">Sign up</a> </p>                             
            </form>             
        </div>
    </body>
</html>


