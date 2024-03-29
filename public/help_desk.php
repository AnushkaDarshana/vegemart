<?
include ('../config/dbconfig.php');
include ('../src/session.php');
if(empty(session_id())){
    session_start();
}
if (isset($_SESSION["loggedInUserID"])||isset($_SESSION["loggedInSellerID"])) {
    if (isset($_SESSION["loggedInUserID"])) {
        include_once "./includes/nav.php";
    } elseif (isset($_SESSION["loggedInSellerID"])) {
        include_once "./seller/seller_nav.php";
    }
}               
else{
    
    include_once "./includes/index_nav.php";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <title>Help Desk | Vegemart</title>
        <link rel="stylesheet" href="./css/help-desk.css">
        <link rel="stylesheet" href="./css/footer.css">
        <link rel="stylesheet" href="./css/style.css">

    </head>

    <body>
    <?php 
        include ('../config/dbconfig.php');
        include ('../src/session.php');
        if(empty(session_id())){
            session_start();
        }
        if (isset($_SESSION["loggedInUserID"])||isset($_SESSION["loggedInSellerID"])) {
            if (isset($_SESSION["loggedInUserID"])) {
                include_once "./includes/nav.php";
            } elseif (isset($_SESSION["loggedInSellerID"])) {
                include_once "./seller/seller_nav.php";
            }
        }               
        else{
            
            include_once "./includes/index_nav.php";
        }
        ?>
        
        <div class="row">
            <div class="heading">
                <h1><i class="fa fa-question" style="font-size:25px; color:#138D75; padding:0.2em;"></i>Vegemart Help Desk</h1>
                <p style="size:24px;">How can we Help you?</p>
            </div>
        </div>
        <div class="columns group" id="general">
            <div class="column is-1"></div> 
            <div class="column is-10">
                <h1 style="font-size:20px;">General Help Topics</h1>
                <div class="columns group has-text-centered ">
                    <div class="column is-4 ml-1 pl-1 pr-0">
                        <div class="card">
                            <h3>Auction</h3>
                            <img class="img" src="./images/bid1.jpg">
                            <p class="justify-text">A buyer can select a product, decide on a bid price and a specific quantity set to join the auction. 
                            You can either start a bid or join an ongoing bid. You can also join multiple bid at the same time. An auction lasts for 2 hours.</p>
                        </div> 
                        
                    </div>
                    <div class="column is-4 ml-0 pl-1 pr-0">
                        <div class="card">
                            <h3>Your order</h3>
                            <img class="img" src="./images/order.jpg">
                            <p class="justify-text">Your order is the product you won in the auction. After winning the bid, it will be added to your cart. 
                            From there on you can proceed to checkout. It can be picked up your self or be delivered.</p>
                        </div>
                    </div>
                    <div class="column is-4 ml-0 pl-1 pr-0">
                        <div class="card">
                            <h3>Delivery</h3>
                            <img class="img" src="./images/order_deli.jpg">
                            <p class="justify-text">Once you request for delivery, a nearby deliverer will accept your request. 
                            You will be notifies when a deliverer accepts the rquaest, when the product is picked up from the seller, and when he reaches your home.</p>
                        </div>  
                    </div>
                </div><div class="columns group has-text-centered ">
                    <div class="column is-4 ml-0 pl-1 pr-0">
                        <div class="card">
                            <h3>Payments</h3>
                            <img class="img" src="./images/pay1.jpg">
                            <p class="justify-text">Vegemart only operates on online payment for now. Payments should be done withing 2 days of adding the itm to your cart. 
                            If you fail to pay with 2 days you will be suspended. If there's an issue with your order please tell us more here</p>
                        </div> 
                    </div>
                    <div class="column is-4 ml-0 pl-1 pr-0">
                        <div class="card">
                            <h3>Products</h3>
                            <img class="img" src="./images/food.jpg">
                            <p class="justify-text">Vegemart has farmers registered as sellers for them to get the maximum profit out of the sale. 
                            The product we sell through vegemart are fresh and of high quality. To ensure only fresh products are sold, 
                            we remove products after five days of them being added to the system.</p>
                        </div> 
                    </div>
                    <div class="column is-4 ml-0 pl-1 pr-0">
                        <div class="card">
                            <h3>Forum</h3>
                            <img class="img" src="./images/forum.jpg">
                            <p class="justify-text">You can start discussion on the forum by posting topics with a post. When you post a topic or a post to the forum, 
                            it is submitted to review. Your post might get rejected if it contains misleading irrelevent and harmful content.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns group has-text-centered ">
                <div class="column is-4 ml-0 pl-1 pr-0">
                    <div class="card">
                        <h3>Payments</h3>
                        <img class="img" src="./images/pay1.jpg">
                        <p class="justify-text">Vegemart only operates on online payment for now. Payments should be done withing 2 days of adding the itm to your cart.
                            If you fail to pay with 2 days you will be suspended. If there's an issue with your order please tell us more here</p>
                    </div>
                </div>
                <div class="column is-4 ml-0 pl-1 pr-0">
                    <div class="card">
                        <h3>Products</h3>
                        <img class="img" src="./images/food.jpg">
                        <p class="justify-text">Vegemart has farmers registered as sellers for them to get the maximum profit out of the sale.
                            The product we sell through vegemart are fresh and of high quality. To ensure only fresh products are sold,
                            we remove products after five days of them being added to the system.</p>
                    </div>
                </div>
                <div class="column is-4 ml-0 pl-1 pr-0">
                    <div class="card">
                        <h3>Forum</h3>
                        <img class="img" src="./images/forum.jpg">
                        <p class="justify-text">You can start discussion on the forum by posting topics with a post. When you post a topic or a post to the forum,
                            it is submitted to review. Your post might get rejected if it contains misleading irrelevent and harmful content.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="column is-1"></div>
    </div>
    <hr>

<<<<<<< HEAD
            <div class="column is-6 mb-2">
                <h1 style="font-size:20px;">Contact us</h1>
                <p class="justify-text pb-0 mb-0">Click on the button at the bottom of this page to open the login form.
                Note that the button and the form is fixed - they will always be positioned to the bottom of the browser window. 
                If there's an issue with your order please tell us more here</p>
            
                <button class="open-button" onclick="openForm()">Open Form</button><br>

                <div class="form-popup " id="myForm">
                    <form id="complaint-form" class="form-container " action="../src/helpdesk_complaint_submit.php" method="post">
                    <div class="has-text-left ml-1 pl-2">
                        <label for="name">Name</label><br> 
                        <input type="text" name="name" placeholder="Name" required><br>

                        <!-- <label for="last_name">Last Name</label><br> 
                        <input type="text" name="last_name" placeholder="Last Name" required><br> -->

                        <label for="phoneNum">Contact Number (Optional)</label><br> 
                        <input type="text" name="phoneNum" placeholder="Contact number" ><br>

                        <label for="email">email</label><br> 
                        <input type="email" name="email" placeholder="Email address" required><br>
                        
                        <label for="issue">Issue</label>   <br> 
                        <input type="text" name="issue" placeholder="What seems to be wrong?" required><br>

                        <label for="issue_description">Describe the issue</label>   <br> 
                        <textarea rows="7" cols="10" name="issue_description" form="complaint-form" placeholder="Please describe the issue"></textarea><br>
                    </div>
                        <input type="submit" class="btn" name="submit" value="File Complaint">
                        <input type="button" class="btn cancel" onclick="closeForm()" value="Cancel">
                    </form>
                </div>
            </div> 
=======
    <div class="columns group mt-0 pl-2 pr-2"">             
            <div class=" column is-6 has-text-centered ">
                <h1 style=" font-size:20px;">FAQs</h1>
        <div id="question1">
            How long does an auction last? <br>
            <a onclick="toggle('answer1');">View answer</a>
        </div>
        <div style="display:none" id="answer1">
            An auction typically last for 2 hours.
>>>>>>> 3dc2112472ae8dfbc119f46c9d4273c11bb6ab49
        </div>
        <br>
        <div id="question2">
            How long will it take for the product to be delivered<br>
            <a onclick="toggle('answer2');">View answer</a>
        </div>
        <div style="display:none" id="answer2">
            It depends on your location and the current traffic situation. You can contact your deliverer and get indfomation.
        </div>
    </div>

    <div class="column is-6 mb-2">
        <h1 style="font-size:20px;">Contact us</h1>
        <p class="justify-text pb-0 mb-0">Click on the button at the bottom of this page to open the login form.
            Note that the button and the form is fixed - they will always be positioned to the bottom of the browser window.
            If there's an issue with your order please tell us more here</p>

        <button class="open-button" onclick="openForm()">Open Form</button><br>

        <div class="form-popup " id="myForm">
            <form id="complaint-form" class="form-container " action="../src/helpdesk_complaint_submit.php" method="post">
                <div class="has-text-left ml-1 pl-2">
                    <label for="name">Name</label><br>
                    <input type="text" name="name" placeholder="Name" required><br>

                    <label for="phoneNum">Contact Number (Optional)</label><br>
                    <input type="text" name="phoneNum" placeholder="Contact number"><br>

                    <label for="email">email</label><br>
                    <input type="email" name="email" placeholder="Email address" required><br>

                    <label for="issue">Issue</label> <br>
                    <input type="text" name="issue" placeholder="What seems to be wrong?" required><br>

                    <label for="issue_description">Describe the issue</label> <br>
                    <textarea rows="7" cols="10" name="issue_description" form="complaint-form" placeholder="Please describe the issue"></textarea><br>
                </div>
                <input type="submit" class="btn" name="submit" value="File Complaint">
                <input type="button" class="btn cancel" onclick="closeForm()" value="Cancel">
            </form>
        </div>
    </div>
    </div>

    <div class="column is-1 mt-0">
        <button onclick="topFunction()" id="toTopBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
    </div>

    <script type="text/javascript">
        //view answer
        function toggle(id) {
            var e = document.getElementById(id);
            if (e.style.display == 'none')
                e.style.display = 'block';
            else
                e.style.display = 'none';
        }

        //open form
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }
        //close from
        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

        //go to top button
        var mybutton = document.getElementById("toTopBtn");
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
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
    <!--         
        <div id="askQ">
            <button class="button" onClick="location.href='http://localhost/vegemart/ask_Q.php';"><i class="fa fa-question mr-1" style="font-size:18px; color: white;"></i>Ask a Question</button>
        </div> -->
    <?php include_once "./includes/footer.php"; ?>
</body>

</html>