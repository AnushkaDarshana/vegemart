<?php    
    
    include ('../../config/dbconfig.php');
    include ('../session.php');

    if(isset($productID))
             
    $target_dir = "../../public/images/products/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
              
    // if everything is ok, try to upload file
    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } 
        else {
            $message = base64_encode(urlencode("Sorry, there was an error uploading your file."));
            header('Location:../../public/seller/seller_product_add.php?msg=' . $message);
            exit();
            }
    }
          
    //Uploading to Database
    if (isset($_POST['submit'])){
        $imageName = $_FILES["fileToUpload"]["name"];
        $imageData = $_FILES["fileToUpload"]["tmp_name"];
        $imageType = $_FILES["fileToUpload"]["type"];
        $productName = $_POST['productName'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $city = $_POST['city'];
        $description = $_POST['description'];
        $sellerID = $_SESSION["loggedInSellerID"];  
        $expirationDateQuery = "SELECT DATE_ADD(NOW(),INTERVAL 5 DAY) AS DateAdd;";
        $expirationDateResult = mysqli_query($con,$expirationDateQuery); 
        $rowExpirationDate = mysqli_fetch_assoc($expirationDateResult);
        $expirationDate = $rowExpirationDate['DateAdd'];
        
              
        $insertProduct = "INSERT INTO `products` (`sellerID`,`name`,`imageName`,`address1`,`address2`,`city`,`description`,`expireDate`) VALUES ('".$sellerID."','".$productName."','".$imageName."','".$address1."','".$address2."','".$city."','".$description."','".$expirationDate."');";
           // $advertise =  "INSERT INTO `advertisements` (`adID`,`productID`) VALUES ('".$adID."','".$productID."');";      
        if (mysqli_query($con, $insertProduct)) {  
            
            $maxquery = mysqli_query($con,"SELECT MAX(productID) FROM `products`");
            $row = mysqli_fetch_row($maxquery);
            $maxId = $row[0];

            header("Location:../../public/seller/seller_product_quantityset.php?id=". $maxId);
            exit();
        }
        
        
        else{                           
            $message = base64_encode(urlencode("SQL Error while Adding products"));
            header('Location:../../public/seller/seller_product_add.php?msg=' . $message);
            exit();
        } 
    }
    mysqli_close($con);
?>

