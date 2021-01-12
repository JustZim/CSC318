<?php
  include "../connect.php";
  
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $coachingID = $_POST['cID'];
    $trainerID = $_POST['tID'];
    $memberID = $_POST['mID'];
    $coachTrainRemain = $_POST['cTR'];
    
   
   $sql = "select * from coaching where Coach_ID = '".$coachingID."' limit 1"; 
  $result = mysqli_query($connect,$sql);
 
  if(mysqli_num_rows($result) == 0){
    
     $register = "INSERT INTO COACHING (`Coach_ID`, `Trainer_ID`, `Member_ID`, `Coach_TrainRemain`)
      VALUES ('$coachingID','$trainerID','$memberID','$coachTrainRemain')";

      $exec = mysqli_query($connect,$register);
    
      if($exec) {
      $_SESSION['status'] = "Register Successful!";
     }
    
     else {
      $_SESSION['status'] = "An Error Has Occurred";
       }


      }
     else
       {
         $_SESSION['status'] = "Coach ID already exist in the database";
      }
     header("location: coachingRegister.php");
   
  }
  
?>