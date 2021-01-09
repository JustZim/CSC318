<?php
  include "../connect.php";
  
  $pID = $_GET['id'];
  
  $sql = "DELETE FROM product WHERE Product_ID='$pID'";
  $result = mysqli_multi_query($connect,$sql); 



  echo mysqli_error($connect);
  header('location: productPage.php');
?>