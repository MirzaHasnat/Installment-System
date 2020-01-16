<?php
    include "../database.php";
    if($connect){
        $type = $_POST["type"];
        $party= $_POST["party"];
        $plot = $_POST["plot"];
        $register = $_POST["register"];
        if($type=="monthly_due"){
            $selecting_monthly = mysqli_fetch_array(mysqli_query($connect,"SELECT monthly_installment FROM party WHERE party_name='$party' AND plot_number='$plot' AND register_number='$register' "));
            echo $selecting_monthly[0];
        }elseif($type=="yearly_due"){
            $selecting_yearly = mysqli_fetch_array(mysqli_query($connect,"SELECT yearly_installment FROM party WHERE party_name='$party' AND plot_number='$plot' AND register_number='$register' "));
            echo $selecting_yearly[0];
        }elseif($type=="six_month_due"){
            $selecting_six_month = mysqli_fetch_array(mysqli_query($connect,"SELECT important_installment FROM party WHERE party_name='$party' AND plot_number='$plot' AND register_number='$register' "));
            echo $selecting_six_month[0];
    }
}
?>