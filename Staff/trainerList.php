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
		background: rgba(240, 240, 240, 0.8); 
		border-radius: 20px 20px 0px 0px;
		font-family: Verdana, sans-serif;
		font-size: 15px;
		color:white;
		text-align: center;
	}
	
	.myTable th { 
		font-family: Verdana, sans-serif;
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
		color:black;
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
	include "../connect.php";
	$sql = "SELECT * from trainer 
	LEFT JOIN staff ON trainer.Staff_ID = staff.Staff_ID 
	LEFT JOIN package ON trainer.Trainer_Package = package.Pack_ID";
	$result = mysqli_query($connect,$sql);

	$num = mysqli_num_rows($result);
?>
	<!-- Background Image -->
	<div class="bg-image"><br><br>
		<h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>Trainer List</center></h1>


		<center>
		<input name="startDate" name="endDate" type="button" value="Print" onclick ="printContent('print1')"></p>
		</center>
		<center><label style="color:white; font-family: Verdana; font-size: 15px;">Staff Count:</label><input disabled type="text" id="fname" name="fname" value='<?php echo $num; ?>'></center>
		<br>

		<center id="print1">
			<table class="myTable">
				<tr>
				<th style="border-radius: 20px 0px 0px 0px">Trainer ID</th>
				<th>Staf ID</th>
				<th>Trainer Name</th>
				<th>Trainer Package</th>
				<th style="border-radius: 0px 20px 0px 0px">Package Details</th>				
				    
				</tr>

				<center>
				<?php
					if(mysqli_num_rows($result) > 0) 
					{
						foreach($result as $row) { 
							$tID = $row['Trainer_ID'];
							$tDetail = $row['Pack_Name'];
							$tPackage = $row['Trainer_Package'];
							$sID = $row['Staff_ID'];
							$tName = $row['Staff_Name'];
							echo "<tr style='color:white;'>";
							echo "<td>$tID</td>";
							echo "<td>$sID </td>";
							echo "<td>$tName</td>";
							echo "<td>$tPackage</td>";
							echo "<td>$tDetail</td>";
							
							//echo "<input type='button' onclick='location.href=\"trainerDelete.php?id=$tID\"' value='Delete?'></td>";
							echo "</tr>";
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

	function delFunction(tID) {
		var r = confirm("Are you sure you want to delete this data?");
		if(r == true) { 
			location.href="trainerDelete.php?id=" + tID;
		}
	}

	function printContent(el) {
		var restore = document.body.innerHTML;
		var printcontent = document.getElementById(el).innerHTML;
		document.body.innerHTML = printcontent;
		window.print();
		document.body.innerHTML = restore;
	}
</script>