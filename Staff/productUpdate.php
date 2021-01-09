<?php
  include "../connect.php";
  
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $prodID = $_POST['pID'];
    $prodName = $_POST['pName'];
    $prodImg = $_POST['pImage'];
    $prodPrice = $_POST['pPrice'];
    $prodDesc = $_POST['pDesc'];
    $oldid = $_POST['oldID'];
    
     echo  $prodID;
     echo  $prodName;
     echo  $prodImg;
     echo  $prodPrice;
     echo  $prodDesc;
     echo  $oldid;
 
  
    
     $update = "UPDATE `PRODUCT` SET `Product_ID`='$prodID',`Product_Name`='$prodName',`Product_Img`='$prodImg',`Product_Price`='$prodPrice',`Product_Desc`='$prodDesc' WHERE `product`.`Product_ID`='$oldid' ";

    $exec = mysqli_query($connect,$update);
    
    if($exec) {
      $_SESSION['status'] = "Update Successful!";
    }
    
    else {
      $_SESSION['status'] = "An Error Has Occurred";
     }

   
   header("location: productEdit.php?id=$prodID");
     echo mysqli_error($connect);
   

  }
?>