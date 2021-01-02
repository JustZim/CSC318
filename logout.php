
<?php 
include "connect.php";
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header('location: login.php');
exit();
?>


<script>
	function reloadNavbar() 
	{
		top.frames['header'].location.href = 'Navbar.php';
	}
	reloadNavbar();
</script>

