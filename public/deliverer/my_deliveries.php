<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/my-deliveries.css">
        <link rel="stylesheet" href="../css/style.css"> 
        <link rel="stylesheet" href="../css/footer.css">
        <link href="http://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
        <title>My Deliveries | Vegemart</title>
    </head>
    <body>
        <?php include "./deliverer_nav.php"; ?>

        <div class="row">
            <h1 id="heading">My Deliveries</h1>
            <br>
            <div class="columns group mt-0">
                <div class="column is-1 mt-0"></div>
                <div class="column is-10 mt-0">
                    <table>
                        <tr>
                            <th>Record ID</th>
                            <th>Date</th>
                            <th>Seller Name</th>
                            <th>Picked up Location</th>
                            <th>Buyer Name</th>
                            <th>Delivered Location</th>                         
                            <th>Earned amount (Rs.)</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>#1</td>
                            <td>02/01/2020</td>
                            <td>Nimal Perera</td>
                            <td>Picked up Location</td>
                            <td>Thusitha Bandara</td>
                            <td>Delivered Location</td>
                            <td>20.00</td>
                            <td class="has-text-centered"><a href="#">View reciept</a></td>
                        </tr>
                        <tr>
                            <td>#2</td>
                            <td>07/03/2020</td>                    
                            <td>Amal Silva</td>
                            <td>Picked up Location</td>
                            <td>Kamal Diaz</td>
                            <td>Delivered Location</td>
                            <td>40.00</td>
                            <td  class="has-text-centered"><a href="#">View reciept</a></td>
                        </tr>
                        <tr>
                            <td>#3</td>
                            <td>02/01/2020</td>                           
                            <td>Nimal Perera</td>
                            <td>Picked up Location</td>
                            <td>Kamal Diaz</td>
                            <td>Delivered Location</td>
                            <td>50.00</td>
                            <td class="has-text-centered"><a href="#">View reciept</a></td>
                        </tr>
                        <tr>
                            <td>#4</td>
                            <td>07/03/2020</td>                          
                            <td>Amal Silva</td>
                            <td>Picked up Location</td>
                            <td>Nimal Perera</td>
                            <td>Delivered Location</td>
                            <td>30.00</td>
                            <td  class="has-text-centered"><a href="#">View reciept</a></td>
                        </tr>
                        <tr>
                            <td>#5</td>
                            <td>02/01/2020</td>
                            <td>Nimal Perera</td>
                            <td>Picked up Location</td>
                            <td>Thusitha Bandara</td>
                            <td>Delivered Location</td>
                            <td>200.00</td>
                            <td class="has-text-centered"><a href="#">View reciept</a></td>
                        </tr>
                        <tr>
                            <td>#6</td>
                            <td>07/03/2020</td>
                            <td>Amal Silva</td>
                            <td>Picked up Location</td>
                            <td>Thusitha Bandara</td>
                            <td>Delivered Location</td>
                            <td>740.00</td>
                            <td  class="has-text-centered"><a href="#">View reciept</a></td>
                        </tr>
                        <tr>
                            <td>#7</td>
                            <td>02/01/2020</td>
                            <td>Nimal Perera</td>
                            <td>Picked up Location</td>
                            <td>Kamal Diaz</td>
                            <td>Delivered Location</td>
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
        <?php include_once "../includes/footer.php"; ?>    
    </body>
</html>