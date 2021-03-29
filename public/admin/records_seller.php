<?php
    include ('../../config/dbconfig.php');




















    $userType="seller";
    //Total sellers
    $sql2 ="SELECT COUNT(id) AS total
            FROM `users`
            WHERE userType='$userType'";
    $result2 = mysqli_query($con,$sql2);
    $row2 = mysqli_fetch_assoc($result2);
    
    //active sellers 
    $sql3 ="SELECT COUNT(id) AS total1
            FROM `users`
            WHERE userType='$userType' and  active_status= 1 "; 
    $result3 = mysqli_query($con,$sql3);
    $row3 = mysqli_fetch_assoc($result3);

    //inactive sellres orders
    $sql4 ="SELECT COUNT(id) AS total2
            FROM `users`
            WHERE userType='$userType' and  active_status= 0 "; 
    $result4 = mysqli_query($con,$sql4);
    $row4 = mysqli_fetch_assoc($result4);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/deliverer-home.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title>Product Records | Vegemart</title>
    </head>
    <body>
        <?php include "../includes/admin_nav.php"; ?>
        <div class="row">
            <h1 class="has-text-left ml-2 mb-0">Seller Records</h1>
            <div class="columns group mt-0">
                <div class="column is-4 pl-1">
                    <div class="card mt-1 pb-0 pl-2 pr-1">
                        <div class="columns group">
                            <div class="column is-3 pl-0 has-text-left">
                                <i class="fa fa-user mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#138D75;"></i>
                            </div>
                            <div class="column is-5 pl-0 has-text-left">
                                <h2 style="font-size:22px;" class="mb-0 pb-0"><?php echo $row2['total'];?></h2>
                                <h3 class="mt-0 pt-0">Total Sellers Joined</h3>
                            </div>
                            <div class="column is-4 pl-0 has-text-left">
                                <i class="fa fa-bar-chart mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#E5E7E9;"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4 pl-1">
                    <div class="card mt-1 pb-0 pl-2 pr-1">
                        <div class="columns group">
                            <div class="column is-3 pl-0 has-text-left">
                                <i class="fa fa-check-circle mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#34DB98;"></i>
                            </div>
                            <div class="column is-5 pl-0 has-text-left">
                                <h2 style="font-size:22px;" class="mb-0 pb-0"><?php echo $row3['total1'];?></h2>
                                <h3 class="mt-0 pt-0">Active Sellers</h3>
                            </div>
                            <div class="column is-4 pl-0 has-text-left">
                                <i class="fa fa-bar-chart mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#E5E7E9;"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4 pl-1">
                    <div class="card mt-1 pb-0 pl-2 pr-1">
                        <div class="columns group">
                            <div class="column is-3 pl-0 has-text-left">
                                <i class="fa fa-exclamation-circle" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#EB694F ;"></i>
                            </div>
                            <div class="column is-5 pl-0 has-text-left">
                                <h2 style="font-size:22px;" class="mb-0 pb-0"><?php echo $row4['total2'];?></h2>
                                <h3 class="mt-0 pt-0">Non-active sellers</h3>
                            </div>
                            <div class="column is-4 pl-0 has-text-left">
                                <i class="fa fa-bar-chart mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#E5E7E9;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns group mb-1">
                <div class="column is-1"> </div>
                <div class="column is-5 pl-1">
                    <h2 style="font-size:22px;" class="has-text-left">No Of Seller Joined</h2>
                    <div class="card pl-1 pr-1 pt-1 pb-1">                       
                        <canvas id="seller_month_chart"></canvas>
                    </div>
                </div>
                <div class="column is-5 pl-1">
                    <h2 style="font-size:22px;" class="has-text-left">No Of Sellers based on Location</h2>
                    <div class="card pl-1 pr-1 pt-1 pb-1">                       
                        <canvas id="seller_location_chart"></canvas>
                    </div>
                </div>
                <div class="column is-1"> </div>
            </div>
            <hr>
            <div class="columns group mt-0">
                <div class="column is-4 pl-3 pr-3 mt-0 mb-2">
                        <h2 style="font-size:22px;" class="has-text-left">Total Products sold</h2>
                        <div class="card has-text-centered pt-1 pb-1 pl-1 pr-1">
                            <img id="cash" src="https://www.flaticon.com/svg/static/icons/svg/861/861120.svg" alt="cash">
                            <h2 style="font-size:22px;" class="has-text-centered pt-0 pb-0 mb-0">177 kg</h2>
                            <h3 class="has-text-centered mt-0 pt-0">December 2020</h3>
                            <hr>
                            <div class="columns group">
                                <div class="column is-6 pl-2 has-text-left">
                                    <h3>Total Quantity</h3>
                                </div>
                                <div class="column is-6 pl-2 has-text-right">
                                    <h3>5313 kg</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-4 pl-3 pr-3 mt-0 mb-2">
                        <h2 style="font-size:22px;" class="has-text-left">Total Sellers</h2>
                        <div class="card has-text-centered pt-1 pb-1 pl-1 pr-1">
                            <img id="cash" src="https://www.flaticon.com/svg/static/icons/svg/517/517542.svg" alt="cash">
                            <h2 style="font-size:22px;" class="has-text-centered pt-0 pb-0 mb-0">17</h2>
                            <h3 class="has-text-centered mt-0 pt-0">December 2020</h3>
                            <hr>
                            <div class="columns group">
                                <div class="column is-6 pl-2 has-text-left">
                                    <h3>Total Sellers</h3>
                                </div>
                                <div class="column is-6 pl-2 has-text-right">
                                    <h3>456</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="column is-4 pl-3 pr-3 mt-0 mb-2">
                        <h2 style="font-size:22px;" class="has-text-left">Total Income of sellers</h2>
                        <div class="card has-text-centered pt-1 pb-1 pl-1 pr-1">
                            <img id="cash" src="https://www.flaticon.com/svg/static/icons/svg/639/639365.svg" alt="cash">
                            <h2 style="font-size:22px;" class="has-text-centered pt-0 pb-0 mb-0">Rs. 4260</h2>
                            <h3 class="has-text-centered mt-0 pt-0">December 2020</h3>
                            <hr>
                            <div class="columns group">
                                <div class="column is-6 pl-2 has-text-left">
                                    <h3>Total Income</h3>
                                </div>
                                <div class="column is-6 pl-2 has-text-right">
                                    <h3>Rs. 428,420</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
        <script>
            var chart = new Chart('seller_month_chart', {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        fill: 'false',
                        backgroundColor: '#0A217B',
                        borderColor:'rgba(10, 33, 123, 1)',
                        borderWidth: 1,
                        label: 'Number of sellers joined',
                        data: [10, 32, 51, 15, 33, 52, 47, 77, 53, 24, 36, 17]
                    }]
                },
                options: {
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                            }
                        }],
                        yAxes: [{
                            ticks: {
                            beginAtZero: true
                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, 0)",
                            }
                        }]
                    }
                }
            });

            var PieChart  = new Chart('seller_location_chart', {
                type: 'pie',
                data: {
                    labels: ['Kandy', 'Nuwara Eliya', 'Matale','Badulla', 'Anuradhapura'],
                    datasets: [{
                        label: 'Number of Sales',
                        backgroundColor: ['#F9E79F','#8E44AD' ,'#FADBD8', '#C0392B', '#76D7C4',],
                        borderWidth: 0.5,
                        data: [ 32, 45, 19, 38, 15]
                    }]
                },
                options: {
                    title: {
                        display: true,
                    }
                }
            });
        </script>
        <br>
    </body>
</html>