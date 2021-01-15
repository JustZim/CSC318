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
		width: 60%;
		display: table;
		border: 15px solid #FFB450;
		margin-left: auto;
		margin-right: auto;
		background: rgba(240, 240, 240, 0.7); 
		border-radius: 15px;
		word-wrap: break-word;
	}
	
	.left-col {
	  background-color: #f2f2f2;
	  display: table-cell;
	  padding: 15px;
	  width: 25%;
	  margin-top: 6px;
	}

	.right-col {
	  background: #ebe6e6;
	  display: table-cell;
	  padding: 30px;
	  width: auto;
	  margin-top: 6px;
	  vertical-align:top;
	}

	/* Clear floats after the columns */
	.row:after {
	  content: "";
	  display: table;
	  clear: both;
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
	$result = mysqli_query($connect, $sql);
	$data = mysqli_fetch_assoc($result);
	
	
	$member = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM MEMBERSHIP WHERE Customer_IC = '$cust_ic'"));
	
 ?>
	<!-- Background Image -->
	<div class="bg-image"><br><br>
		<h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>MY PROFILE</center></h1>
		
	<!-- Profile -->
	<div class="box">
		<div class="row">
            <div class="left-col">
			<image class="logo" src="../assets/images/user.png" width="200" alt="profile">
			</div>
			
			 <div class="right-col">
			<?php
			
				echo "<h2> PROFILE</h2>"; 
				echo "<h3> Name	: ".$data["Cust_Name"]." </h3>"; 
				echo "<h3> IC No	: ".$data["Cust_IC"]." </h3>"; 
				echo "<h3> Contact No	: ".$data["Cust_Contact"]." </h3>"; 
				echo "<h3> E-mail	: ".$data["Cust_Email"]." </h3>";
				echo "<h3> Address	: ".$data["Cust_Address"]." </h3>"; 
				echo "<h3> Birthdate	: ".$data["Cust_DOB"]." </h3>"; 
				echo "<h3> Gender	: ".$data["Cust_Gender"]." </h3>"; 
				
				echo "<h2> MEMBERSHIP </h2>"; 
				echo "<h3> Member ID	: ".$member["Member_ID"]." </h3>"; 
				echo "<h3> Membership Package	: ".$member["Member_Package"]." </h3>"; 
				echo "<h3> Membership Status	: ".$member["Customer_IC"]." </h3>"; 
				echo "<h3> Membership Expiration Date	: ".$member["Member_ExpDate"]." </h3>";
			
			?>
			<br><br>
			<div style="text-align: right;">
				<input type='button' class="btn" onclick='location.href="changePass.php"' value='Change Password'>
				<input type='button' class="btn" onclick='location.href="editProfile.php"' value='Edit Profile'>
			</div>
			</div>

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