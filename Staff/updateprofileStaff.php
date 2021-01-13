<?php
include "../connect.php";
$id = $_POST['sID'];
$name = $_POST['sName'];
$contact = $_POST['sContact'];
$address = $_POST['sAddress'];
$email = $_POST['sEmail'];
$pos = $_POST['sPos'];




$sql="UPDATE staff SET Staff_ID='$id',Staff_Name='$name',Staff_Contact='$contact',
Staff_Address='$address',Staff_Email='$email',Staff_Position='$pos' WHERE Staff_ID='$id'";
		
if(mysqli_query($connect,$sql))
	{
		$_SESSION["userID"] = $id;
		print '<script> alert("Profile has been updated"); </script>';
		print '<script> window.location.assign("profileStaff.php"); </script>';
	}
	else
	{
		print '<script> alert("Error"); </script>';
		print '<script> window.location.assign("editprofileStaff.php"); </script>';
	}
	mysqli_close($connect);
?>	
	
	
	
	