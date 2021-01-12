<?php
  include "../connect.php";
  
  $pID = $_GET['id'];
  
  $sql = "DELETE FROM package WHERE Pack_ID='$pID'";
  $result = mysqli_multi_query($connect,$sql); 



  echo mysqli_error($connect);
  header('location: packagePage.php');
?>