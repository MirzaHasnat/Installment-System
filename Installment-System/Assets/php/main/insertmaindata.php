<?php
    include "../database.php";
    if($connect){
        $installmentdate = $_POST["insdate"];
        $installmenttime = $_POST["time"];
        $name = $_POST["name"];
        $plot = $_POST["plot"];
        $register = $_POST["register"];
        $amount = $_POST["amount"];
        $installmenttype = $_POST["instype"];

        if($installmenttype=="monthly_due"){
        
            $submitonemonth = mysqli_query($connect,"INSERT INTO entire(installment_date,installment_time,party_name,plot_number,register_number,amount_deposit,installment_type)VALUES('$installmentdate','$installmenttime','$name','$plot','$register','$amount','$installmenttype')");
            if($submitonemonth){
                $pastmonth = mysqli_fetch_array(mysqli_query($connect,"SELECT monthly_due FROM party WHERE party_name='$name' AND plot_number='$plot' AND register_number='$register'"));
                $newmonth = date("d-m-Y",strtotime($pastmonth[0]."1 Month"));
                $updateonemonth = mysqli_query($connect,"UPDATE party SET monthly_due='$newmonth' WHERE party_name='$name' AND plot_number='$plot' AND register_number='$register' ");
                if($updateonemonth){
                    echo "New Date Updated";
                }else {
                    echo "Error in Update Query!";
                }
            }
        
        }elseif($installmenttype=="six_month_due"){
        
            $submitsixmonth = mysqli_query($connect,"INSERT INTO entire(installment_date,installment_time,party_name,plot_number,register_number,amount_deposit,installment_type)VALUES('$installmentdate','$installmenttime','$name','$plot','$register','$amount','$installmenttype')");
            if($submitsixmonth){
                $pastmonths = mysqli_fetch_array(mysqli_query($connect,"SELECT six_month_due FROM party WHERE party_name='$name' AND plot_number='$plot' AND register_number='$register'"));
                $newmonths = date("d-m-Y",strtotime($pastmonths[0]."+6 Month"));
                $updatesixmonth = mysqli_query($connect,"UPDATE party SET six_month_due='$newmonths' WHERE party_name='$name' AND plot_number='$plot' AND register_number='$register' ");
                if($updatesixmonth){
                    echo "New Date Updated";
                }else {
                    echo "Error in Update Query!";
                }
            }
        
        }elseif($installmenttype=="yearly_due"){
        
            $submityear = mysqli_query($connect,"INSERT INTO entire(installment_date,installment_time,party_name,plot_number,register_number,amount_deposit,installment_type)VALUES('$installmentdate','$installmenttime','$name','$plot','$register','$amount','$installmenttype')");
            if($submityear){
                $pastyear = mysqli_fetch_array(mysqli_query($connect,"SELECT yearly_due FROM party WHERE party_name='$name' AND plot_number='$plot' AND register_number='$register'"));
                $newyear = date("d-m-Y",strtotime($pastyear[0]."+1 Year"));
                $updateyear = mysqli_query($connect,"UPDATE party SET yearly_due='$newyear' WHERE party_name='$name' AND plot_number='$plot' AND register_number='$register' ");
                if($updateyear){
                    echo "New Date Updated";
                }else {
                    echo "Error in Update Query!";
                }
            }
        }
    }
?>