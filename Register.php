<?php
  include "connect.php";
?>
<style>

/* Local Font */
  @font-face {
    font-family: "Barlow";
    src: url("assets/font/BarlowCondensed-Bold.ttf");
  }

  /* font */
  h4{
    font-family: "Barlow";
    font-size: 20px;
  }
  /* font */

  /* Background Image */
  .bg-image {
    background-image: url("assets/images/bg2.png");
    background-color: #cccccc;
    height: 1000px;
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
   font-family: Verdana, sans-serif; margin:0
  }

  * {
  box-sizing: border-box;
}

input[type=text], select, textarea,input[type=password] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

input[type=date]{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
}


label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin:100px;
}

.btn {
  background-color: #99aabb;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.btn:hover {
  background-color: #FFB450;
}

.left-col {
  float: left;
  width: 18%;
  margin-top: 6px;
}

.right-col {
  float: left;
  width: 82%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .left-col, .right-col, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>

<!DOCTYPE html>
<html>
  <body>
    <!-- Background Image -->
    <div class="bg-image"><br><br>
      
	  <h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>Registration</center></h1>
      <div class="container">
        <form name="register" method="POST" action="registerNewCust.php">
          <div class="row">
            <div class="left-col">
              <label for="cName">Name: </label>
            </div>
            <div class="right-col">
              <input type="text"  name="cName" placeholder="Enter Your Name.." required>
            </div>
          </div>
		   <div class="row">
            <div class="left-col">
              <label for="cIC">IC: </label>
            </div>
            <div class="right-col">
              <input type="text"  name="cIC" placeholder="Enter Your IC.." required>
            </div>
          </div>
          <div class="row">
            <div class="left-col">
              <label for="cContact">Contact No: </label>
            </div>
            <div class="right-col">
              <input type="text" name="cContact" placeholder="Enter Your Phone Number.." required>
            </div>
          </div>
          <div class="row">
            <div class="left-col">
              <label for="cAddress">Address: </label>
            </div>
            <div class="right-col">
              <textarea name="cAddress" placeholder="Enter Your Address.." required style="height:100px"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="left-col">
              <label for="cEmail">E-mail: </label>
            </div>
            <div class="right-col">
              <input type="text" name="cEmail" placeholder="Enter Your E-mail.." required>
            </div>
          </div>
          <div class="row">
            <div class="left-col">
              <label for="cDOB">Date of Birth: </label>
            </div>
            <div class="right-col">
              <input type="date" name="cDOB" placeholder="Enter Your Date of Birth.." required>
            </div>
          </div>
          <div class="row">
            <div class="left-col">
              <label for="cGender" required>Gender: </label>
            </div>
            <div class="right-col">
              <select  name="cGender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>           
              </select>
            </div>
          </div>
		  <div class="row">
            <div class="left-col">
              <label>Enter Password :</label>
            </div>
            <div class="right-col">
              <input type="password" name="cpass" placeholder="Enter Password..." required />
            </div>
          </div>
		   <div class="row">
            <div class="left-col">
              <label>Confirm Password :</label>
            </div>
            <div class="right-col">
              <input type="password" name="confirmpass" placeholder="Confirm Password..." required />
            </div>
          </div>
		  <br>
          <div class="row">
		  <center>
            <input type="submit" class="btn" value="Submit">
			 <input type="button" class="btn" onclick="history.back();" value='Cancel'>
			</center>
          </div>
        </form>
		 <center> 
		 <?php
          if(isset($_SESSION["status"])){
            echo $_SESSION["status"];
        }?> 
		</center> 
    </div> <!-- Image div -->
  </body> <!-- End of body -->
</html> <!-- End of html -->
<?php 
if(isset($_SESSION["status"])){
  unset ($_SESSION["status"]);
}?>
<script>
  function reloadNavbar() 
  {
    top.frames['header'].location.href = 'Navbar.php';
  }
  reloadNavbar();
</script>