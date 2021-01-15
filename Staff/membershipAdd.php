<?php
  include "../connect.php";
  date_default_timezone_set('Asia/Kuala_Lumpur');
  
  if($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $mID = $_POST['mID'];
        $cIC = $_POST['cIC'];
        $pID = $_POST['pID'];
        $status = "Active";

        if($pID == "Gold") {
            $Date = date('Y-m-d');
            $expDate = date('Y-m-d', strtotime($Date. ' + 12 month'));
        }
        elseif($pID == "Silver") {
            $Date = date('Y-m-d');
            $expDate = date('Y-m-d', strtotime($Date. ' + 6 month'));
        }
        elseif($pID == "Bronze") {
            $Date = date('Y-m-d');
            $expDate = date('Y-m-d', strtotime($Date. ' + 3 month'));
        }
        
        echo $Date;
        echo ' - ' ,  $expDate;
        echo ' - ' ,  $mID;
        echo ' - ' ,  $cIC;
        echo ' - ' ,  $pID;


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
                
                if($exec) {
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
        //header("location: membershipRegister.php");
        echo mysqli_error($connect);
    }
?>