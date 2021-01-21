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
?>
	<!-- Background Image -->
	<div class="bg-image"><br><br>
		<h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>Total Income</center></h1>
		
		<center>
		<input name="startDate" name="endDate" type="button" value="Print" onclick ="printContent('print1')"></p>
		</center>
		
		<br>

		<?php
			include "../connect.php";

			$qGold = "SELECT Member_Package FROM membership where Member_Package = 'Gold'";
			$result = mysqli_query($connect,$qGold);
			$rGold = mysqli_num_rows($result);
			$TotGold = $rGold * 999;

			$qSilver = "SELECT Member_Package FROM membership where Member_Package = 'Silver'";
			$result = mysqli_query($connect,$qSilver);
			$rSilver = mysqli_num_rows($result);
			$TotSilver = $rSilver * 750;

			$qBronze = "SELECT Member_Package FROM membership where Member_Package = 'Bronze'";
			$result = mysqli_query($connect,$qBronze);
			$rBronze = mysqli_num_rows($result);
			$TotBronze = $rBronze * 299;

			$Sum = $TotGold + $TotSilver + $TotBronze;


		echo "<center id='print1'>";
			echo "<table class='myTable'>";
			echo	"<tr>";
			echo	"<th style='border-radius: 20px 0px 0px 0px'>Package</th>";
			echo	"<th>Quantity</th>";
			echo	"<th>Price (RM)</th>";
			echo	"<th style='border-radius: 0px 20px 0px 0px'>Total Price (RM)</th>";
			echo	"</tr>";

			echo	"<tr style='color:white;'>";
			echo	"<td>Gold</td>";
			echo	"<td> $rGold </td>";
			echo	"<td> 999 </td>";
			echo	"<td> $TotGold</td>";
			echo	"</tr>";

			echo	"<tr style='color:white;'>";
			echo	"<td >Silver</td>";
			echo	"<td> $rSilver </td>";
			echo	"<td> 750 </td>";
			echo	"<td> $TotSilver</td>";
			echo	"</tr>";

			echo	"<tr style='color:white;'>";
			echo	"<td>Bronze</td>";
			echo	"<td> $rBronze </td>";
			echo	"<td> 299 </td>";
			echo	"<td> $TotBronze</td>";
			echo	"</tr>";

			echo	"<tr>";
			echo	"<th  colspan='3'>Total Income (RM)</th>";
			echo	"<th > $Sum</th>";
			echo	"</tr>";
		echo	"</table>";
	echo	"</center>";
	mysqli_close($connect);
?>

	</div> <!-- Image div -->
</body> <!-- End of body -->
</html> <!-- End of html -->

<script>
	function reloadNavbar() 
	{
		top.frames['header'].location.href = '../Navbar.php';
	}
    reloadNavbar();
    
    function delFunction(mID) {
		var r = confirm("Are you sure you want to delete this data?");
		if(r == true) { 
			location.href="membershipDelete.php?id=" + mID;
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