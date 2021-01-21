<?php
  include "../connect.php";
  
  $pID = $_GET['id'];
  
  $sql = "DELETE FROM package WHERE Pack_ID='$pID'";
  $result = mysqli_multi_query($connect,$sql); 

  if(mysqli_multi_query($connect,$sql)){
    header('location: packagePage.php');
  }

  else{
    print '<script> alert("Error, Please Delete Related Data First!"); </script>';
		print '<script> window.location.assign("packagePage.php"); </script>';
  }

  echo mysqli_error($connect);
  
?>