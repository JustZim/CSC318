<?php
  include "../connect.php";
  
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $ic = $_POST['cIC'];
    $oldic = $_POST['oldIC'];
    $custName = $_POST['cName'];
    $custCont = $_POST['cContact'];
    $custAddress = $_POST['cAddress'];
    $custEmail = $_POST['cEmail'];
    $custDOB = $_POST['cDOB'];
    $custGender = $_POST['cGender'];
   
    echo $ic;
    echo $custName;
    echo $custGender;
    echo $custCont;
 
  
    
     $update = "UPDATE `customer` SET `Cust_IC`='$ic',`Cust_Name`='$custName',`Cust_Contact`='$custCont',`Cust_Email`='$custEmail',`Cust_Address`='$custAddress',`Cust_DOB`='$custDOB',`Cust_Gender`='$custGender' WHERE `customer`.`Cust_IC`='$oldic' ";

    $exec = mysqli_query($connect,$update);
    
    if($exec) {
      $_SESSION['status'] = "Update Successful!";
    }
    
    else {
      $_SESSION['status'] = "An Error Has Occurred";
     }

   
    header("location: customeredit.php?id=$ic");
     echo mysqli_error($connect);
   

  }
?>