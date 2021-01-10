<?php
  include "../connect.php";
  
  $tID = $_GET['id'];
  
  $sql = "DELETE FROM trainer WHERE Trainer_ID = '$tID'";
  $result = mysqli_multi_query($connect,$sql); 



  echo mysqli_error($connect);
  header('location: trainerPage.php');
?>