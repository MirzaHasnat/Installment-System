<?php
$connect = mysqli_connect("localhost","root","","installment");
if($connect){
    $partyname = $_POST["party"];
    $showplots = mysqli_query($connect,"SELECT plot_number FROM party WHERE party_name='$partyname'");
    if(mysqli_num_rows($showplots)>0){
        echo "<option value='null'>--Select Plot--</option>";
        while($plots = mysqli_fetch_array($showplots)){
            echo "<option value='".$plots[0]."'>".$plots[0]."</option>";
        }
    }else {
        echo "<option value='null'>no plot found</option>";
    }
}
?>