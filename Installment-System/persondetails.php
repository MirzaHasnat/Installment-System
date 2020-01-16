<?php
    include "assets/php/database.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Person Details</title>
    <link rel="stylesheet" href="assets/css/persondetails.css">
</head>
<body>
    <div class="showdata">
    <?php
        $personname = $_GET["personname"];
        echo "<center><h1>".$personname." Plot Details</h1></center>";
    ?>
        <table cellspacing="0" cellpadding="0" border="1" width="100%">
            <tr>
                <th>SR</th>
                <th>Party Name</th>
                <th>Plot Number</th>
                <th>Register Number</th>
                <th>Booking Date</th>
                <th>Total Amount</th>
                <th>Advance</th>
                <th>Remaining Balance</th>
                <th>Paid</th>
                <th>View Entries</th>
            </tr>
            <?php
                if($connect){
    
                    $viewdata = mysqli_query($connect,"SELECT party_name,plot_number,register_number,total_amount,advance,booking_date FROM party WHERE party_name='$personname'");
                    if(mysqli_num_rows($viewdata)>0){
                        $i=1;
                        while($rows=mysqli_fetch_array($viewdata)){
                            $check_remaining = mysqli_fetch_array(mysqli_query($connect,"SELECT SUM(amount_deposit) FROM entire WHERE party_name='$personname' AND plot_number='$rows[1]'"));
                            $grand_total = $check_remaining[0]+$rows[4];
                            $remaining = $rows[3]-$grand_total;
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$rows[0]."</td>";
                            echo "<td>".$rows[1]."</td>";
                            echo "<td>".$rows[2]."</td>";
                            echo "<td>".$rows[5]."</td>";
                            echo "<td>".number_format($rows[3])."</td>";
                            echo "<td>".number_format($rows[4])."</td>";
                            if($remaining!=0){
                            echo "<td style='color:red;'>".number_format($remaining)."</td>";
                            }elseif($remaining<0){
                            echo "<td style='color:yellow;'>".number_format($remaining)."</td>";
                            }else{
                                echo "<td style='color:green;'>".number_format($remaining)." Payment Compeleted</td>";
                            }
                            echo "<td>".number_format($grand_total)."</td>";
                            echo "<td><a href='entire.php?party=".$rows[0]."&plot=".$rows[1]."'>Views Entires</a></td>";
                            echo "</tr>";
                            $i++;
                        }
                    }
                }
            ?>
        </table>
    </div>
</body>
</html>