<?php
include "../connect.php";
$newPass = $_POST['newpass'];
$conPass = $_POST['confirmpass'];
$currentPass = $_POST['currentpass'];
$ID = $_SESSION['userID'];

    $sql = "SELECT * FROM staff WHERE Staff_ID='$ID'";
	$result = mysqli_query($connect, $sql);
	$data = mysqli_fetch_assoc($result);
	
	$checkPass = $data["Staff_Password"];
	
if($currentPass == $checkPass){
	if($newPass == $conPass){
	$update="UPDATE staff SET Staff_Password='$newPass' WHERE Staff_ID='$ID'";
	$exec = mysqli_query($connect,$update);
			
		if($exec){
			print '<script> alert("Password has been changed!"); </script>';
			print '<script> window.location.assign("profileStaff.php"); </script>';
		}
		else{
			print '<script> alert("Error"); </script>';
			print '<script> window.location.assign("changepassStaff.php"); </script>';
		}
	}		
	else{
		print '<script> alert("New Password Does Not Match!"); </script>';
		print '<script> window.location.assign("changepassStaff.php"); </script>';
	}			
}
else{
	print '<script> alert("Wrong Password!"); </script>';
	print '<script> window.location.assign("changepassStaff.php"); </script>';
}	
mysqli_close($connect);
?>	
	
	
	
	