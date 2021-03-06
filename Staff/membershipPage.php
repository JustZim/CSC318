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

	.search { 
		position: relative;
		text-align:left;
		margin-left:11%;
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
		<h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>Membership List</center></h1>
		<div class="register">
			<input type='button' onclick='location.href="membershipRegister.php"' value='Add new Member'>
		</div> <!-- register div -->
		<div class="search">
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for ID.." title="Type in a name">
		</div> <!-- search div -->

		<center>
			<table id="membership" class="myTable">
				<tr>
				<th style="border-radius: 20px 0px 0px 0px">Member ID</th>
				<th>Customer IC</th>
				<th>Name</th>
				<th>Package</th>
				<th>Status</th>
                <th>Expire Date</th>
				<th style="border-radius: 0px 20px 0px 0px">     </th>
				</tr>

				<center>
					<?php
					include "../connect.php";
					$sql = "SELECT * FROM membership
					LEFT JOIN customer ON membership.Customer_IC = customer.Cust_IC";
					$result = mysqli_query($connect,$sql);
					if(mysqli_num_rows($result) > 0) 
					{
					foreach($result as $row) { 
					$mID = $row['Member_ID'];
					$mPack = $row['Member_Package'];
					$mStat = $row['Member_Status'];
                    $cIC = $row['Customer_IC'];
					$expDate = $row['Member_ExpDate'];
					$cName = $row['Cust_Name'];
	
					echo"<tr style='color:white; text-shadow: 4px 4px 6px black ;'>";
					echo"<td>$mID</td>";
					echo"<td>$cIC</td>";
					echo"<td>$cName</td>";
					echo"<td>$mPack</td>";
                    echo"<td>$mStat</td>";
                    echo"<td>$expDate</td>";

					echo"<td><input type='button' onclick='location.href=\"membershipEdit.php?id=$mID\"' value='Edit'>";
					echo"<input type='button' onclick='delFunction(\"$mID\")' value='Delete'></td>";
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
    
    function delFunction(mID) {
		var r = confirm("Are you sure you want to delete this data?");
		if(r == true) { 
			location.href="membershipDelete.php?id=" + mID;
		}
	}

	function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("membership");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>