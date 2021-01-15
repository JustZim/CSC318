<?php
  include "../connect.php";

  if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $coachID = $_POST['cID'];
    $trainerID = $_POST['tID'];
    $memberID = $_POST['mID'];
    $packID = $_POST['pID'];
    $coachTrainRemain = $_POST['cTR'];

    echo $coachID;
    echo $trainerID;
    echo $memberID;
    echo $packID;
    echo $coachTrainRemain;

    $update = "UPDATE `coaching` SET `Coach_ID`='$coachID',`Trainer_ID`='$trainerID',
    `Coach_TrainRemain`='$coachTrainRemain', `Member_ID`='$memberID', `Pack_ID`='$packID' WHERE `coaching`.`Coach_ID`='$coachID' ";

    $exec = mysqli_query($connect,$update);

    if($exec) {
      $_SESSION['status'] = "Update Successful!";
    }

    else {
      $_SESSION['status'] = "An Error Has Occurred";
    }


    header("location: coachingEdit.php?id=$coachID");
    echo mysqli_error($connect);
  }
?>