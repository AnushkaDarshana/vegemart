<?php
    include ('../../config/dbconfig.php');
    include ('../session.php');
    
          
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
    else{
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } 
        else {
        $message = base64_encode(urlencode("Sorry, there was an error uploading your file."));
        header('Location:../../public/seller/seller_product_edit.php?msg=' . $message);
        exit();
        }
    }
        
    
   
    if(isset($_POST["submit"])){
        $productID= $_POST['editProductID'];
       // echo"$productID";
        $newName = $_POST['editProductName'];
        $imageName = $_FILES["fileToUpload"]["name"];
        $imageData = $_FILES["fileToUpload"]["tmp_name"];
        $imageType = $_FILES["fileToUpload"]["type"];
        $newAddress1 = $_POST['editAddress1'];
        $newAddress2 = $_POST['editAddress2'];
        $newCity = $_POST['editCity'];
         
        if($imageName==""){
                $updateQuery= "UPDATE `products` SET `name` = '".$newName."', `address1` = '".$newAddress1."', `address2` = '".$newAddress2."', `city` = '".$newCity."' WHERE `productID` = '".$productID."' ";   
        }
        else{
                $updateQuery= "UPDATE `products` SET `name` = '".$newName."',`imageName` = '".$imageName."' , `address1` = '".$newAddress1."', `address2` = '".$newAddress2."', `city` = '".$newCity."' WHERE `productID` = '".$productID."' ";   
        } 

        if (mysqli_query($con,$updateQuery) === TRUE) {
            $message = base64_encode(urlencode("Successfully Edited!"));
            header('Location:../../public/seller/seller_home.php?msg='.$message);
            exit();
        }  
        else {
            $message = base64_encode(urlencode("SQL Error while Registering"));
            header('Location:../../public/seller/seller_product_edit.php?msg=' . $message);
            exit();
        }
        
    }
    
    
    mysqli_close($con);
?>