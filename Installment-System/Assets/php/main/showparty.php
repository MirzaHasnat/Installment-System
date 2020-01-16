<?php
$connect = mysqli_connect("localhost","root","","installment");
if($connect){
    $showparty = mysqli_query($connect,"SELECT party_name,SUM(total_amount),COUNT(plot_number),advance FROM party GROUP BY party_name");
    if(mysqli_num_rows($showparty)>0){
        echo "<tr>";
        echo "<th><b>SR</b></th>";
        echo "<th><b>Party Name</b></th>";
        echo "<th><b>Total Amout</b></th>";
        echo "<th><b>Total Registered Plots</b></th>";
        echo "<th><b>View Details</b></th>";
        echo "</tr>";
        $i=1;
        while($party = mysqli_fetch_array($showparty)){
            $total_recevied = mysqli_fetch_array(mysqli_query($connect,"SELECT SUM(amount_deposit) FROM entire WHERE party_name='$party[0]' "));
            $total_advance_received = $party[3]+$total_recevied[0];
            echo "<tr>";
            echo "<td style='width:5%;'>".$i."</td>";
            echo "<td>".$party[0]."</td>";
            echo "<td>".number_format($party[1])."</td>";
            echo "<td><u>".$party[2]."</u></td>";
            echo "<td><a href='persondetails.php?personname=".$party[0]."'>View Details</a></td>";
            echo "</tr>";
            $i++;
        }
    }else {
        echo "<center><i>No Party Registered Yet</i></center>";
    }
}
?>