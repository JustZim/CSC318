<?php
  include "../connect.php";
  
  $custIC = $_GET['id'];
  
  $sql = "DELETE FROM customer WHERE Cust_IC='$custIC'";
  $result = mysqli_multi_query($connect,$sql); 



  echo mysqli_error($connect);
  header('location: customerPage.php');
?>