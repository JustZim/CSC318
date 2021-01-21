<?php
  include "../connect.php";
  
  $tID = $_GET['id'];
  
  $sql = "DELETE FROM trainer WHERE Trainer_ID = '$tID'";
  $result = mysqli_multi_query($connect,$sql); 

  if(mysqli_multi_query($connect,$sql)){
    header('location: trainerPage.php');
  }

  else{
    print '<script> alert("Error, Please Delete Related Data First!"); </script>';
    print '<script> window.location.assign("trainerPage.php"); </script>';
  }

  echo mysqli_error($connect);
?>