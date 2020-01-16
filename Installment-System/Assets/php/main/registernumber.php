<?php
$connect = mysqli_connect("localhost","root","","installment");
if($connect){
    $plotnumber = $_POST["plot"];
    $showregister = mysqli_query($connect,"SELECT register_number FROM party WHERE plot_number='$plotnumber'");
    if(mysqli_num_rows($showregister)>0){
        while($register = mysqli_fetch_array($showregister)){
            echo "<option value='".$register[0]."'>".$register[0]."</option>";
        }
    }else {
        echo "<option value='null'>no plot found</option>";
    }
}
?>