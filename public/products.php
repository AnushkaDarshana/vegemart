<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <title>Products | Vegemart</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/products.css">
        <link rel="stylesheet" href="./css/footer.css">

    </head>

    <body>
        <?php
            include ('../src/session.php'); 
            include ('../config/dbconfig.php'); 
            if (isset($_SESSION["loggedInUserID"])) {
                include_once "./includes/nav.php";
            }
            else{
                include_once "./includes/index_nav.php";
            }
        ?>
        <!--slideshow starts here -->
        <div class="slideshow-container mt-0 pt-0 pb-0 mb-0">
            <div class="columns group mt-0 mb-0">
                <div class="column is-5 pl-1 pr-1 mt-0 mb-0">
                    <div class="text ml-2 mr-1 mt-4">
                        <h1>Want some? Get some</h1>
                        <p>Get your vagetables delivered to your door step</p>
                    </div>
                </div>
                <div class="column is-4 pl-2 pr-2 mt-0 mb-1">
                    <div class="advertisements">  
                        <img src="./images/ad1.jpg">  
                    </div>
                    <div class="advertisements">  
                        <img src="./images/ad2.jpg">  
                    </div>
                    <div class="advertisements">  
                        <img src="./images/ad.jpg">  
                    </div>
                </div>
                <div class="column is-3  pr-1 mt-0 mb-1">
                    <div class="promotions">  
                        <img src="./images/card1.png">  
                    </div>
                    <div class="promotions">  
                        <img src="./images/card2.png">  
                    </div>
                    <div class="promotions">  
                        <img src="./images/card3.png">  
                    </div>
                </div>
            </div>
        </div>

        <script>
            var slideIndex1 = 0;
            showSlides1();
            function showSlides1() {
            var j;
            var slides = document.getElementsByClassName("advertisements");
            for (j = 0; j < slides.length; j++) {
                slides[j].style.display = "none";  
            }
            slideIndex1++;
            if (slideIndex1 > slides.length) {
            slideIndex1 = 1;
            }    
            slides[slideIndex1-1].style.display = "block";  
            setTimeout(showSlides, 5000); // Change image every 5 seconds
            }
        </script>
        <script>
            var slideIndex = 0;
            showSlides();
            function showSlides() {
            var i;
            var slides = document.getElementsByClassName("promotions");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";  
            }
            slideIndex++;
            if (slideIndex > slides.length) {
            slideIndex = 1;
            }    
            slides[slideIndex-1].style.display = "block";  
            setTimeout(showSlides, 5000); // Change image every 5 seconds
            }
        </script>
        <!--slideshow ends here -->      
        
        <!--search box starts here -->
        <form name="theform" action="" method="post">
            <li class="search-box">
                <div class="filter-box">
                    <div class="filter-text" onclick="myFunction()">Filters</div>
                </div>      
                <input type="search" class="search-input" name="search" id="search" placeholder="Search">          
                <div class="dropdown">
                    <div class="ul-class" id="myDropdown">
                        <ul>
                            <li><select name="location" class="dropdown-input">
                                <option style="color:gray">  Location </option>
                                    <?php 
                                        include ('../src/filter.php'); 
                                        while($row = mysqli_fetch_assoc($result)){?>
                                            <option value= <?php echo $row['city'] ?>><?php echo $row['city'] ?></option>
                                    <?php
                                        }
                                        mysqli_close($con);
                                    ?>

                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
                <button type="submit" class="search-button" name="submit">
                    <label class="icon">
                        <span class="fas fa-search"></span>
                    </label> 
                </button>
                <!-- </div> -->
            </li>
        </form>

        
        <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
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
        <!--search box ends here -->

        <!-- products block starts here-->
        <div class="row mt-1 mb-0">
            <div class="items-container">
                <?php 
                function showProducts($rowProduct){?>
                    <div class= "block" onclick= "window.location.href = 'bid.php?id=<?php echo $rowProduct['productID'] ?>'" style="cursor: pointer;">
                        <img src= images/products/<?php echo $rowProduct['imageName'] ?>>
                        <h3 style="text-transform: capitalize;"><?php echo $rowProduct['name'] ?></h3>
                        <?php
                        include ('../config/dbconfig.php');
                        include ('../src/session.php');
                        $productID = $rowProduct['productID'];
                        $quantity = "SELECT quantity FROM quantitysets where productID ='$productID' ";
                        $qauantityQuery = mysqli_query($con,$quantity);
                        $totalQuantity=0;
                        while ($rowQuantity = mysqli_fetch_assoc($qauantityQuery)) {
                            $totalQuantity=$totalQuantity+$rowQuantity['quantity'];
                        }
                        ?>
                        <h3 style="text-transform: capitalize;"><?php echo $totalQuantity ?> kg</h3>                        
                        <h3>Location: <?php echo $rowProduct['city'] ?> </h3>
                        <!-- <h3>Rs. <?php// echo $rowProduct['minPrice']  ?>(250g)</h3> -->
                    </div>
                <?php
                }
                include_once ('../src/products.php');
                while($rowProduct  = mysqli_fetch_assoc($resultProduct)){                    
                    showProducts($rowProduct);
                } 
                mysqli_close($con);
            
                ?>
            </div>   
        </div>

        <?php include_once "./includes/footer.php"; ?>      
    </body>
</html>
            