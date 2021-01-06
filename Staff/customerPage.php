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
		margin-left: 11%;
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
		<h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>Customer List</center></h1>
		<div class="register">
			<input type='button' onclick='location.href="customerRegister.php"' value='Add new Customer'>
		</div> <!-- register div -->

		<center>
			<table class="myTable">
				<tr>
				<th style="border-radius: 20px 0px 0px 0px">IC Number</th>
				<th>Name</th>
				<th>Gender</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Address</th>
				<th>Date of birth</th>
				<th style="border-radius: 0px 20px 0px 0px">     </th>
				</tr>

				<center>
					<?php
					include "../connect.php";
					$sql = "select * from customer";
					$result = mysqli_query($connect,$sql);
					if(mysqli_num_rows($result) > 0) 
					{
					foreach($result as $row) { 
					$cIC = $row['Cust_IC'];
					$cName = $row['Cust_Name'];
					$cGender = $row['Cust_Gender'];
					$cContact = $row['Cust_Contact'];
					$cEmail = $row['Cust_Email'];
					$cAddress = $row['Cust_Address'];
					$cDOB = $row['Cust_DOB'];
	
					echo"<tr style='color:white; text-shadow: 4px 4px 6px black ;'>";
					echo"<td>$cIC</td>";
					echo"<td>$cName</td>";
					echo"<td>$cGender</td>";
					echo"<td>$cContact</td>";
					echo"<td>$cEmail</td>";
					echo"<td>$cAddress</td>";
					echo"<td>$cDOB</td>";

					echo"<td><input type='button' onclick='location.href=\"staffedit.php?id=$cIC\"' value='Edit'>";
					echo"<input type='button' onclick='location.href=\"staffedit.php?id=$cIC\"' value='Delete'></td>";
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
</script>