<?php
  include "../connect.php";
  
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $coachID = $_POST['cID'];
    $trainerID = $_POST['tID'];
    $memberID = $_POST['mID'];
    $coachTrainRemain = $_POST['cTR'];
    
   
    echo $coachID;
    echo $trainerID;
    echo $memberID;
    echo $coachTrainRemain;
 
  
    
     $update = "UPDATE `coaching` SET `Coach_ID`='$coachID',`Trainer_ID`='$trainerID',
     `Coach_TrainRemain`='$coachTrainRemain' WHERE `coaching`.`Coach_ID`='$cID' ";

    $exec = mysqli_query($connect,$update);
    
    if($exec) {
      $_SESSION['status'] = "Update Successful!";
    }
    
    else {
      $_SESSION['status'] = "An Error Has Occurred";
     }

   
    header("location: coachingEdit.php?id=$cID");
     echo mysqli_error($connect);
   

  }
?>