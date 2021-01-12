<?php
  include "../connect.php";
  
  $mID = $_GET['id'];
  
  $sql = "DELETE FROM membership WHERE Member_ID='$mID'";
  $result = mysqli_multi_query($connect,$sql); 



  echo mysqli_error($connect);
  header('location: membershipPage.php');
?>