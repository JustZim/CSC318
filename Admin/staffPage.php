<?php session_start(); ?>
<style>

	/* Local Font */
	@font-face {
		font-family: "Barlow";
		src: url("assets/font/BarlowCondensed-Bold.ttf");
	}
	
	@font-face {
		font-family: "HammersmithOne";
		src: url("assets/font/HammersmithOne-Regular.ttf");
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
		<h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>Staff Menu</center></h1>
		<div class="register">
			<input type='button' onclick='location.href=\"staffedit.php?id=$ID\"' value='Add new Staff'>
		</div> <!-- register div -->

		<center>
			<table class="myTable">
				<tr>
				<th style="border-radius: 20px 0px 0px 0px">Staff ID</th>
				<th>Staff Name</th>
				<th>Staff Address</th>
				<th>Staff Email</th>
				<th>Staff Contact</th>
				<th>Staff Position</th>
				<th style="border-radius: 0px 20px 0px 0px">     </th>
				</tr>

				<center>
					<tr style="color:white; text-shadow: 4px 4px 6px black ;">
					<td>S01</td>
					<td>Muizzuddin Bin Muzaini </td>
					<td>No 3 Jln Geliga 1 Tmn Daiman Jaya 81900 Kota Tinggi Johor</td>
					<td>muizzuddin@yahoo.com</td>
					<td>011-11111111</td>
					<td>Administrator</td>
					<td><input type='button' onclick='location.href=\"staffedit.php?id=$ID\"' value='Edit'>
					<input type='button' onclick='location.href=\"staffedit.php?id=$ID\"' value='Delete'></td>
					</tr>
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