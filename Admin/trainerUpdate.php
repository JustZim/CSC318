<?php
    include "../connect.php";
  
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $oldtID = $_POST['oldID'];
        $tID = $_POST['tID'];
        $sID = $_POST['sID'];
        $pID = $_POST['pID'];  

        $checksql = "SELECT * FROM trainer
        WHERE Staff_ID = '".$sID."'
        AND  Trainer_Package = '".$pID."'";

        $checkresult = mysqli_query($connect,$checksql);

        if(mysqli_num_rows($checkresult) == 0 || $oldtID != $tID) {
            $update = "UPDATE `trainer` 
            SET `Trainer_ID`='$tID',`Trainer_Package`='$pID',`Staff_ID`='$sID' 
            WHERE `Trainer_ID`='$oldtID' ";

            $exec = mysqli_query($connect,$update);
            
            if($exec) {
                $_SESSION['status'] = "Update Successful!";
            }
    
            else {
                $_SESSION['status'] = "An Error Has Occurred";
            }   
        }

        else{
            $_SESSION['status'] = "Duplicate data in database";
        }

        header("location: trainerEdit.php?id=$tID");
        echo mysqli_error($connect);
    }   
?>