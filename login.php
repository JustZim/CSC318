<?php
  include "connect.php";
?>

<style>

/* Local Font */
@font-face {
font-family: "Barlow";
src: url("assets/font/BarlowCondensed-Bold.ttf");
}


* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}


/* Background Image */
.bg-image {
background-image: url("assets/images/bg2.png");
background-color: #cccccc;
height: 892px;
background-position: center;
background-repeat: no-repeat;
background-size: cover;
position: relative;
}


/* Hide Scrollbar */
::-webkit-scrollbar {
display: none;
}

h4{
  font-family: "Barlow";
  font-size: 20px;
}

/* Form */

form {border: 3px solid #f1f1f1;}


input[type=text], input[type=password] {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 10px;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

div#box {
  border    : 5px solid lightgrey;
  padding   : 70px 25px;
  width     : 500px;
}

button {
  background-color: #2c3973;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

<!--.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}-->

img.avatar {
  width: 50%;
  border-radius: 0%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

label{
  color:white;
  font-size: 18px;
  font-family: Verdana, sans-serif;
}

button{
  font-size: 18px;
  font-family: Verdana, sans-serif;
}

input{
  font-family: Verdana, sans-serif;
  background: rgba(255, 255, 255, 0.6);
  color:black;
  border-radius: 5px;
}

/* End of form */

</style>
<!DOCTYPE html>
<html>
  <body>
    <!-- Background Image -->
    <div class="bg-image"><br>

      <h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>Login</center></h1>
      <div class="desc" style="margin: 0px 200px">
      </div>

      <center>
        <div id = 'box' style="background: rgba(240, 240, 240, 0.3); border-radius: 20px">
          <form action="login2.php" method="post" style="border-radius: 20px;">
            <div class="imgcontainer">
              <img src="assets/images/user.png" alt="Avatar" class="avatar">
            </div>
            <div class="container">
              <table width = '130%'>
                <tr>
                  <td align = 'right'>
                    <label for="uname"><b>User ID</b></label>
                  </td>
                  <td>
                    <input type="text" placeholder="Enter ID" name="sID" required>
                  </td>
                </tr>
                <tr>
                  <td align = 'right'>
                    <label for="psw"><b>Password</b></label>
                  </td>
                  <td>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                  </td>
                </tr>   
              </table>
              <button type="submit" style="border-radius: 20px;">Login</button>
              <font color = "red"> 
              <?php
								if(isset($_SESSION["error"])){
									echo $_SESSION["error"];
							  }?>
              </font><br> 
              <label><input type="checkbox" value="lsRememberMe" id="rememberMe"> <label for="rememberMe">Remember me</label>
          </form>
        </div> <!-- div box -->
      </center>

    </div> <!-- div Image -->
  </body> <!-- End of body -->
</html> <!-- End of html -->

<script>
	function reloadNavbar() 
	{
		top.frames['header'].location.href = 'Navbar.php';
	}
	reloadNavbar();
</script>

<?php 
if(isset($_SESSION["error"])){
	unset ($_SESSION["error"]);
}?>