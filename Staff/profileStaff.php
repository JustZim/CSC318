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
	
	$staff_id = $_SESSION["userID"];
	$sql = "SELECT * FROM STAFF WHERE Staff_ID = '$staff_id'";
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
		
			echo "<h3> Staff ID	: ".$data["Staff_ID"]." </h3>"; 
			echo "<h3> Name	: ".$data["Staff_Name"]." </h3>"; 
			echo "<h3> Contact No	: ".$data["Staff_Contact"]." </h3>"; 
			echo "<h3> Address	: ".$data["Staff_Address"]." </h3>";
			echo "<h3> E-mail	: ".$data["Staff_Email"]." </h3>"; 
			echo "<h3> Position	: ".$data["Staff_Position"]." </h3>";  
		
		?>
		</div>
		<br>
		<div style="text-align: right;">
			<input type='button' class="btn" onclick='location.href="changepassStaff.php"' value='Change Password'>
			<input type='button' class="btn" onclick='location.href="editprofileStaff.php"' value='Edit Profile'>
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