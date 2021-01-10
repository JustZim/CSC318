<?php
  include "../connect.php";
  
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $tID = $_POST['tID'];
    $sID = $_POST['sID'];
    $pID = $_POST['pID'];

   
    $sql = "SELECT * FROM trainer WHERE Trainer_ID = '".$tID."' LIMIT 1"; 
    $result = mysqli_query($connect,$sql);
 
    if(mysqli_num_rows($result) == 0) {
      $checksql = "SELECT * FROM trainer
      WHERE Staff_ID = '".$sID."'
      AND  Trainer_Package = '".$pID."'";
      $checkresult = mysqli_query($connect,$checksql);

      if(mysqli_num_rows($checkresult) == 0) {
          $register = "INSERT INTO trainer (`Trainer_ID`, `Trainer_Package`, `Staff_ID` ) 
          VALUES ('$tID','$pID','$sID')";

          $exec = mysqli_query($connect,$register);
          
          if($register) {
              $_SESSION['status'] = "Trainer Added!";
          }
          
          else {
              $_SESSION['status'] = "An Error Has Occurred";
          }   
      }

      else{
          $_SESSION['status'] = "Duplicate data in database";
      }
    }

    else{
      $_SESSION['status'] = "Trainer ID already exist in database";
    }
    header("location: trainerRegister.php");
  }
?>