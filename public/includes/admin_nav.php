<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="images/logo.png" rel="shortcut icon">
        <link rel="stylesheet" type="text/css" href="../css/nav.css">
    </head>

    <body>
        <header class="header">
            <a href="./admin-dash.php"><img class="logopic" src="../images/logob.png"></a>
            
            <ul class="main-nav">
                <li><a href="http://localhost/vegemart/public/admin/admin-dash.php">Home</a></li>
                <li><a href="http://localhost/vegemart/public/about_us.php">About</a></li>
                <li><a href="http://localhost/vegemart/src/logout.php">Logout</a></li>
                <link href="http://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
            </ul>
        </header>
        <script>
            /* When the user clicks on the button, 
            toggle between hiding and showing the dropdown content */
            function dropFunc() {
            document.getElementById("notifDrop").classList.toggle("show");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('.notifbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
        </script>
    </body>
</html>