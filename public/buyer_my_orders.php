<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <link rel="stylesheet" type="text/css" href="./css/buyer-my-orders.css">
        <link rel="stylesheet" type="text/css" href="./css/style.css">
        <link rel="stylesheet" type="text/css" href="./css/footer.css">
        <title>My Orders | Vegemart</title>
    </head>


    <body>
        <?php include "./includes/nav.php"; ?>

        <div class="row">
            <div class="heading">
                <h1>My Orders</h1>
            </div>
            <br>
            <div class="columns group mt-0">
                <div class="column is-1 mt-0"></div>
                <div class="column is-10 mt-0">
                    <table>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Seller Name</th>
                            <th>Picked up/ Delivered</th>
                            <th>Deliverer Name</th>
                            <th>Amount spent (Rs.)</th>
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

        </div>
        <?php include_once "./includes/footer.php"; ?>    
       
    </body>
</html>