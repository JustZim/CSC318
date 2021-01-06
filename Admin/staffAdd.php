<?php
  include "../connect.php";
  
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $sID = $_POST['staffID'];
    $staffName = $_POST['staffName'];
    $staffCont = $_POST['staffContact'];
    $staffAddress = $_POST['staffAddress'];
    $staffEmail = $_POST['staffEmail'];
    $staffPos = $_POST['staffPosition'];

    echo $sID;
   
    $sql = "select * from staff where staff_ID = '".$sID."' limit 1"; 
    $result = mysqli_query($connect,$sql);
 
    if(mysqli_num_rows($result) == 0) {
    
      $register = "INSERT INTO staff (`Staff_ID`, `Staff_Name`, `Staff_Password`, `Staff_Contact`, `Staff_Address` , `Staff_Email` , `Staff_Position` ) VALUES ('$sID','$staffName','password','$staffCont','$staffAddress','$staffEmail','$staffPos')";

      $exec = mysqli_query($connect,$register);
      
      if($register) {
        $_SESSION['status'] = "Register Successful!";
      }
      
      else {
        $_SESSION['status'] = "An Error Has Occurred";
      }
    }

    else{
      $_SESSION['status'] = "Staff ID already exist in database";
    }
    header("location: staffRegister.php");
  }
?>