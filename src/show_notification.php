<?php include ('../config/dbconfig.php');
    include ('../src/session.php');  

    //type 1 = auction started
    //type 2 = bid win to buyer done
    //type 3 = bid win to seller
    //type 4 = bid loss
    //type 5 = delivery accept done
    //type 6 = product accept done
    //type 7 = buyer accept done
    //type 8 = order removal done
    //type 9 = product removal done
    //type 10 = buyer payement recieved done

    if (isset($_SESSION["loggedInUserID"])||isset($_SESSION["loggedInSellerID"])) {
        if (isset($_SESSION["loggedInUserID"])) {
            $userID = $_SESSION["loggedInUserID"];
         
            $get_notification = "SELECT `type` from `notification` where `forUser` = $userID";
            $get_notification_res = mysqli_query($con, $get_notification);

            if ((mysqli_num_rows($get_notification_res) > 0)) {
                $display_block = "<div id=\"notif-block\" class=\"notif mb-1 pl-1 has-text-left\">";
                
                while ($notification = mysqli_fetch_assoc($get_notification_res)) {
                    $type = $notification['type'];

                    if ($type == '2') {
                        $get_notif = "SELECT * from `notification` where `type` = 2 order by `notif_time` desc";
                        $get_notif_res = mysqli_query($con, $get_notif);
                    
                        if ((mysqli_num_rows($get_notif_res) > 0)) {
                            while ($notification = mysqli_fetch_assoc($get_notif_res)) {
                                $notif_time = $notification['notif_time'];
                                $bidID = $notification['entityID'];

                                $bid_product = "SELECT * from `bidding` where `bidID` = $bidID";
                                $bid_product_res = mysqli_query($con, $bid_product) or die(mysqli_error($con));
                                while ($notification = mysqli_fetch_array($bid_product_res)) {
                                    $productID= $notification['productID'];
                                    $win_quantity= $notification['bidQuantity'];
                                    $win_price= $notification['bidPrice'];

                                    $product = "SELECT `name` from `products` where `productID` = $productID";
                                    $product_res = mysqli_query($con, $product) or die(mysqli_error($con));
                                    while ($bid_notification = mysqli_fetch_array($product_res)) {
                                        $product_name= $bid_notification['name'];
                            
                                        $display_block .="
                                        <h2>Congratulations! You won the bid!</h2>
                                        <h4 class=\"mb-0\">You won $win_quantity kg of the product $product_name from the bid. Your winning price is Rs.$win_price.00</h4>
                                        <p class=\"mt-0 pl-3\">$notif_time</p>
                                        <br><hr>";
                                    }
                                }
                            }
                        }
                    } elseif ($type == '4') {
                        $get_notif = "SELECT * from `notification` where `type` = 4 order by `notif_time` desc";
                        $get_notif_res = mysqli_query($con, $get_notif);
                    
                        if ((mysqli_num_rows($get_notif_res) > 0)) {
                            //  $display_block = "<div id=\"notif-block\" class=\"notif mb-1 pl-1 has-text-left\">";
                            
                            while ($notification = mysqli_fetch_assoc($get_notif_res)) {
                                $notif_time = $notification['notif_time'];
                                $bidID = $notification['entityID'];

                                $bid_product = "SELECT * from `bidding` where `bidID` = $bidID AND `result` = 0";
                                $bid_product_res = mysqli_query($con, $bid_product) or die(mysqli_error($con));
                                while ($notification = mysqli_fetch_array($bid_product_res)) {
                                    $productID = $notification['productID'];

                                    $product = "SELECT `name` from `products` where `productID` = $productID";
                                    $product_res = mysqli_query($con, $product) or die(mysqli_error($con));
                                    while ($bid_notification = mysqli_fetch_array($product_res)) {
                                        $product_name = $bid_notification['name'];

                            
                                        $display_block .="
                                        <h2>Sorry, You lost the bid!</h2>
                                        <h4 class=\"mb-0\">Unfortunately your bidding price wasn't enough to win the product $product_name. Better luck next time!</h4>
                                        <p class=\"mt-0 pl-3\">$notif_time</p>
                                        <br><hr>";
                                    }
                                }
                            }
                        }
                    } elseif ($type == '5') {
                        $get_notif = "SELECT * from `notification` where `type` = 5 order by `notif_time` desc";
                        $get_notif_res = mysqli_query($con, $get_notif);
                    
                        if ((mysqli_num_rows($get_notif_res) > 0)) {
                            // $display_block = "<div id=\"notif-block\" class=\"notif mb-1 pl-1 has-text-left\">";
                            while ($notification = mysqli_fetch_assoc($get_notif_res)) {
                                $notif_time = $notification['notif_time'];
                                $orderID = $notification['entityID'];

                                $order_deli = "SELECT * from `orders` where `orderID` = $orderID";
                                $order_deli_res = mysqli_query($con, $order_deli) or die(mysqli_error($con));
                                while ($notification = mysqli_fetch_array($order_deli_res)) {
                                    $productID = $notification['cartItemID'];

                                    $product = "SELECT `name` from `products` where `productID` = $productID";
                                    $product_res = mysqli_query($con, $product) or die(mysqli_error($con));
                                    while ($deli_notification = mysqli_fetch_array($product_res)) {
                                        $product_name = $deli_notification['name'];

                            
                                        $display_block .="
                                        <h2>Delivery request is accepted.</h2>
                                        <h4 class=\"mb-0\">Your delivery request for the product $product_name is accepted. Stay tuned.</h4>
                                        <p class=\"mt-0 pl-3\">$notif_time</p>
                                        <br><hr>";
                                    }
                                }
                            }
                        }
                    } elseif ($type == '6') {
                        $get_notif = "SELECT * from `notification` where `type` = 6 order by `notif_time` desc";
                        $get_notif_res = mysqli_query($con, $get_notif);
                    
                        if ((mysqli_num_rows($get_notif_res) > 0)) {
                            // $display_block = "<div id=\"notif-block\" class=\"notif mb-1 pl-1 has-text-left\">";
                            while ($notification = mysqli_fetch_assoc($get_notif_res)) {
                                $notif_time = $notification['notif_time'];
                                $deliveryID = $notification['entityID'];

                                $order_deli = "SELECT * from `deliveries` where `deliveryID` = $deliveryID";
                                $order_deli_res = mysqli_query($con, $order_deli) or die(mysqli_error($con));
                                while ($notification = mysqli_fetch_array($order_deli_res)) {
                                    $sellerID = $notification['sellerID'];

                                    $seller = "SELECT CONCAT(fName, ' ', lName) AS name from `client` where `user_id` = $sellerID";
                                    $seller_res = mysqli_query($con, $seller) or die(mysqli_error($con));
                                    while ($deli_notification = mysqli_fetch_array($seller_res)) {
                                        $seller_name = $deli_notification['name'];
                            
                                        $display_block .="
                                        <h2>Product is recieved from the seller.</h2>
                                        <h4 class=\"mb-0\">Your order of product $product_name is recieved from $seller_name. Stay tuned.</h4>
                                        <p class=\"mt-0 pl-3\">$notif_time</p>
                                        <br><hr>";
                                    }
                                }
                            }
                        }
                    } elseif ($type == '7') {
                        $get_notif = "SELECT * from `notification` where `type` = 7 order by `notif_time` desc";
                        $get_notif_res = mysqli_query($con, $get_notif);
                    
                        if ((mysqli_num_rows($get_notif_res) > 0)) {
                            // $display_block = "<div id=\"notif-block\" class=\"notif mb-1 pl-1 has-text-left\">";
                            while ($notification = mysqli_fetch_assoc($get_notif_res)) {
                                $notif_time = $notification['notif_time'];
                                $deliveryID = $notification['entityID'];

                                $order_deli = "SELECT * from `deliveries` where `deliveryID` = $deliveryID";
                                $order_deli_res = mysqli_query($con, $order_deli) or die(mysqli_error($con));
                                while ($notification = mysqli_fetch_array($order_deli_res)) {
                                    $delivererID = $notification['delivererID'];

                                    $deliverer = "SELECT CONCAT(fName, ' ', lName) AS name from `deliverer` where `user_id` = $delivererID";
                                    $deliverer_res = mysqli_query($con, $deliverer) or die(mysqli_error($con));
                                    while ($deli_notification = mysqli_fetch_array($deliverer_res)) {
                                        $deliverer_name = $deli_notification['name'];
                            
                                        $display_block .="
                                        <h2>Your order at your door!</h2>
                                        <h4 class=\"mb-0\">Your order of product $product_name is delievered by $deliverer_name.</h4>
                                        <p class=\"mt-0 pl-3\">$notif_time</p>
                                        <br><hr>";
                                    }
                                }
                            }
                        }
                    } elseif ($type == '8') {
                        $get_notif = "SELECT * from `notification` where `type` = 8 order by `notif_time` desc";
                        $get_notif_res = mysqli_query($con, $get_notif);
                    
                        if ((mysqli_num_rows($get_notif_res) > 0)) {
                            // $display_block = "<div id=\"notif-block\" class=\"notif mb-1 pl-1 has-text-left\">";
                            while ($notification = mysqli_fetch_assoc($get_notif_res)) {
                                $notif_time = $notification['notif_time'];
                                $orderID = $notification['entityID'];

                                $order_product = "SELECT * from `orders` where `orderID` = $orderID";
                                $order_product_res = mysqli_query($con, $order_product) or die(mysqli_error($con));
                                while ($notification = mysqli_fetch_array($order_product_res)) {
                                    $bidID = $notification['bidID'];
                                    $buyerID = $notification['userID'];

                                    $bid_product = "SELECT * from `bidding` where `bidID` = $bidID";
                                    $bid_product_res = mysqli_query($con, $bid_product) or die(mysqli_error($con));

                                    while ($bid_notif = mysqli_fetch_array($bid_product_res)) {
                                        $win_quantity = $bid_notif['bidQuantity'];
                                        $win_price = $bid_notif['bidPrice'];
                                        $productID = $bid_notif['productID'];

                                        $product = "SELECT `name` from `products` where `productID` = $productID";
                                        $product_res = mysqli_query($con, $product) or die(mysqli_error($con));
                                        while ($bid_notification = mysqli_fetch_array($product_res)) {
                                            $product_name = $bid_notification['name'];
                            
                                            $display_block .="
                                        <h2>Order for " . $product_name . " removal warning</h2>
                                        <h4 class=\"mb-0\">You still have not paid for your order of" . $win_quantity . "kg of " . $product_name . ". Failure to pay Rs." . $win_price . ".00 within two days after order, results in your account getting suspended.</h4>
                                        <p class=\"mt-0 pl-3\">$notif_time</p>
                                        <br><hr>";
                                        }
                                    }
                                }
                            }
                        }
                    } elseif ($type == '10') {
                        $get_notif = "SELECT * from `notification` where `type` = 10 order by `notif_time` desc";
                        $get_notif_res = mysqli_query($con, $get_notif);
                    
                        if ((mysqli_num_rows($get_notif_res) > 0)) {
                            //  $display_block = "<div id=\"notif-block\" class=\"notif mb-1 pl-1 has-text-left\">";
                            while ($notification = mysqli_fetch_assoc($get_notif_res)) {
                                $notif_time = $notification['notif_time'];
                                $orderID = $notification['entityID'];

                                $payment = "SELECT * from `payment` where `orderID` = $orderID";
                                $payment_res = mysqli_query($con, $payment);
                                while ($pay_notif = mysqli_fetch_array($payment_res)) {
                                    $payment = $pay_notif['paid_amount'];

                                    $order_deli = "SELECT * from `orders` where `orderID` = $orderID";
                                    $order_deli_res = mysqli_query($con, $order_deli) or die(mysqli_error($con));
                                    while ($notification = mysqli_fetch_array($order_deli_res)) {
                                        $productID = $notification['cartItemID'];

                                        $product = "SELECT `name` from `products` where `productID` = $productID";
                                        $product_res = mysqli_query($con, $product) or die(mysqli_error($con));
                                        while ($deli_notification = mysqli_fetch_array($product_res)) {
                                            $product_name = $deli_notification['name'];

                                            $display_block .="
                                        <h2>Payment recieved.</h2>
                                        <h4 class=\"mb-0\">Your payment of" . $payment . "for the order $product_name is recieved. Thank you.</h4>
                                        <p class=\"mt-0 pl-3\">$notif_time</p>
                                        <br><hr>";
                                        }
                                    }
                                }
                            }
                        }
                    }
                    //close up the table
                    $display_block .= "</div>";
                }
            }
        }
        if (isset($_SESSION["loggedInSellerID"])) {
            $userID = $_SESSION["loggedInSellerID"];

            $get_notification = "SELECT `type` from `notification` order by `notif_time` desc";
            $get_notification_res = mysqli_query($con, $get_notification);
        
            if (mysqli_num_rows($get_notification_res) > 0) {
                $display_block = "<div id=\"notif-block\" class=\"notif mb-1 pl-1 has-text-left\">";

                while ($notification = mysqli_fetch_assoc($get_notification_res)) {
                    $type = $notification['type'];

                    if ($type == '1') {
                        $get_notif = "SELECT * from `notification` where  where `type` = 1 order by `notif_time` desc";
                        $get_notif_res = mysqli_query($con, $get_notif);
                    
                        if ((mysqli_num_rows($get_notif_res) > 0)) {
                            // $display_block = "<div id=\"notif-block\" class=\"notif mb-1 pl-1 has-text-left\">";
                    
                            while ($notification = mysqli_fetch_assoc($get_notif_res)) {
                                $notif_time = $notification['notif_time'];
                                $bidID = $notification['entityID'];

                                $bid_product = "SELECT * from `bidding` where `productID` = $productID";
                                $bid_product_res = mysqli_query($con, $bid_product) or die(mysqli_error($con));
                                while ($notification = mysqli_fetch_array($bid_product_res)) {
                                    $productID = $notification['productID'];
    
                                    $product = "SELECT `name` from `products` where `productID` = $productID";
                                    $product_res = mysqli_query($con, $product) or die(mysqli_error($con));
                                    while ($bid_notification = mysqli_fetch_array($product_res)) {
                                        $product_name = $bid_notification['name'];
                        
                                    $display_block .="
                                    <h2>Auction for " . $product_name . " started</h2>
                                    <h4 class=\"mb-0\">The auction for your product $product_name just started. Stay tuned.</h4>
                                    <p class=\"mt-0 pl-3\">$notif_time</p>
                                    <br><hr> ";
                                    }
                                }
                            }
                        }
                    }
                    elseif ($type == '3') {
                        $get_notif = "SELECT * from `notification` where  where `type` = 3 order by `notif_time` desc";
                        $get_notif_res = mysqli_query($con, $get_notif);
                    
                        if ((mysqli_num_rows($get_notif_res) > 0)) {
                            //  $display_block = "<div id=\"notif-block\" class=\"notif mb-1 pl-1 has-text-left\">";
                    
                            while ($notification = mysqli_fetch_assoc($get_notif_res)) {
                                $notif_time = $notification['notif_time'];
                                $bidID = $notification['entityID'];

                            $bid_product = "SELECT * from `bidding` where `bidID` = $bidID";
                            $bid_product_res = mysqli_query($con, $bid_product) or die(mysqli_error($con));
                            while ($notification = mysqli_fetch_array($bid_product_res)) {
                                $productID = $notification['productID'];
                                $winnerID = $notification['userID'];

                                $winner_info = "SELECT CONCAT(fName, ' ', lName) AS name, profilePic FROM `client` WHERE `user_id`=$winnerID";  // Get information from user table
                                $winner_info_res = mysqli_fetch_array(mysqli_query($con, $user_info));
                                $winner = $winner_info_res['name'];


                                $win_quantity = $notification['bidQuantity'];
                                $win_price = $notification['bidPrice'];

                                $product = "SELECT `name` from `products` where `productID` = $productID";
                                $product_res = mysqli_query($con, $product) or die(mysqli_error($con));
                                while ($bid_notification = mysqli_fetch_array($product_res)) {
                                    $product_name = $bid_notification['name'];
                        
                                    $display_block .="
                                    <h2>Product removed.</h2>
                                    <h4 class=\"mb-0\">The product $product_name has been removed. To sell more, you have to add the product again.</h4>
                                    <p class=\"mt-0 pl-3\">$notif_time</p>
                                    <br><hr> ";
                                }
                            }
                            }
                        }
                    }
                    elseif ($type == '9') {
                        $get_notif = "SELECT * from `notification` where `type` = 9 order by `notif_time` desc";
                        $get_notif_res = mysqli_query($con, $get_notif);
                    
                        if ((mysqli_num_rows($get_notif_res) > 0)) {
                            //  $display_block = "<div id=\"notif-block\" class=\"notif mb-1 pl-1 has-text-left\">";
                    
                            while ($notification = mysqli_fetch_assoc($get_notif_res)) {
                                $notif_time = $notification['notif_time'];
                                $productID = $notification['entityID'];
                                $product = "SELECT `name` from `products` where `productID` = $productID";
                                $product_res = mysqli_query($con, $product) or die(mysqli_error($con));
        
                                while ($notification = mysqli_fetch_array($product_res)) {
                                    $product_name= $notification['name'];
                        
                                    $display_block .="
                                    <h2>Product removed.</h2>
                                    <h4 class=\"mb-0\">The product $product_name has been removed. To sell more, you have to add the product again.</h4>
                                    <p class=\"mt-0 pl-3\">$notif_time</p>
                                    <br><hr> ";
                                }
                            }
                        }
                    }
                   
                }
                //close up the table
                $display_block .= "</div>";
            }
            
        }//end loggedinseller
        
    }
    else {
        echo" <div id=\"popup2\" class=\"overlay\">
            <div class=\"popup has-text-centered\">
                <a class=\"close\" href=\"http://localhost/vegemart/public/login.php\">&times;</a>
                <p><em>Please login to view notifications.</em></p>
            </div>
        </div>";
    }

    print $display_block;
?>