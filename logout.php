<script>
/* Set Top header for Customer */
top.frames['header'].location.href = 'Navbar.php';
top.location.href = 'Navbar.php';
</script>
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
/* Set Top header for Customer */
top.frames['header'].location.href = 'Navbar.php';
top.location.href = 'Navbar.php';
</script>
