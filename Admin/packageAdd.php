<?php
  include "../connect.php";
  
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $pID = $_POST['packageID'];
    $pName = $_POST['packageName'];
    $pDesc = $_POST['packageDesc'];
   

    echo $sID;
   
    $sql = "select * from package where Pack_ID = '".$sID."' limit 1"; 
    $result = mysqli_query($connect,$sql);
 
    if(mysqli_num_rows($result) == 0) {
    
      $register = "INSERT INTO package (`Pack_ID`, `Pack_Name`, `Pack_Desc` ) 
      VALUES ('$pID','$pName','$pDesc')";

      $exec = mysqli_query($connect,$register);
      
      if($register) {
        $_SESSION['status'] = "Register Successful!";
      }
      
      else {
        $_SESSION['status'] = "An Error Has Occurred";
      }
    }

    else{
      $_SESSION['status'] = "Package ID already exist in database";
    }
    header("location: packageRegister.php");
  }
?>