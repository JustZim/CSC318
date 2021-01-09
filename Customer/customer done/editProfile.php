<?php 
	session_start();
	include "../connect.php";
	
	$sqlQuery = "SELECT * FROM CUSTOMER WHERE Cust_IC = '".$_SESSION["userID"]."'" ;
	$result = mysqli_query($connect, $sqlQuery);	
	$data = mysqli_fetch_assoc($result);
?>
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
    margin:0;
    margin-left: 200px;
  }

  * {
  box-sizing: border-box;
}

input[type=text], select, textarea,input[type=date],input[type=password] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
  font-family: Arial, Helvetica, sans-serif;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
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

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin:50px;
}

.left-col {
  float: left;
  width: 15%;
  margin-top: 6px;
}

.right-col {
  float: left;
  width: 85%;
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
  .left-col, .right-col, input[type=submit], input[type=date], input[type=password] {
    width: 100%;
    margin-top: 0;
  }
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
      <h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>Edit Profile</center></h1>

      
       <div class="container">
        <form method="POST" action="updateProfile.php">
          
          <div class="row">
            <div class="left-col">
              <label>Name</label>
            </div>
            <div class="right-col">
              <input type="text" id="Name" name="Name" placeholder="Name" value="<?php echo $data["Cust_Name"];?>">
            </div>
          </div>
		  <div class="row">
            <div class="left-col">
              <label>IC</label>
            </div>
            <div class="right-col">
              <input type="text" id="IC" name="IC" placeholder="IC No." value="<?php echo $data["Cust_IC"];?>">
            </div>
          </div>
          <div class="row">
            <div class="left-col">
              <label>Contact</label>
            </div>
            <div class="right-col">
              <input type="text" id="Contact" name="Contact" placeholder="Mobile Number" value="<?php echo $data["Cust_Contact"];?>">
            </div>
          </div>
          
          <div class="row">
            <div class="left-col">
              <label>E-mail</label>
            </div>
            <div class="right-col">
              <input type="text" id="Email" name="Email" placeholder="E-mail" value="<?php echo $data["Cust_Email"];?>">
            </div>
          </div>
		  <div class="row">
            <div class="left-col">
              <label>Address</label>
            </div>
            <div class="right-col">
              <textarea id="Address" name="Address" placeholder="Address" style="height:100px"><?php echo $data["Cust_Address"];?></textarea>
            </div>
          </div>
          <div class="row">
            <div class="left-col">
              <label>Date of Birth</label>
            </div>
            <div class="right-col">
              <input type="date" id="DOB" name="DOB" placeholder="Date of Birth" value="<?php echo $data["Cust_DOB"];?>">
            </div>
          </div>
          <div class="row">
            <div class="left-col">
              <label>Gender</label>
            </div>
            <div class="right-col">
              <select id="Gender" name="Gender">
                <option value="Male" <?php if($data["Cust_Gender"] == 'Male') { echo 'selected'; } ?> >Male</option>
                <option value="Female" <?php if($data["Cust_Gender"] == 'Female') { echo 'selected'; } ?> >Female</option>           
              </select>
            </div>
          </div>
          <div class="row"  style="text-align: right;">
            <br>
			<input type="button" class="btn" onclick="history.back();" value='Cancel'>
            <input type="submit" class="btn" value="Submit">
          </div>
        </form>     
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