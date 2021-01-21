<?php
include "../connect.php";
if(isset($_POST["pack"])){
    // Capture selected country
    $Pack = $_POST["pack"];
     
    // Define country and city array
    $Tsql = "SELECT * FROM trainer
        LEFT JOIN staff
        ON trainer.Staff_ID = staff.Staff_ID
        WHERE trainer.Trainer_Package = '$Pack'";
        $trainerresult = mysqli_query($connect, $Tsql);

    /*$countryArr = array(
                    "PA01" => array("New Yourk", "Los Angeles", "California"),
                    "PA02" => array("Mumbai", "New Delhi", "Bangalore"),
                    "PA03" => array("London", "Manchester", "Liverpool")
                );*/
     
    // Display city dropdown based on country name
    if($Pack !== '--Select One--'){
        echo "<div class='left-col'>";
            echo "<label for='tID'>Choose a Trainer</label>";
        echo "</div>";
        echo "<div class='right-col'>";
            echo "<select id='Trainer_ID' name='tID'>";
            echo "<option value='' hidden>--Select One--</option>";
                while($Trow = mysqli_fetch_array($trainerresult)) {
                    echo '<option value='.$Trow['Trainer_ID'].'>'.$Trow['Trainer_ID'], ' - ', $Trow['Staff_Name'].'</option>';
                }
            echo "</select>";
        echo "</div>";
    }

    /*if($Pack !== '--Select One--'){
        echo "<label>City:</label>";
        echo "<select>";
        foreach($countryArr[$country] as $value){
            echo "<option>". $value . "</option>";
        }
        echo "</select>";
    } */
}
?>