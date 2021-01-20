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
		margin-left: 11%;
		margin-bottom: 10px;
	}

</style>

<!DOCTYPE html>
<html>

<script>
	function delFunction(cID) {
		var r = confirm("Are you sure you want to delete this data?");
		if(r == true) { 
			location.href="coachingDelete.php?id=" + cID;
		}
	}
</script>
<body>

	<!-- Background Image -->
	<div class="bg-image"><br><br>
		<h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>Coaching Booking</center></h1>
	

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
                    $sesID = $_SESSION['userID'];
					include "../connect.php";
					$sql = "SELECT * FROM customer
                    LEFT JOIN membership ON customer.Cust_IC = membership.Customer_IC
                    RIGHT JOIN coaching ON member.Member_ID = coaching.Coach_ID
                    RIGHT JOIN traianer ON coaching.Traienr_ID = trainer.Trainer_ID
                    RIGHT JOIN staff ON trainer.Staff_ID = staff.staff_ID
                    WHERE customer.Cust_IC = $sesID";
					$result = mysqli_query($connect,$sql);
					if(mysqli_num_rows($result) > 0) 
					{
                        foreach($result as $row) { 
                            $cID = $row['Coach_ID'];
                            $tID = $row['Staff_Name'];
                            $mID = $row['Pack_ID'];
            
                            echo"<tr style='color:white; text-shadow: 4px 4px 6px black ;'>";
                            echo"<td>$cID</td>";
                            echo"<td>$tID</td>";
                            echo"<td>$mID</td>";
                            echo"<td>$pID</td>";
                            echo"<td>$cTR</td>";

                            echo" ";
                            echo"</tr>";
                        }
                    echo mysqli_error($connect);
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