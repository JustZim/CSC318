<?php session_start(); ?>
<style>

	/* Local Font */
	@font-face {
		font-family: "Barlow";
		src: url("../assets/font/BarlowCondensed-Bold.ttf");
	}

	/* font */
	h4{
		font-family: "Barlow";
		font-size: 20px;
	}
	/* font */

	/* Background Image */
	.bg-image {
		background-image: url("../assets/images/bg2.png");
		background-color: #cccccc;
		height: 3000px;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		position: relative;
	}
	/* Background Image */

	/* Hide Scrollbar */
	::-webkit-scrollbar {
		display: none;
	}
	/* Hide Scrollbar */

	/* Content */
	.content {
		bottom: 0;
		background: rgba(0, 0, 0, 0);
		color: #f1f1f1;
		width: 98%;
		border-radius:30px 30px 0 0;
		justify-content: center;
		align-content: center;
		margin: 0px 20px;
	}
	/* Content */

	body {
		margin:0;
		
	}
	
	.box {
		width: 45%;
		border: 15px solid #FFB450;
		margin-left: auto;
		margin-right: auto;
		padding: 30px;
		background: rgba(240, 240, 240, 0.3); 
		border-radius: 15px;
		color:white;
		overflow-wrap: break-word;
		word-wrap: break-word;
		text-align: center;
	}
	
	.btn {
		background-color: #99aabb;
		color: white;
		padding: 12px 20px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}

	.btn:hover {
	background-color: #FFB450;
	}
	
</style>

<!DOCTYPE html>
<html>
<body>
<?php 		
	include "../connect.php";
	
	$cust_ic = $_SESSION["userID"];
	$sql = "SELECT * FROM CUSTOMER WHERE Cust_IC = '$cust_ic'";
	$result = $connect->query($sql);
	$data = $result->fetch_assoc();
	
 ?>
	<!-- Background Image -->
	<div class="bg-image"><br><br>
		<h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>MY PROFILE</center></h1>
		
	<!-- Profile -->
	<div class="box">
		<div style="display: inline-block; text-align: left;">
		<?php
		
			echo "<h3> Name	: ".$data["Cust_Name"]." </h3>"; 
			echo "<h3> IC No	: ".$data["Cust_IC"]." </h3>"; 
			echo "<h3> Contact No	: ".$data["Cust_Contact"]." </h3>"; 
			echo "<h3> E-mail	: ".$data["Cust_Email"]." </h3>";
			echo "<h3> Address	: ".$data["Cust_Address"]." </h3>"; 
			echo "<h3> Birthdate	: ".$data["Cust_DOB"]." </h3>"; 
			echo "<h3> Gender	: ".$data["Cust_Gender"]." </h3>"; 
		
		?>
		</div>
		<br>
		<div style="text-align: right;">
			<input type='button' class="btn" onclick='location.href="changePass.php"' value='Change Password'>
			<input type='button' class="btn" onclick='location.href="editProfile.php"' value='Edit Profile'>
		</div>
		
	</div><!-- box div -->
		
	</div> <!-- Image div -->
</body> <!-- End of body -->
</html> <!-- End of html -->

<script>
	function reloadNavbar() 
	{
		top.frames['header'].location.href = '../Navbar.php';
	}
	reloadNavbar();
</script>