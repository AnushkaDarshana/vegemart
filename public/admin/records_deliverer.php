<?php
    include ('../../config/dbconfig.php');
//Deliverers vehicle graph
    $sql= "SELECT `vehicle`, COUNT(`user_id`) AS total_count
            FROM `deliverer` 
            GROUP BY `vehicle`";
    $result = mysqli_query($con,$sql);
    $a=array(); 
    $b=array();   

    while($row = mysqli_fetch_assoc($result)){
    array_push($a, $row['vehicle']);
    array_push($b, $row['total_count']);
    }
    $js_array_a = json_encode($a);
    $js_array_b = json_encode($b);

// Location Graph
$sql1 ="SELECT city, COUNT(`user_id`) AS tot_count 
        FROM `deliverer` d, (SELECT `id` 
                        FROM `users` 
                        WHERE `userType` = 'deliverer') del 
        WHERE d.`user_id`= del.id 
        GROUP BY d.city";

$result1 = mysqli_query($con,$sql1);
        $c=array(); 
        $d=array();   

while($row1 = mysqli_fetch_assoc($result1)){
    array_push($c, $row1['city']);
    array_push($d, $row1['tot_count']);
    }
    $js_array_c = json_encode($c);
    $js_array_d = json_encode($d);

    //Total deliverers
    $userType="deliverer";
    $sql2 ="SELECT COUNT(id) AS total
            FROM `users`
            WHERE userType='$userType'";
    $result2 = mysqli_query($con,$sql2);
    $row2 = mysqli_fetch_assoc($result2);   
    //active deliverers 
    $sql3 ="SELECT COUNT(id) AS total1
            FROM `users`
            WHERE userType='$userType' and  active_status= 1 "; 
    $result3 = mysqli_query($con,$sql3);
    $row3 = mysqli_fetch_assoc($result3);
    //inactive deliverers 
    $sql4 ="SELECT COUNT(id) AS total2
            FROM `users`
            WHERE userType='$userType' and  active_status= 0 "; 
    $result4 = mysqli_query($con,$sql4);
    $row4 = mysqli_fetch_assoc($result4);
    //Total on-going deliveries
    $sql5 ="SELECT COUNT(deliveryID) AS total5
            FROM `deliveries`
            WHERE  pickupStatus= 1 ";
    $result5 = mysqli_query($con,$sql5);
    $row5 = mysqli_fetch_assoc($result5);
    //Total completed deliveries
    $sql6 ="SELECT COUNT(deliveryID) AS total6
            FROM `deliveries`
            WHERE  deliveryStatus= 1 ";
    $result6 = mysqli_query($con,$sql6);
    $row6 = mysqli_fetch_assoc($result6); 
    //Total income
    $sql7 ="SELECT SUM(`paid_amount`) AS total7 
            FROM `payment`";
    $result7 = mysqli_query($con,$sql7);
    $row7 = mysqli_fetch_assoc($result7);
    

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/deliverer-home.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <title>Deliverer Records | Vegemart</title>
        <link href="https://localhost/vegemart/public/images/logo.png" rel="shortcut icon">
    </head>
    <body>
        <?php include "../includes/admin_nav.php"; ?>
        <div class="row">
            <h1 class="has-text-left ml-2 mb-0">Deliver Records</h1>
            <div class="columns group mt-0">
                <div class="column is-4 pl-1">
                    <div class="card mt-1 pb-0 pl-2 pr-1">
                        <div class="columns group">
                            <div class="column is-3 pl-0 has-text-left">
                                <i class="fa fa-motorcycle mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#3498DB;"></i>
                            </div>
                            <div class="column is-5 pl-0 has-text-left">
                                <h2 style="font-size:22px;" class="mb-0 pb-0"><?php echo $row2['total'];?></h2>
                                <h3 class="mt-0 pt-0">Total Deliverers Joined</h3>
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
                                <i class="fa fa-check-circle mt-1 mb-1" style="font-size:50px; padding:0.2em 0.1em; margin:0.2em 0;color:#138D75;"></i>
                            </div>
                            <div class="column is-5 pl-0 has-text-left">
                                <h2 style="font-size:22px;" class="mb-0 pb-0"><?php echo $row3['total1'];?></h2>
                                <h3 class="mt-0 pt-0">Active Deliverers</h3>
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
                                <h3 class="mt-0 pt-0">Non- Active Deliverers</h3>
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
                    <h2 style="font-size:22px;" class="has-text-left">No Of Deliverers Based on Vehicle type</h2>
                    <div class="card pl-1 pr-1 pt-1 pb-1">                       
                        <canvas id="buyer_month_chart"></canvas>
                    </div>
                </div>
                <div class="column is-5 pl-1">
                    <h2 style="font-size:22px;" class="has-text-left">No Of Deliverers Based on Location</h2>
                    <div class="card pl-1 pr-1 pt-1 pb-1">                       
                        <canvas id="buyer_location_chart"></canvas>
                    </div>
                </div>
                <div class="column is-1"> </div>
            </div>
            <hr>
            <div class="columns group mt-0">
                <div class="column is-4 pl-3 pr-3 mt-0 mb-2">
                        <h2 style="font-size:22px;" class="has-text-left">Total On-Going Deliveries</h2>
                        <div class="card has-text-centered pt-1 pb-1 pl-1 pr-1">
                            <img id="cash" src="https://www.flaticon.com/svg/static/icons/svg/3082/3082050.svg" alt="cash">
                            <h3 class="has-text-centered mt-0 pt-0">Year 2020</h3>
                            <hr>
                            <div class="columns group">
                                <div class="column is-6 pl-2 has-text-left">
                                    <h3> On-Going Deliveries</h3>
                                </div>
                                <div class="column is-6 pl-2 has-text-right">
                                    <h3><?php echo $row5['total5'];?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="column is-4 pl-3 pr-3 mt-0 mb-2">
                        <h2 style="font-size:22px;" class="has-text-left">Total Deliveries made</h2>
                        <div class="card has-text-centered pt-1 pb-1 pl-1 pr-1">
                            <img id="cash" src="https://www.flaticon.com/svg/static/icons/svg/3500/3500833.svg" alt="cash">
                            <h3 class="has-text-centered mt-0 pt-0">Year 2020</h3>
                            <hr>
                            <div class="columns group">
                                <div class="column is-6 pl-2 has-text-left">
                                    <h3> Completed Deliveries</h3>
                                </div>
                                <div class="column is-6 pl-2 has-text-right">
                                    <h3><?php echo $row6['total6'];?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-4 pl-3 pr-3 mt-0 mb-2">
                        <h2 style="font-size:22px;" class="has-text-left">Total Income</h2>
                        <div class="card has-text-centered pt-1 pb-1 pl-1 pr-1">
                            <img id="cash" src="https://www.flaticon.com/svg/static/icons/svg/2331/2331717.svg" alt="cash">
                            <h3 class="has-text-centered mt-0 pt-0">Year 2020</h3>
                            <hr>
                            <div class="columns group">
                                <div class="column is-6 pl-2 has-text-left">
                                    <h3>Total Income</h3>
                                </div>
                                <div class="column is-6 pl-2 has-text-right">
                                    <h3>Rs. <?php echo $row7['total7'];?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
        <script>
            var chart = new Chart('buyer_month_chart', {
                type: 'line',
                data: {
                    labels: <?php echo $js_array_a ?>,
                    datasets: [{
                        fill: 'false',
                        backgroundColor: '#239B56',
                        borderColor:'rgba(35, 155, 86 , 1)',
                        borderWidth: 1,
                        label: 'Number of Deliverers Joined',
                        data: <?php echo $js_array_b ?>
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

            var PieChart  = new Chart('buyer_location_chart', {
                type: 'pie',
                data: {
                    labels: <?php echo $js_array_c ?>,
                    datasets: [{
                        label: 'Number of Deliverers',
                        backgroundColor: ['#76D7C4','#F9E79F', '#C0392B', '#8E44AD' ,'#FADBD8',],
                        borderWidth: 0.5,
                        data: <?php echo $js_array_d ?>
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