<?php session_start(); ?>
<?php
  include "../connect.php";
  
  $sID = $_GET['id'];
  $sql = "SELECT * FROM Staff WHERE Staff_ID ='$sID'";
  $result = mysqli_query($connect,$sql);  
    foreach($result as $row) {
      $sName = $row['Staff_Name'];
      $sContact = $row['Staff_Contact'];
      $sAddress = $row['Staff_Address'];
      $sEmail = $row['Staff_Email'];
      $sPos  = $row['Staff_Position'];
    }   
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

input[type=text], select, textarea {
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

input[type=submit] {
  background-color: #99aabb;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
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
  width: 25%;
  margin-top: 6px;
}

.right-col {
  float: left;
  width: 75%;
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
    <?php     
     include "../sideNav.php";
     ?>
   
    <!-- Background Image -->
    <div class="bg-image"><br><br>
      <h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>Staff Edit</center></h1>

      
      <div class="container">
        <form name="register" method="post" action="staffUpdate.php">
          <div class="row">
            <div class="left-col">
              <label for="sID">Staff ID</label>
            </div>
            <div class="right-col">
             <input type="text"  name="sID" placeholder="Enter Staff ID" required value="<?= $sID;?>" readonly/>
            </div>
          </div>
          <div class="row">
            <div class="left-col">
              <label for="sName">Staff Name</label>
            </div>
            <div class="right-col">
             <input type="text"  name="sName" placeholder="Enter Staff name.." required value="<?= $sName;?>"/>
            </div>
          </div>
          <div class="row">
            <div class="left-col">
              <label for="sContact">Staff Contact</label>
            </div>
            <div class="right-col">
              <input type="text" name="sContact" placeholder="Enter Staff Mobile Number.." required value="<?= $sContact;?>"/>
            </div>
          </div>
          <div class="row">
            <div class="left-col">
              <label for="sAddress">Staff Address</label>
            </div>
            <div class="right-col">
              <textarea name="sAddress" placeholder="Enter Staff Address.."  style="height:100px" /><?=$sAddress;?></textarea>
            </div>
          </div>
          <div class="row">
            <div class="left-col">
              <label for="sEmail">Staff Email</label>
            </div>
            <div class="right-col">
              <input type="text" name="sEmail" placeholder="Enter Staff email.." required value="<?= $sEmail;?>"/>
            </div>
          </div>
          <div class="row">
            <div class="left-col">
              <label for="sPos">Staff Position</label>
            </div>
            <d  iv class="right-col">
              <?php
                if($sID != $_SESSION['userID'] && $sPos != "Administrator") {
                  echo "<select name='sPos'>";
                    echo "<option hidden value='$sPos'  selected> $sPos </option>";
                    echo "<option value='Administrator'>Administrator</option>";
                    echo "<option value='Staff'>Staff</option>";
                  echo "</select>";
                }
                else {
                  echo "<select name='sPos' disabled>";
                    echo "<option hidden value='$sPos'  selected> $sPos </option>";
                  echo "</select>";
                  echo "<select name='sPos' hidden>";
                    echo "<option hidden value='$sPos'  selected> $sPos </option>";
                  echo "</select>";
                }
              ?>
            </div>
          <br> 
          <div class="row">
            <br>
            <center><input name="cancel" type="button" value="Back" onclick ='location.href="staffPage.php"'>
             <button class="button1">Update</button><br>
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
    top.frames['header'].location.href = '../Navbar.php';
  }
  reloadNavbar();
</script>