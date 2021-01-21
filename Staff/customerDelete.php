<?php
  include "../connect.php";
  
  $custIC = $_GET['id'];
  
  $sql = "DELETE FROM customer WHERE Cust_IC='$custIC'";
  $result = mysqli_multi_query($connect,$sql); 

  if(mysqli_multi_query($connect,$sql)){
    header('location: customerPage.php');
  }

  else{
    print '<script> alert("Error, Please Delete Related Data First!"); </script>';
    print '<script> window.location.assign("customerPage.php"); </script>';
  }

  echo mysqli_error($connect);
?>