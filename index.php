<!DOCTYPE html>
<html>
	<head>
	  <!-- Title -->
	  <title>Indie Fitness Management</title>
	  <!-- Icon -->
	  <link rel="shortcut icon" href="assets/images/icon.png" type="image/x-icon">
	</head>
	<!-- Frame -->
	<frameset rows = "8%,92%" frameborder="no">
	<frame name = "header" src ="Navbar.php" > <!-- Navigation Bar -->
	<frame name = "contents" src ="main.html" > <!-- Contents -->
	</frameset>
</html>

<script>
	function reloadNavbar() 
	{
		top.frames['header'].location.href = 'Navbar.php';
	}
	reloadNavbar();
</script>