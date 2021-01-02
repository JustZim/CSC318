<!DOCTYPE html>
<style>

/* Local Font */
@font-face {
font-family: "HammersmithOne";
src: url("assets/font/HammersmithOne-Regular.ttf");
}

/* Navigation Bar Style */
body {
  margin: 0;
  background: #222;
  font-family: "HammersmithOne";
  font-weight: 600;
}

.container-nav {
  width: 80%;
  margin: 0 auto;
}

header {
  background: #202020;
}

header::after {
  content: '';
  display: table;
  clear: both;
}

.logo {
  float: left;
  padding: 12px 0;
}

.logo2 {
  float: left;
  padding: 0px 10px;
}

nav {
  float: right;
}

nav ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

nav li {
  display: inline-block;
  margin-left: 70px;
  padding-top: 23px;
  position: relative;
}

nav a {
  color: #6b6b6b;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 14px;
}

nav a:hover {
  color: #ffffff;
}

nav a::before {
  content: '';
  display: block;
  height: 5px;
  background-color: #6b6b6b;
  position: absolute;
  top: 0;
  width: 0%;
  transition: all ease-in-out 200ms;
}

nav a:hover::before {
  width: 100%;
}
/* End of Navigation Bar Style */

/* Hide Scrollbar */
::-webkit-scrollbar {
display: none;
}
/* Hide Scrollbar */

</style>

<html>
<head>
	<div class="container-nav">
		<a href="main.html" target="contents"><img class="logo" src="assets/images/icon.png" width="50" alt=""></a>
		<a href="main.html" target="contents"><img class="logo2" src="assets/images/icon2.png" width="150" alt=""></a>
		<nav>
			<ul>
			<?php
			include "connect.php";

				if($_SESSION['rank'] == 0) {
					echo "<li><a href='main.html' target='contents'>Home</a></li>";
					echo "<li><a href='aboutUs.html' target='contents'>About Us</a></li>";
					echo "<li><a href='login.php' target='contents'>Login</a></li>";
				}
				
				elseif($_SESSION['rank'] == 1) {
					echo "<li><a href='Admin/mainAdmin.php' target='contents'>Menu</a></li>";
					echo "<li><a href='aboutUs.html' target='contents'>About Us</a></li>";
					echo "<li><a href='logout.php' target='contents'>Logout</a></li>";
					echo '<li><a style="color:white;">Hello '.($_SESSION["username"]).' </a></li> ';
				}
				
				elseif($_SESSION['rank'] == 2) {
					echo "<li><a href='mainStaff.php' target='contents'>Menu</a></li>";
					echo "<li><a href='aboutUs.html' target='contents'>About Us</a></li>";
					echo "<li><a href='logout.php' target='contents' onclick='reloadNavbar();'>Logout</a></li>";
					echo '<li><a style="color:white;">Hello '.($_SESSION["username"]).' </a></li> ';
				}
				
				elseif($_SESSION['rank'] == 3) {
					echo "<li><a href='Customer/mainCustomer.php' target='contents'>Menu</a></li>";
					echo "<li><a href='aboutUs.html' target='contents'>About Us</a></li>";
					echo "<li><a href='logout.php' target='contents' onclick='reloadNavbar();'>Logout</a></li>";
					echo '<li><a style="color:white;">Hello '.($_SESSION["username"]).' </a></li> ';
				}
					
			?>
			</ul>
		</nav>
	</div>
</head>
</html>

<!--<script>
	function reloadNavbar() 
	{
		top.frames['header'].location.href = 'Navbar.php';
	}
	
	reloadNavbar();
</script>-->