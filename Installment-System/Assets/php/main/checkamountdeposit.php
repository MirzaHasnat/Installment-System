<?php
    include "../database.php";
    if($connect){
        $party = $_POST["partyname"];
        $plot = $_POST["plot"];
        $register = $_POST["register"];

        $select_advance_and_deposit = mysqli_fetch_array(mysqli_query($connect,"SELECT SUM(amount_deposit),(SELECT SUM(advance) FROM party WHERE party_name='$party' AND plot_number='$plot' AND register_number='$register'),(SELECT total_amount FROM party WHERE party_name='$party' AND plot_number='$plot' AND register_number='$register') FROM entire WHERE party_name='$party' AND plot_number='$plot' AND register_number='$register'"));
        $received = $select_advance_and_deposit[0]+$select_advance_and_deposit[1];
        echo $select_advance_and_deposit[2]-$received;
    }
?>