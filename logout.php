<script>
/* Set Top header for Customer */
top.frames['header'].location.href = 'Navbar.html';
top.location.href = 'Navbar.html';
</script>
<?php 
include "connect.php";
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
$_SESSION["rank"] = 0;
header('location: login.php');
exit();
?>

<script>
/* Set Top header for Customer */
top.frames['header'].location.href = 'Navbar.html';
top.location.href = 'Navbar.html';
</script>
