<!DOCTYPE html>
<html>
	<style>

		@font-face {
   		    font-family: "HammersmithOne";
  		    src: url("../assets/font/HammersmithOne-Regular.ttf");		 
 		}
		.sidenav {
			height: 100%;
			width: 200px;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #202020;
			overflow-x: hidden;
			padding-top: 20px;
		}

		.sidenav a {
			padding: 6px 8px 6px 16px;
			text-decoration: none;
			font-size: 25px;
			font-family: "HammersmithOne";
			color: #818181;
			display: block;
		}
		
		.sidenav a:hover {
			color: #f1f1f1;
		}

	</style>
	
	<body> 
		<div class="sidenav">
			<?php
				if($_SESSION['rank'] == '1') {
					echo "<a href='../admin/staffPage.php'>Staff</a>";
					echo "<a href='../admin/trainerPage.php'>Trainer</a>";
					echo "<a href='../admin/packagePage.php'>Package</a>";
				}	
				echo "<a href='../staff/customerPage.php'>Customer</a>";
				echo "<a href='../staff/membershipPage.php'>Membership</a>";
				echo "<a href='../staff/coachingPage.php'>Coaching</a>";
				echo "<a href='../staff/productPage.php'>Store/Product</a>";
			?>
		</div>
	</body> 	
</html>