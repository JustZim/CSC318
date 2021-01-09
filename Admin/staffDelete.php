<?php
  include "../connect.php";
  
  $sID = $_GET['id'];
  
  $sql = "DELETE FROM staff WHERE Staff_ID='$sID'";
  $result = mysqli_multi_query($connect,$sql); 



  echo mysqli_error($connect);
  header('location: staffPage.php');
?>