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
		margin-left: 200px;
	}

	.myTable { 
		table-layout:fixed ;
		width: 80% ;
		background: rgba(240, 240, 240, 0.3); 
		border-radius: 20px 20px 0px 0px;
		font-family: Verdana, sans-serif;
		font-size: 15px;
		color:black;
		text-align: center;
	}
	
	.myTable th { 
		font-family: Verdana, sans-serif;text-shadow: 1px 1px 4px black;
		font-size: 20px;
		height: 30px;
		letter-spacing:0.05em;
		background-color:#FFB450;
		color:white;
		text-align: center;
	}
	
	.myTable td, .myTable th { 
		padding:5px;
		border:1px solid #BDB76B; 
		overflow-wrap: break-word;
		word-wrap: break-word;
		text-align: center;
	}

	.register { 
		position: relative;
		margin-top: 2%;
		margin-bottom: 10px;
	}

</style>

<!DOCTYPE html>
<html>
<body>
<?php 		
	include "../sideNav.php";
?>
	<!-- Background Image -->
	<div class="bg-image"><br><br>
		<h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>Staff List</center></h1>
		<div class="register">
		<center><label style="color:white; font-family: Verdana; font-size: 15px;">Staff Count:</label><input type="text" id="fname" name="fname" value=3></center>
		<br><br>
		</div> <!-- register div -->

		<center>
			<table class="myTable">
				<tr>
				<th style="border-radius: 20px 0px 0px 0px">Staff ID</th>
				<th>Staff Name</th>
				<th>Staff Contact</th>
				<th>Staff Address</th>
				<th>Staff Email</th>
				<th style="border-radius: 0px 20px 0px 0px">Staff Position</th>
				</tr>

				<center>
					<?php
					include "../connect.php";
					$sql = "select * from staff";
					$result = mysqli_query($connect,$sql);
					if(mysqli_num_rows($result) > 0) 
					{
						foreach($result as $row) { 
							$sID = $row['Staff_ID'];
							$sName = $row['Staff_Name'];
							$sContact = $row['Staff_Contact'];
							$sAddress = $row['Staff_Address'];
							$sEmail = $row['Staff_Email'];
							$sPos = $row['Staff_Position'];
							
							echo"<tr style='color:white; text-shadow: 4px 4px 6px black ;'>";
							echo"<td>$sID</td>";
							echo"<td>$sName</td>";
							echo"<td>$sContact</td>";
							echo"<td>$sAddress</td>";
							echo"<td>$sEmail</td>";
							echo"<td>$sPos</td>";
					
							echo"</tr>";
						}
					}
					//echo $_SESSION['userID'];
					mysqli_close($connect);
					?>
				</center>
			</table>
		</center>

	</div> <!-- Image div -->
</body> <!-- End of body -->
</html> <!-- End of html -->

<script>
	function reloadNavbar() 
	{
		top.frames['header'].location.href = '../Navbar.php';
	}
	reloadNavbar();

	function delFunction(sID) {
        var r = confirm("Are you sure you want to remove this user ?");
        if(r == true) { 
            location.href="staffDelete.php?id=" + sID;
        }
    }
</script>