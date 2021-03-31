<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel=stylesheet href="../css/profile-edit.css">
        <link rel="stylesheet" href="../css/style.css"> 
        <link rel="stylesheet" href="../css/footer.css">
        <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <title>Edit Profile | Vegemart</title>
    </head>
    <body>

    <?php   
        include "../deliverer/deliverer_nav.php"; 
        if(empty(session_id())){
            session_start();
        }
        if((!isset($_SESSION["loggedInDelivererID"])))
        {
            echo "<script>
            alert('You have to login first');
            window.location.href='../../public/login.php';
            </script>";
        }
        include ('../../src/deliverer/deliverer_edit_details.php');
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
        </script>
    <?php include_once "../includes/footer.php"; ?>
    </body>
</html>