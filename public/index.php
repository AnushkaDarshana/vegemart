<?php
    include_once ('./includes/index_nav.php');                       
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
    <title>Vegemart</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="css/footer.css">
    <style>
        
        .bg{    
        position: absolute;
        top:0%;
        left: 50%;
        vertical-align: left;
        width: 50%;
        height: 78%;
        display: flex;
        z-index: 0;
        }
        .card {
        position: relative;
        box-shadow: 6px 6px 20px -8px rgba(0, 0, 0, 0.75);
        border-radius: 15px;
        padding: 1rem;
        margin: 5%;
        margin-top: 16%!important;
        align-self: center;
        text-align: left;
        
        }

        h1{
            font-family:Candara;
        }
        
        .img{
            width:40%;
        }
        .description{
            position: relative;
            margin-top: 4%;
            align-self: center;
            text-align: left;
        }

        #heading{
            font-family: Candara;
            
        }

        button {
            background-color: #138D75;
            border-color: transparent;
            color: #fff;
            font-size: 1rem;
            cursor: pointer;
            justify-content: center;
            padding-bottom: calc(0.5em - 1px);
            padding-left: 1em;
            padding-right: 1em;
            padding-top: calc(0.5em - 1px);
            text-align: center;
            white-space: nowrap;
            border-radius: 0.3em;
        }

        button > i{
            color: white !important
        }
        .forum{
            position: relative;
            align-self: center;
            text-align: left;
            overflow: auto;
            
        }
        .vegetables{
            overflow: auto;
            display: flex;
        }
        
        .cursive{
            color:#138D75!important;
            font-family:Brush Script MT, Brush Script Std, cursive;
        }
        .green{
            color:#138D75!important;
            
        }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="columns group mt-0">
                <div class="column is-7 mt-0">
                <div class="description">
                        <div class="text-align:left mb-0 pl-5 pr-1">
                            <h3 id="heading" class="mt-0 mb-0" style="color:#323131;font-size:420%"><span class="cursive">Fresh</span> Vegetables</h3>
                            <h2 id="heading" class="mt-0" style="color:#323131;font-size:180%"><span class="light-green">NOW AT YOUR DOORSTEP</span></h2>
                            <p id="heading" class="mt-0" style="color:#323131;font-size:130%"><span class="light-green"></span>Shopping for vegetables in Colombo is rarely a pleasure. You're either fumbling through unopenable plastic bags at othe shops or side-stepping dried puddles of crow poo at the market. The thing about vegetable shopping here is that you'll never find everything you want within a single venue. And as for enjoying the experience, well, that's unlikely.</p>                    
                            
                            <div class="row has-text-left mt-1 mb-1 mr-1">
                                    <button class="button" onClick="location.href='https://localhost/vegemart/public/products.php';"><i class="fas fa-shopping-basket mr-1"></i></i>Shop now</button>
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="column is-5 mt-0">
                    <img class="bg" src= "./images/index.png" alt="Display Picture">
                </div>
            </div>
        </div>
        <div class="row pl-1 pr-1 mt-1">
            <div class="columns group mt-0">
                <div class="column is-4 mt-0">
                    <div class="card">
                        <div class="has-text-centered mb-0">
                            <img class="img" src="./images/indexbuyer.png">
                        </div>
                        <div class="text-align:left  pl-1 pr-1">
                            <p style="font-size:120%; text-align: center;"><b> Buyers</b> <br></p> <p style="font-size:120%;"> The purpose of online shopping is to save time, save money. Through online shopping buyer can save his valuable time. He can watch and select things he wants to buy. Through online shopping buyers can save money because prices are less than market prices and can get things delivered to their home at their convenience.</p>
                        </div> 
                    </div>
                </div>
                <div class="column is-4 mt-0">
                    <div class="card">
                        <div class="has-text-centered">
                            <img class="img" src="./images/indexseller.png">
                        </div>
                        <div class="text-align:left pl-1 pr-1">
                            <p style="font-size:120%; text-align: center;"><b> Sellers</b> <br></p> <p style="font-size:120%;"> Farmers can join the vegemart community to sell their harvest of vegetables, fruits and etc. at a fair price and obtain a fair income, the sellers can advertise their products online prior to the harvest so that the buyers will be aware of what products will be available in the near future. </p>
                        </div>                     
                    </div>                
                </div>
                <div class="column is-4 mt-0">
                    <div class="card">
                        <div class="has-text-centered">
                            <img class="img" src="./images/indexdeliverer.png">
                        </div>     
                        <div class="text-align:left  pl-1 pr-1">
                            <p style="font-size:120%; text-align: center;"><b> Deliveres </b> <br></p> <p style="font-size:120%;">Online delivery system supported by vegemart, helps to deliver products to our customers to their door step buy simple making a booking for the delivery online. Any deliverer available in that corresponding will accept the delivery request on their convenience, hence it promotes quick and easy delivery. </p>
                        </div>                
                    </div>                
                </div>
            </div>
        </div>
        <div class="row pl-1 pr-2 mt-0">
            <div class="columns group mt-0">
                <div class="column is-12 pr-1">
                    <div class="forum">
                        <div class="column is-6 pr-3 pl-3">
                            <div class="has-text-left mt-0">
                                <h1>Try Not to Be Late!</h1>
                                <p style="font-size:140%">Identifying the space for a trusted delivery service, Vegemart has taken the initiative to spread its wings into the delivery sector as well by connecting deliverers with our farmers and customers.</p>
                                <p style="font-size:140%">Delivery Malli was set up in order to provide a quick and reliable service in delivering goods and documents. “Malli" in Sinhala, as spoken in Sri Lanka, means “younger brother”.</p>
                                <p style="font-size:140%">With "Delivery Malli" we thought of touching the hearts of our customers becoming their most trusted brother in delivering the harvest vegitables fruits and other harvest products.</p>
                                <p style="font-size:140%">Experience the goodness of the online delivery booking in Vegemart!</p>      
                                <div class="row has-text-right mt-1 mb-1 mr-1">
                                    <button class="button" onClick="location.href='https://localhost/vegemart/public/deliverer/deliverer_signup.php';"><i class="fas fa-truck mr-1" ></i>Join as a Rider</button>
                                </div> 
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="has-text-centered mb-0 pr-2">
                                <img src="./images/indexdelivery.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-0 mb-0 pr-1 pl-1">
            <div class="columns group mt-0">
                <div class="column is-12">
                    <div class="forum">
                        <div class="column is-6">
                            <div class="has-text-left mb-0">
                                <img class="vegetables" style="width:100%" src="./images/vege1.png">
                            </div>
                        </div>
                        <div class="column is-6">
                            <div class="has-text-left mb-0">
                                <img class="vegetables" style="width:100%" src="./images/9.jpg">
                            </div>
                        </div>                     
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-1 mb-2 pr-1 pl-1">
            <div class="columns group mt-0">
                <div class="column is-12">
                    <div class="forum">
                        <div class="column is-6 mt-0 mb-0">
                            <div class="has-text-centered">
                                <h1 style="height:80px; font-size:80px" class="green"> 100% FRESH</h1>
                            </div>
                        </div>
                        <div class="column is-6 mt-0 mb-0">
                            <div class="has-text-centered">
                                <h1 style="height:80px;font-size:80px" class="green" > 100% CERTIFIED</h1>
                            </div>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
        <div class="row pl-1 pr-2 mb-0">
            <div class="columns group mt-0 mb-0">
                <div class="column is-12 pr-1 mb-0">
                    <div class="forum">
                        <div class="column is-5 mb-0 pl-2">
                            <div class="has-text-left mt-3 mb-0">
                                <h1>Bid online to buy products at a fair price!</h1>
                                <p style="font-size:140%">The system supports bidding online within a particular time schedule from the bid start time. </p>
                                <p style="font-size:140%"> The buyers can bid for products they are willing to buy starting from the initial price set for each product by the sellers, this results in fair sales for sellers and buyers. </p>
                                <p style="font-size:140%">The one who bids for the highest price within the time period wins the bid!</p>
                                
                            </div>
                        </div>
                        <div class="column is-7 pr-2 pl-5 mt-2 mb-0">
                            <div class="has-text-centered mb-0">
                                <img src="./images/auction.jpg">
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pl-1 pr-2 mt-1 mb-2">
            <div class="columns group mt-0">
                <div class="column is-12 pr-1 mt-0">
                    <div class="forum">
                        <div class="column is-5 pr-1 mt-0">
                            <div class="has-text-centered mb-0 mt-0">
                                <img src="./images/indexforum.jpg">
                            </div>
                        </div>
                        <div class="column is-7 pr-2 pl-5">
                            <div class="has-text-left mt-3">
                            <h1>Ask an expert about online shopping!!</h1>
                            <p style="font-size:140%">Vegemart Forums is dedicated in providing the most suitable answer for our user queries, it offers a plenty of help for all online merchants out there. </p>
                            <p style="font-size:140%">With more than thousands of topics created, the Vegemart community has covered nearly everything concerning e-Commerce that may come into your mind. </p>
                            <p style="font-size:140%">The best thing is the fact that unlike the majority of other message boards, Vegemart Forum is continue to actively develop and add up to its value.</p>
                            
                        </div>
                        </div>
                    </div>
                </div>
                <button onclick="topFunction()" id="toTopBtn" title="Go to top"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>   
            </div>
        </div>
        <script>
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

        <?php
            include_once ('./includes/footer.php');                       
        ?>        
    </body>
</html>