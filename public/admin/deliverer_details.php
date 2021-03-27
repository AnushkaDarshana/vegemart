<?php include('../../config/dbconfig.php'); ?>
<?php
    session_start();
?> 
<?php 

	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$fName = $_POST['fName'];
		$lName = $_POST['lName'];
        $email = $_POST['email'];
		$phoneNum = $_POST['phoneNum'];
        $vehicle = $_POST['vehicle'];
        $vehicleNo = $_POST['vehicleNo'];
		$address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
		$city = $_POST['city'];
        $active_status = $_POST['active_status'];
    
        $sql1 ="UPDATE deliverer SET  fName='$fName', lName='$lName', phoneNum='$phoneNum',vehicle='$vehicle', vehicleNo='$vehicleNo', address1='$address1',address2='$address2',city='$city' WHERE delivererID='$id'";
        $sql2 = "UPDATE users SET email ='$email', active_status ='$active_status'  WHERE id='$id' ";
		$result1 = mysqli_query($con, $sql1);
		$result2 = mysqli_query($con, $sql2);
        if ($result1 == true && $result2 == true ){ 
		    header('location:deliverer_view.php');
        }
        
	} 

	if (isset($_POST['delete'])) {
		$id = $_POST['id'];
        $active_status = $_POST['active_status'];

    $sql3 = "UPDATE users SET active_status =0  WHERE id='$id' ";
    $result3 = mysqli_query($con, $sql3);
    if ($result3 == true ){ 
        header('location:deliverer_view.php');
    }
}
?>