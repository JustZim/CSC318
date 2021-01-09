<?php
include "../connect.php";
$newPass = $_POST['newpass'];
$conPass = $_POST['confirmpass'];
$currentPass = $_POST['currentpass'];
$ID = $_SESSION['userID'];

    $sql = "SELECT * FROM CUSTOMER WHERE Cust_IC='$ID'";
	$result = mysqli_query($connect, $sql);
	$data = mysqli_fetch_assoc($result);
	
	$checkPass = $data["Cust_Password"];
	
if($currentPass == $checkPass){
	if($newPass == $conPass){
	$update="UPDATE customer SET Cust_Password='$newPass' WHERE Cust_IC='$ID'";
	$exec = mysqli_query($connect,$update);
			
		if($exec){
			print '<script> alert("Password has been changed!"); </script>';
			print '<script> window.location.assign("profile.php"); </script>';
		}
		else{
			print '<script> alert("Error"); </script>';
			print '<script> window.location.assign("changePass.php"); </script>';
		}
	}		
	else{
		print '<script> alert("New Password Does Not Match!"); </script>';
		print '<script> window.location.assign("changePass.php"); </script>';
	}			
}
else{
	print '<script> alert("Wrong Password!"); </script>';
	print '<script> window.location.assign("changePass.php"); </script>';
}	
mysqli_close($connect);
?>	
	
	
	
	