<?php
    include ('../../config/dbconfig.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/deliverer-home.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/footer.css">
        <title>Manage Sellers | Vegemart</title>
    </head>
    <body>
        <div>
            <?php include "../includes/admin_nav.php"; ?>
        </div> 
        
        <div class="row">
            <div class="columns group">
                <div class="column is-4 pl-2">
                    <h2 style="font-size:22px;" class="has-text-left">Sales Status</h2>
                    <div class="row">
                        <div class="card mt-1 pb-0 pl-2 pr-1">
                            <div class="columns group">
                                <div class="column is-3 pl-0 has-text-left">
                                    <i class="fa fa-shopping-cart mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#138D75;"></i>
                                </div>
                                <div class="column is-5 pl-0 has-text-left">
                                    <h2 style="font-size:22px;" class="mb-0 pb-0">568</h2>
                                    <p class="mt-0 pt-0">Total Sales</p>
                                </div>
                                <div class="column is-4 pl-0 has-text-left">
                                    <i class="fa fa-bar-chart mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#E5E7E9;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card mt-1 pb-0 pl-2 pr-1">
                            <div class="columns group">
                                <div class="column is-3 pl-0 has-text-left">
                                    <i class="fa fa-check-circle mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#34DB98;"></i>
                                </div>
                                <div class="column is-5 pl-0 has-text-left">
                                    <h2 style="font-size:22px;" class="mb-0 pb-0">546</h2>
                                    <p class="mt-0 pt-0">Successfully sold</p>
                                </div>
                                <div class="column is-4 pl-0 has-text-left">
                                    <i class="fa fa-bar-chart mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#E5E7E9;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="card mt-1 pb-0 pl-2 pr-1">
                            <div class="columns group">
                                <div class="column is-3 pl-0 has-text-left">
                                    <i class="fa fa-exclamation-circle" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#EB694F ;"></i>
                                </div>
                                <div class="column is-5 pl-0 has-text-left">
                                    <h2 style="font-size:22px;" class="mb-0 pb-0">12</h2>
                                    <p class="mt-0 pt-0">Failed Sales</p>
                                </div>
                                <div class="column is-4 pl-0 has-text-left">
                                    <i class="fa fa-bar-chart mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#E5E7E9;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-5 pl-1">
                    <h2 style="font-size:22px;" class="has-text-left">No Of Sales</h2>
                    <div class="card pl-1 pr-1 pt-1 pb-1">                       
                        <canvas id="chart"></canvas>
                    </div>
                </div>
                <div class="column is-3 pl-1 pr-2">
                    <h2 style="font-size:22px;" class="has-text-left">Total Income</h2>
                    <div class="card has-text-centered pt-1 pb-1 pl-1 pr-1">
                        <img id="cash" src="https://www.flaticon.com/svg/static/icons/svg/2331/2331717.svg" alt="cash">
                        <h2 style="font-size:22px;" class="has-text-centered pt-0 pb-0 mb-0">Rs. 1,920</h2>
                        <h3 class="has-text-centered mt-0 pt-0">December 2020</h3>
                        <hr>
                        <div class="columns group">
                            <div class="column is-6 pl-2 has-text-left">
                                <h3>Total Income</h3>
                            </div>
                            <div class="column is-6 pl-2 has-text-right">
                                <h3>Rs. 58,260</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var chart = new Chart('chart', {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [
                    {
                        barPercentage: 1,
                        barThickness: 2,
                        maxBarThickness: 3,
                        minBarLength: 1,
                        backgroundColor: '#c46998',
                        backgroundColor:'rgba(10, 10, 10, 0.3)',
                        borderColor:'rgba(10, 10, 10, 1)',
                        borderWidth: 1,
                        label: 'Number of Sales',
                        data: [76, 32, 45, 19, 38, 65, 49, 75, 15, 52, 43, 7]
                    }
                    ]
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
        </script>
        <br>
        <?php include_once "../includes/footer.php"; ?>
    </body>
</html>