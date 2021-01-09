<?php

include "connect.php";
  
if(isset($_POST['sID'])) 
{
	$uname = $_POST['sID'];
	$pass = $_POST['psw'];

	$sql = "select * from STAFF where STAFF_ID = '".$uname."' AND STAFF_PASSWORD = '".$pass."' limit 1"; 
	$result = mysqli_query($connect,$sql);
	
	$row = mysqli_fetch_assoc($result);
	$pos = $row['Staff_Position'];
	echo $pos;
 
	if(mysqli_num_rows($result) == 1) 
	{
		if($pos == "Administrator") 
		{
			header('Location: Admin/mainAdmin.php');
			$_SESSION["username"] = $row['Staff_Name'];
			$_SESSION["rank"] = 1;
		}

		elseif($pos == "Staff") 
		{
			header('Location: Staff/mainStaff.php');
			$_SESSION["username"] = $row['Staff_Name'];
			$_SESSION["rank"] = 2;
		}
		$unameUP = strtoupper($uname);
		$_SESSION["userID"] = $unameUP;
		exit();
	}

	/* CUSTOMER */
	elseif(mysqli_num_rows($result) == 0)
	{
		$sql = "select * from CUSTOMER where Cust_IC = '".$uname."' AND Cust_Password = '".$pass."' limit 1"; 
		$result = mysqli_query($connect,$sql);

		$row = mysqli_fetch_assoc($result);

		if(mysqli_num_rows($result) == 1) 
		{
			header('Location: Customer/mainCustomer.php');
			$_SESSION["username"] = $row['Cust_Name'];
			$_SESSION["userID"] = $uname;
			$_SESSION["rank"] = 3;
			exit();
		}

		else 
		{
			$_SESSION["error"] = "Invalid Login";
			header('location: login.php');
			exit();
		}
		$unameUP = strtoupper($uname);
		$_SESSION["userID"] = $unameUP;
	} 

	else 
	{
		$_SESSION["error"] = "Invalid Login";
		header('location: login.php');
		exit();
	}
}

?>
