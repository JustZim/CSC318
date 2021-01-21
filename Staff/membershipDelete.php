<?php
  include "../connect.php";
  
  $mID = $_GET['id'];
  
  $sql = "DELETE FROM membership WHERE Member_ID='$mID'";
  $result = mysqli_multi_query($connect,$sql); 

  if(mysqli_multi_query($connect,$sql)){
    header('location: membershipPage.php');
  }

  else{
    print '<script> alert("Error, Please Delete Related Data First!"); </script>';
    print '<script> window.location.assign("membershipPage.php"); </script>';
  }

  echo mysqli_error($connect);
?>