<?php
    include "../connect.php";
  
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $oldmID = $_POST['oldID'];

        $cIC = $_POST['cIC'];
        $pID = $_POST['pID'];  
        $mStat = $_POST['mStatus'];  
        $expDate = $_POST['expDate'];  

        
        $update = "UPDATE `membership` 
        SET `Customer_IC`='$cIC',`Member_Package`='$pID', `Member_Status`='$mStat', `Member_ExpDate`='$expDate'   
        WHERE `Member_ID`='$oldmID' ";

        $exec = mysqli_query($connect,$update);
        
        if($exec) {
            $_SESSION['status'] = "Update Successful!";
        }

        else {
            $_SESSION['status'] = "An Error Has Occurred";
        }
        

        header("location: membershipEdit.php?id=$oldmID");
        echo mysqli_error($connect);
    }   
?>