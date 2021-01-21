<?php
  include "../connect.php";
  
  $cID = $_GET['id'];
  
  $sql = "DELETE FROM coaching WHERE Coach_ID='$cID'";
  $result = mysqli_multi_query($connect,$sql); 



  echo mysqli_error($connect);
  header('location: Custcoaching.php');
?>