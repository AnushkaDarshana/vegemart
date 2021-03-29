<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
  <title>Reset</title>  
  <link rel="stylesheet" href="css/email_verify.css">
  <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">

</head>
<body>
  <div class="reset">
    <h3>Reset Password</h3>        
    <form class="" action="../src/email_verify.php" method="post">
    <p class="message">Enter your registered email address so that we will send you an email to reset your password.</p>
    <?php 
      if(isset($_POST['send'])){
        echo $alert;
    }
    ?>    
        <div class="inputBox">
          <input type="email" name="email" required="">
          <label>Email</label>
        </div>        
             
          <input type="submit" name="send" value="Send">
          <input type="reset" name="" value="Reset">          
         
      </form>
    
  </div>

</body>
</html>
