<?php 
  session_start(); 
  include "../connect.php";

  $cID = $_GET['id'];
  $sql = "SELECT * FROM coaching 
  WHERE Coach_ID ='$cID'";
  $result = mysqli_query($connect,$sql);  
    foreach($result as $row) {
      $tID = $row['Trainer_ID'];
      $mID = $row['Member_ID'];
      $pID = $row['Pack_ID'];
      $cTR = $row['Coach_TrainRemain'];
    }  

  $Msql = "SELECT * FROM membership
  LEFT JOIN customer
  ON membership.Customer_IC = customer.Cust_IC";
  $memberresult = mysqli_query($connect, $Msql);

  $Tsql = "SELECT * FROM trainer
  LEFT JOIN staff
  ON trainer.Staff_ID = staff.Staff_ID";
  $trainerresult = mysqli_query($connect, $Tsql);

  $Psql = "SELECT * FROM package";
  $packageresult = mysqli_query($connect, $Psql);
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

input[type=text], [type=number], select, textarea {
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
      <h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>Coaching Edit</center></h1>

      
      <div class="container">
        <form name="register" method="post" action="coachingUpdate.php">

          <div class="row">
            <div class="left-col">
              <label for="cID">Coach ID</label>
            </div>
            <div class="right-col">
              <input readonly type="text"  name="cID" placeholder="Enter Coach ID.." required value="<?php echo $cID;?>"/>
            </div>
          </div>

          <div class="row">
            <div class="left-col">
              <label for="tPackage">Trainer ID</label>
            </div>
            <div class="right-col">
              <select id="Trainer_ID" name="tID">
                <?php
                    echo "<option value='$tID' hidden>$tID - nama</option>";
                  
                    while($Trow = mysqli_fetch_array($trainerresult)) {
                      echo '<option value='.$Trow['Trainer_ID'].'>'.$Trow['Trainer_ID'], ' - ', $Trow['Staff_Name'].'</option>';
                    }
                ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="left-col">
              <label for="mID">Member ID</label>
            </div>
            <div class="right-col">
              <select id="Member_ID" name="mID">
                  <?php
                    echo "<option value='$mID' hidden>$mID - nama</option>";

                    while($Mrow = mysqli_fetch_array($memberresult)) {
                      echo '<option value='.$Mrow['Member_ID'].'>'.$Mrow['Member_ID'], ' - ', $Mrow['Cust_Name'].'</option>';
                    }
                  ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="left-col">
              <label for="pID">Package ID</label>
            </div>
            <div class="right-col">
              <select id="Pack_ID" name="pID">
                  <?php
                    echo "<option value='$pID' hidden>$pID - nama</option>";
                    
                    while($Prow = mysqli_fetch_array($packageresult)) {
                      echo '<option value='.$Prow['Pack_ID'].'>'.$Prow['Pack_ID'], ' - ', $Prow['Pack_Name'].'</option>';
                    }
                  ?>
              </select>
            </div>
          </div>

          <div class="row">
            <div class="left-col">
              <label for="cTR">Coach Training Remaining</label>
            </div>
            <div class="right-col">
              <input type="number" name="cTR" placeholder="Enter from 1 to 30.." min="1" max="30" value="<?php echo $cTR ?>" required>
            </div>
          </div>

          <div class="row">
            <br>
            <center><input name="cancel" type="button" value="Back" onclick ='location.href="coachingPage.php"'>
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