<?php
    include "assets/php/database.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Entries </title>
    <link rel="stylesheet" href="assets/css/persondetails.css">
</head>
<body>
    <div class="person">
        <table border="3px" cellspacing="0" cellpadding="0" class="hover-edit">
            <?php
                $partyname = $_GET["party"];
                $plotnumber = $_GET["plot"];
                $entrie_for_counting = mysqli_fetch_array(mysqli_query($connect,"SELECT SUM(amount_deposit) FROM entire WHERE party_name='$partyname' AND plot_number='$plotnumber'"));
                $person = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM party WHERE party_name='$partyname' AND plot_number='$plotnumber'"));

                $total_given_amount = $entrie_for_counting[0]+$person[7];
                $total_remaining_amount = $person[6]-$total_given_amount;  
                echo "<tr>";
                echo "<th>Plot Number</th><td>".$person[1]."</td>";
                echo "<th>Party Name</th><td>".$person[2]."</td>";
                echo "<th>Register Number</th><td>".$person[3]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Plot Dimention</th><td>".$person[4]."</td>";
                echo "<th>Rate</th><td>".number_format($person[5])."</td>";
                echo "<th>Total Amount</th><td>".number_format($person[6])."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Advance</th><td>".number_format($person[7])."</td>";
                echo "<th>Monthly Installment</th><td>".number_format($person[8])."</td>";
                echo "<th>Yearly Installment</th><td>".number_format($person[9])."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Booking Date</th><td>".$person[10]."</td>";
                echo "<th>Important Installment</th><td>".number_format($person[11])."</td>";
                echo "<th>Mobile Number</th><td>".$person[12]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Due Date</th><td>".$person[13]."</td>";
                echo "<th>Party Address</th><td>".$person[14]."</td>";
                echo "<th>Party Nic</th><td>".$person[15]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Party Sign</th><td>".$person[16]."</td>";
                echo "<th>Broker Name</th><td>".$person[17]."</td>";
                echo "<th>Commision</th><td>".$person[18]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th colspan='3' style='font-size:20px;'>Description</th><td colspan='3' style='font-size:20px;'>".$person[19]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Total Amount</th><td>".number_format($person[6])."</td>";
                if($total_remaining_amount!=0){
                    echo "<th>Remaining Amount</th><td style='color:red;'>".number_format($total_remaining_amount)."</td>";
                }elseif($total_remaining_amount<0){
                    echo "<th>Remaining Amount</th><td style='color:yellow;'>".number_format($total_remaining_amount)."</td>";
                }else{
                    echo "<th>Remaining Amount</th><td style='color:green;'>".number_format($total_remaining_amount)." Installment Completed</td>";
                }
                echo "<th>Given Amount</th><td>".number_format($total_given_amount)."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Next Monthly Payment on</th><td>".$person[20]."</td>";
                echo "<th>Next 6 Month Payment on</th><td>".$person[21]."</td>";
                echo "<th>Next Yearly Payment on</th><td>".$person[22]."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th>Remaining Days</th><td>".ceil((strtotime($person[20])-time())/60/60/24)."</td>";
                echo "<th>Remaining Days</th><td>".ceil((strtotime($person[21])-time())/60/60/24)."</td>";
                echo "<th>Remaining Days</th><td>".ceil((strtotime($person[22])-time())/60/60/24)."</td>";
                echo "</tr>";

        

            ?>
        </table>
    </div>
    <div class="showdata">
        <table cellspacing="0" cellpadding="0" border="1">
            <tr>
                <?php
                    $select_all_from_entire = mysqli_query($connect,"SELECT * FROM entire WHERE party_name='$partyname' AND plot_number='$plotnumber'");
                    $select_total_deposit = mysqli_fetch_array(mysqli_query($connect,"SELECT SUM(amount_deposit) FROM entire WHERE party_name='$partyname' AND plot_number='$plotnumber'"));
                    if($select_all_from_entire){
                        echo "<tr>";
                        echo "<th>Date</th>";
                        echo "<th>Time</th>";
                        echo "<th>Party Name</th>";
                        echo "<th>Plot Number</th>";
                        echo "<th>Register Number</th>";
                        echo "<th>Installment Type</th>";
                        echo "<th>Amount Deposit</th>";
                        echo "<th>Edit</th>";
                        echo "</tr>";
                        while($entires = mysqli_fetch_array($select_all_from_entire)){
                            echo "<tr>";
                            echo "<td>".$entires[1]."</td>";
                            echo "<td>".$entires[2]."</td>";
                            echo "<td>".$entires[3]."</td>";
                            echo "<td>".$entires[4]."</td>";
                            echo "<td>".$entires[5]."</td>";
                            echo "<td>".$entires[7]."</td>";
                            echo "<td>".number_format($entires[6])."</td>";
                            echo "<td><a href='entire.php?party=".$partyname."&plot=".$plotnumber."&deleteid=".$entires[0]."&installtype=".$entires[7]."'>Delete</a></td>";
                            echo "</tr>";
                        }
                        echo "<tr>";
                        echo "<th>--</th>";
                        echo "<th>--</th>";
                        echo "<th>--</th>";
                        echo "<th>--</th>";
                        echo "<th>--</th>";
                        echo "<th>--</th>";
                        echo "<th>".number_format($select_total_deposit[0])."</th>";
                        echo "</tr>";
                    }
                    if(isset($_GET["deleteid"]) && isset($_GET["installtype"])){
                        $installment_type=$_GET["installtype"];
                        $id = $_GET["deleteid"];

                        if($installment_type=="monthly_due"){
                            
                            mysqli_query($connect,"DELETE FROM entire WHERE id='$id'");
                            $old_month = mysqli_fetch_array(mysqli_query($connect,"SELECT monthly_due FROM party WHERE party_name='$partyname' AND plot_number='$plotnumber'"));
                            $new_month = date("d-m-Y",strtotime($old_month[0]."-1 Month"));
                            mysqli_query($connect,"UPDATE party SET monthly_due='$new_month' WHERE party_name='$partyname' AND plot_number='$plotnumber'");
                            header("location:entire.php?party=".$partyname."&plot=".$plotnumber."");
                        }elseif($installment_type=="six_month_due"){

                            mysqli_query($connect,"DELETE FROM entire WHERE id='$id'");
                            $old_months = mysqli_fetch_array(mysqli_query($connect,"SELECT six_month_due FROM party WHERE party_name='$partyname' AND plot_number='$plotnumber'"));
                            $new_months = date("d-m-Y",strtotime($old_months[0]."-6 Month"));
                            mysqli_query($connect,"UPDATE party SET monthly_due='$new_months' WHERE party_name='$partyname' AND plot_number='$plotnumber'");
                            header("location:entire.php?party=".$partyname."&plot=".$plotnumber."");
                        }elseif($installment_type=="yearly_due"){
                            mysqli_query($connect,"DELETE FROM entire WHERE id='$id'");
                            $old_year = mysqli_fetch_array(mysqli_query($connect,"SELECT yearly_due FROM party WHERE party_name='$partyname' AND plot_number='$plotnumber'"));
                            $new_year = date("d-m-Y",strtotime($old_year[0]."-1 year"));
                            mysqli_query($connect,"UPDATE party SET monthly_due='$new_year' WHERE party_name='$partyname' AND plot_number='$plotnumber'");
                            header("location:entire.php?party=".$partyname."&plot=".$plotnumber."");
                        }
                    }
                ?>
            </tr>
        </table>    
    </div>
</body>
</html>