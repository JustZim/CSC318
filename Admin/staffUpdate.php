<?php
  include "../connect.php";
  
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['sID'];
    $staffName = $_POST['sName'];
    $staffContact = $_POST['sContact'];
    $staffAddress = $_POST['sAddress'];
    $staffEmail = $_POST['sEmail'];
    $staffPos = $_POST['sPos'];
 
  
    
     $update = "UPDATE `staff` SET `Staff_Name`='$staffName',`Staff_Contact`='$staffContact',`Staff_Email`='$staffEmail',`Staff_Address`='$staffAddress', `Staff_Position`='$staffPos' WHERE `Staff_ID`='$id' ";

    $exec = mysqli_query($connect,$update);
    
    if($exec) {
      $_SESSION['status'] = "Update Successful!";
    }
    
    else {
      $_SESSION['status'] = "An Error Has Occurred";
     }

   
    header("location: staffEdit.php?id=$id");
     echo mysqli_error($connect);
   

  }
?>