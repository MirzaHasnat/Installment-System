<?php
    if(isset($_POST["submit"])){
        $plotnumber = $_POST["plotNumber"];
        $partyname = $_POST["partyName"];
        $register = $_POST["registerNumber"];
        $plotdimentions = $_POST["dimentionPlot"];
        $rate = $_POST["rate"];
        $total = $_POST["totalAmount"];
        $advance = $_POST["advance"];
        $monthly = $_POST["monthlyInstallment"];
        $yearly = $_POST["yearlyInstallment"];
        $bookingdate = $_POST["dateBooking"];
        $important = $_POST["importantInstallment"];
        $mobile = $_POST["mobileNumber"];
        $due = $_POST["dueDate"];
        $address = $_POST["partyAddress"];
        $nic = $_POST["partyNIC"];
        $sign = $_POST["sign"];
        $broker = $_POST["brokerName"];
        $commision = $_POST["commision"];
        $discription = $_POST["discription"];
        $monthly_due = date("d-m-Y",strtotime($bookingdate."+1 Month"));
        $six_month_due = date("d-m-Y",strtotime($bookingdate."+6 Month"));
        $yearly_due = date("d-m-Y",strtotime($bookingdate."+1 Year"));
        
        $check_if_already_registered_plot = mysqli_query($connect,"SELECT * FROM party WHERE party_name='$partyname' AND plot_number='$plotnumber'");
        $check_if_already_registered = mysqli_query($connect,"SELECT * FROM party WHERE party_name='$partyname' AND register_number='$register'");
        if(mysqli_num_rows($check_if_already_registered_plot)>0 || mysqli_num_rows($check_if_already_registered)>0){
            echo "<center>The Plot is Already Registered on The Name of ".$partyname."</center>";
        }else {
            $insert = mysqli_query($connect,"INSERT INTO party(plot_number,party_name, register_number, plot_dimension, rate, total_amount, advance, monthly_installment, yearly_installment, booking_date, important_installment, mobile_number, sceme_due, party_address, party_nic, party_sign, broker_name, commision, discription,monthly_due,six_month_due,yearly_due)VALUES('$plotnumber','$partyname','$register','$plotdimentions','$rate','$total','$advance','$monthly','$yearly','$bookingdate','$important','$mobile','$due','$address','$nic','$sign','$broker','$commision','$discription','$monthly_due','$six_month_due','$yearly_due')");
            if($insert){
                echo "<center>Party Registered You Can View Details in Main Page</center>";
            }
        }
    }

?>