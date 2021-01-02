<?php session_start(); ?>
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
  <a href="mainAdmin.php" target="contents"><img class="logo" src="assets/images/icon.png" width="50" alt=""></a>
	<a href="mainAdmin.php" target="contents"><img class="logo2" src="assets/images/icon2.png" width="150" alt=""></a>
  <nav>
    <ul>
      <li><a href="mainAdmin.php" target="contents">Menu</a></li>
      <li><a href="logout.php" target="contents" onclick="return myFunction();">Logout</a></li>
      <?php
        echo '<li><a style="color:white;">Hello '.($_SESSION["username"]).' </a><li> ';
      ?>
    </ul>
  </nav>
</div>
</head>
</html>

<script>
function myFunction() 
{
  top.frames['header'].location.href = 'Navbar.html';
}
</script>