<?php
  include "../connect.php";
  
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $mID = $_POST['mID'];
        $cIC = $_POST['cIC'];
        $pID = $_POST['pID'];
        $expDate = $_POST['expDate'];
        $status = "Active";
    
        $sql = "SELECT * FROM membership WHERE Member_ID = '".$mID."' LIMIT 1"; 
        $result = mysqli_query($connect,$sql);
    
        if(mysqli_num_rows($result) == 0)
        {
            $checksql = "SELECT * FROM membership 
            WHERE Customer_IC = '".$cIC."' ";

            $checkresult = mysqli_query($connect,$checksql);

            if(mysqli_num_rows($checkresult) == 0) {
                
                $register = "INSERT INTO membership (`Member_ID`, `Member_Package`, `Member_status`, `Customer_IC`, `Member_ExpDate`) VALUES ('$mID','$pID','$status','$cIC','$expDate')";

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
                $_SESSION['status'] = "Data already exist in database";
            }
        }

        else{
            $_SESSION['status'] = "Member ID already exist in database";
        } 
        header("location: membershipRegister.php");
    }
?>