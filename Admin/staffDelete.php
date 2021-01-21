<?php
  include "../connect.php";

  $sID = $_GET['id'];

  $sql = "DELETE FROM staff WHERE Staff_ID='$sID'";
  $result = mysqli_multi_query($connect,$sql); 

  if(mysqli_multi_query($connect,$sql)){
    header('location: staffPage.php');
  }

  else{
    print '<script> alert("Error, Please Delete Related Data First!"); </script>';
    print '<script> window.location.assign("staffPage.php"); </script>';
  }

  echo mysqli_error($connect);

?>