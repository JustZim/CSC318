<?php session_start(); ?>
<?php
  include "../connect.php";
  
  $pID = $_GET['id'];
  $sql = "SELECT * FROM package WHERE Pack_ID ='$pID'";
  $result = mysqli_query($connect,$sql);  
    foreach($result as $row) {
      $pName = $row['Pack_Name'];
      $pDesc = $row['Pack_Desc'];
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
      <h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>Package Edit</center></h1>

      
      <div class="container">
        <form name="register" method="post" action="packageUpdate.php">
          <div class="row">
            <div class="left-col">
              <label for="pID">Package ID</label>
            </div>
            <div class="right-col">
             <input type="text"  name="pID" placeholder="Enter Package ID" required value="<?= $pID;?>" readonly/>
            </div>
          </div>
          <div class="row">
            <div class="left-col">
              <label for="sName">Package Name</label>
            </div>
            <div class="right-col">
             <input type="text"  name="pName" placeholder="Enter Package name.." required value="<?= $pName;?>"/>
            </div>
          </div>
          <div class="row">
            <div class="left-col">
              <label for="sContact">Package Description</label>
            </div>
            <div class="right-col">
              <input type="text" name="pDesc" placeholder="Enter Package description.." required value="<?= $pDesc;?>"/>
            </div>
          </div>
          <div class="row">
            <br>
            <center><input name="cancel" type="button" value="Back" onclick ='location.href="packagePage.php"'>
             <button class="button1">Update</button><br>
            </center>
          </div>
        </form>  
        <?php
      if(isset($_SESSION["status"])){
      echo $_SESSION["status"];
    }?>   
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