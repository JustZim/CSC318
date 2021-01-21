<?php 
	session_start(); 
	$sesID = $_SESSION['userID'];
	include "../connect.php";
	$check = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM membership WHERE Customer_IC = '$sesID'"));
	$MEMID = $check['Member_ID'];
?>
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
		height: 1200px;
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

	.myTable { 
		table-layout:fixed ;
		width: 60% ;
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
		margin-bottom: 2%;
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

	<!-- Background Image -->
	<div class="bg-image"><br><br>
		<h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>Coaching Booking</center></h1>
		<div class="register">
		<center>
			<input type='button' class="btn" onclick='location.href="CustcoachingBook.php?id=<?php echo $MEMID; ?>"' value='Book Coaching Session'>
		</center>
		</div>
	

		<center>
			<table class="myTable">
				<tr>
				<th style="border-radius: 20px 0px 0px 0px">Coach ID</th>
				<th>Trainer Name</th>
				<th>Package ID</th>
				<th style="border-radius: 0px 20px 0px 0px">     </th>
				</tr>

				<center>
                    <?php
					//echo $MEMID;
					if(isset($MEMID)){
						
						$sql = "SELECT * FROM coaching 
						INNER JOIN trainer ON coaching.Trainer_ID = trainer.Trainer_ID
						LEFT JOIN staff ON trainer.Staff_ID = staff.Staff_ID
						LEFT JOIN package ON coaching.Pack_ID = package.Pack_ID
						WHERE coaching.Member_ID = '$MEMID'";
						$result = mysqli_query($connect,$sql);

						if(mysqli_num_rows($result) > 0) 
						{
							foreach($result as $row) { 
								$cID = $row['Coach_ID'];
								$sNme = $row['Staff_Name'];
								$pID = $row['Pack_ID'];
								$pNme = $row['Pack_Name'];
				
								echo"<tr style='color:white; text-shadow: 4px 4px 6px black ;'>";
								echo"<td>$cID</td>";
								echo"<td>$sNme</td>";
								echo"<td>$pID  -  $pNme</td>";

								echo"<td><input type='button' onclick='delFunction(\"$cID\")' value='Cancel'></td></td> ";
								echo"</tr>";
							}
						echo mysqli_error($connect);
						}

						else{
							echo"<tr>";
							echo"<td colspan='4'>You Have No Booking Registered!</td>";
							echo"</tr>";
						}
					}

						
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

	function delFunction(cID) {
		var r = confirm("Are you sure you want to Cancel this booking?");
		if(r == true) { 
			location.href="CustcoachingCancel.php?id=" + cID;
		}
	}
</script>