<?php
  include "../connect.php";
  
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $ic = $_POST['cIC'];
    $custName = $_POST['cName'];
    $custCont = $_POST['cContact'];
    $custAddress = $_POST['cAddress'];
    $custEmail = $_POST['cEmail'];
    $custDOB = $_POST['cDOB'];
    $custGender = $_POST['cGender'];
   
   $sql = "select * from customer where cust_IC = '".$ic."' limit 1"; 
  $result = mysqli_query($connect,$sql);
 
  if(mysqli_num_rows($result) == 0)
     {
    
     $register = "INSERT INTO CUSTOMER (`Cust_IC`, `Cust_Name`, `Cust_Password`, `Cust_Contact`, `Cust_Email` , `Cust_Address` , `Cust_DOB` , `Cust_Gender` ) VALUES ('$ic','$custName','$ic','$custCont','$custEmail','$custAddress','$custDOB','$custGender')";

    $exec = mysqli_query($connect,$register);
    
    if($register) {
      $_SESSION['status'] = "Register Successful!";
    }
    
    else {
      $_SESSION['status'] = "An Error Has Occurred";
     }


    }
    else
       {
         $_SESSION['status'] = "Customer IC already exist in the database";
    }
    header("location: customerRegister.php");
   
  }
?>