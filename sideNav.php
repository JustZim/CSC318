<!DOCTYPE html>
<html>
	<style>
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
					echo "<a href='staffPage.php'>Staff</a>";
				}	
				echo "<a href='#services'>Customer</a>";
				echo "<a href='#clients'>Trainer</a>";
				echo "<a href='#contact'>Store/Product</a>";
			?>
		</div>
	</body> 	
</html>