<?php
  include "../connect.php";

  if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $coachingID = $_POST['cID'];
    $trainerID = $_POST['tID'];
    $memberID = $_POST['mID'];
    $coachTrainRemain = "30";

    $Psql = "SELECT * FROM package 
    LEFT JOIN trainer ON package.Pack_ID = trainer.Trainer_Package
    WHERE trainer.Trainer_ID = '$trainerID'";
    $Pack = mysqli_fetch_assoc(mysqli_query($connect, $Psql));

    $packageID = $Pack['Pack_ID'];

    echo $coachingID, "-"; 
    echo $trainerID, "-";
    echo $memberID, "-";
    echo $packageID, "-";
    echo $coachTrainRemain;

    $sql = "select * from coaching where Coach_ID = '".$coachingID."' limit 1"; 
    $result = mysqli_query($connect,$sql);

    if(mysqli_num_rows($result) == 0){

      $register = "INSERT INTO COACHING (`Coach_ID`, `Trainer_ID`, `Member_ID`, `Coach_TrainRemain`, `Pack_ID`)
      VALUES ('$coachingID','$trainerID','$memberID','$coachTrainRemain', '$packageID')";

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