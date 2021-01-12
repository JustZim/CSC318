<?php
  include "../connect.php";
  
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $packageID = $_POST['pID'];
    $packageName = $_POST['pName'];
    $packageDesc = $_POST['pDesc'];
  
 
     $update = "UPDATE `package` SET `Pack_ID`='$packageID',
     `Pack_Name`='$packageName',`Pack_Desc`='$packageDesc' WHERE `Pack_ID`='$packageID' ";

    $exec = mysqli_query($connect,$update);
    
    if($exec) {
      $_SESSION['status'] = "Update Successful!";
    }
    
    else {
      $_SESSION['status'] = "An Error Has Occurred";
     }

   
    header("location: packageEdit.php?id=$packageID");
    echo mysqli_error($connect);
   

  }
?>