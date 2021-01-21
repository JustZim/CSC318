<?php
include "../connect.php";
$Name = $_POST['Name'];
$IC = $_POST['IC'];
$Contact = $_POST['Contact'];
$Email = $_POST['Email'];
$Address = $_POST['Address'];
$DOB = $_POST['DOB'];
$Gender = $_POST['Gender'];
$check = $_SESSION["userID"];



$sql="UPDATE customer SET Cust_IC='$IC',Cust_Name='$Name',Cust_Contact='$Contact',
Cust_Email='$Email',Cust_Address='$Address',Cust_DOB='$DOB',Cust_Gender='$Gender'
WHERE Cust_IC='$check'";
		
if(mysqli_query($connect,$sql))
	{
		$_SESSION["userID"] = $IC;
		print '<script> alert("Profile has been updated"); </script>';
		print '<script> window.location.assign("profile.php"); </script>';
	}
	else
	{
		print '<script> alert("Error"); </script>';
		print '<script> window.location.assign("editProfile.php"); </script>';
	}
	mysqli_close($connect); 
?>	
	
	
	
	