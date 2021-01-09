<?php
  include "../connect.php";
  
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = $_POST['pID'];
    $prodName = $_POST['pName'];
    $prodImg = $_POST['pImage'];
    $prodPrice = $_POST['pPrice'];
    $prodDesc = $_POST['pDesc'];
   
    echo $id;
    echo $prodName;

   $sql = "select * from product where Product_ID = '".$id."' limit 1"; 
   $result = mysqli_query($connect,$sql);

  if(mysqli_num_rows($result) == 0)
     {
    
     $register = "INSERT INTO PRODUCT (`Product_ID`, `Product_Name`, `Product_Price`, `Product_Desc`, `Product_Img` ) VALUES ('$id','$prodName','$prodPrice','$prodDesc','$prodImg')";

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
         $_SESSION['status'] = "Product ID already exist in the database";
    }
    header("location: productRegister.php");
   
  }
?>