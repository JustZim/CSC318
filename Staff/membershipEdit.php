<?php 
    session_start(); 
    include "../connect.php";
  
    $mID = $_GET['id'];
    $sql = "SELECT * FROM Membership WHERE Member_ID ='$mID'";
    $result = mysqli_query($connect,$sql);  
    foreach($result as $row) {
        $mPack = $row['Member_Package'];
        $mStat = $row['Member_Status'];
        $cIC = $row['Customer_IC'];
        $expDate = $row['Member_ExpDate'];
    }   
    $oldID  = $mID;
    $Csql = "SELECT * FROM customer";
    $customerresult = mysqli_query($connect, $Csql);
      
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
      <h1 style="color:#FFB450; font-family: 'Barlow'; font-size: 60px;"><center>Member Edit</center></h1>

      
      <div class="container">
        <form name="register" method="post" action="MembershipUpdate.php">
          <div class="row">
            <div class="left-col">
              <label for="mID">Member ID</label>
            </div>
            <div class="right-col">
              <input readonly type="text"  name="mID" placeholder="Enter Member ID.." required value="<?= $mID;?>"/>
            </div>
          </div>

            <div class="row">
                <div class="left-col">
                    <label for="sPos">Customer IC</label>
                </div>
                <div class="right-col">
                    <input readonly type="text" name="cIC" required value="<?php echo $cIC;?>">
                </div>
            </div>

            <div class="row">
                <div class="left-col">
                    <label for="tPackage">Package</label>
                </div>
                <div class="right-col">
                    <select id="Pack_ID" name="pID">
                        <?php
                        echo "<option value='$mPack' hidden>$mPack</option>";

                        while($Prow = mysqli_fetch_array($packageresult)) {
                        echo '<option value='.$Prow['Pack_ID'].'>'.$Prow['Pack_ID'], ' - ', $Prow['Pack_Name'].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>

          <div class="row">
            <div class="left-col">
              <label for="mStatus" required>Status</label>
            </div>
            <div class="right-col">
              <select name="mStatus">
                <option hidden value="<?php echo $mStat; ?>"  selected><?php echo $mStat; ?></option>
                <option value="Active">Active</option>
                <option value="Expired">Expired</option>
            </select>
            <input type="hidden" name="oldID" required value="<?php echo $oldID;?>">
            </div>
          </div>
          
          <div class="row">
            <div class="left-col">
              <label for="expDate">Expire Date</label>
            </div>
            <div class="right-col">
              <input type="date" name="expDate" placeholder="Enter Expire date.." required value="<?= $expDate;?>"/>
            </div>
          </div>
          
          <div class="row">
            <br>
            <center><input name="cancel" type="button" value="Back" onclick ='location.href="membershipPage.php"'>
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