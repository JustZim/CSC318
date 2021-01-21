<?php
  include "../connect.php";
  
  $cID = $_GET['id'];
  
  $sql = "DELETE FROM coaching WHERE Coach_ID='$cID'";
  $result = mysqli_multi_query($connect,$sql); 

  if(mysqli_multi_query($connect,$sql)){
    header('location: coachingPage.php');
  }

  else{
    print '<script> alert("Error, Please Delete Related Data First!"); </script>';
    print '<script> window.location.assign("coachingPage.php"); </script>';
  }

  echo mysqli_error($connect);
  
?>