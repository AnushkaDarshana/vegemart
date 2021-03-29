<?php
include ('../src/session.php'); 
include ('../config/dbconfig.php');

//$merchant_id         = $_POST['merchant_id'];
// $order_id             = $_POST["123"];
// $payhere_amount     = $_POST["220"];
// $payhere_currency    = $_POST['LKR'];
// $status_code         = $_POST['status_code'];
// $md5sig                = $_POST['md5sig'];

// $merchant_secret = '8n0PcUL0cLe48h9HZImCvx4TvOWGJMtjV4joK3muqY0z'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

// $local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

// if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
//         $payment = "INSERT INTO `payment` (`order_id`,`payhere_amount`) VALUES ('" . $orderID . "','" . $amount . "');";
//         mysqli_query($con, $payment);
// }

//echo $merchant_id;

?>