<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            font-family:arial;
        }
        table:last-child {
            margin-top:50px;
        }
        table {
            border-color:lightgray;
        }
        table td {
            padding:5px;
            text-align:center;
            width:20%;
        }
        table tr:nth-child(odd){
            background: lightgray;
        }
        table th{
            background-color:black;
            color:white;
        }
    </style>
</head>
<body>
<?php
    include "assets/php/database.php";
    if($connect){
        $check_the_time = mysqli_query($connect,"SELECT * FROM party");
        echo "<table style='width:100%;' border='1' cellspacing='0' cellpadding='0'>";
        echo "<caption style='font-size:20px;font-weight:bolder;'>Monthly Unpaid</catption>";
        echo "<th>NAME</th>";
        echo "<th>PLOT NUMBER</th>";
        echo "<th>REGISTER NUMBER</th>";
        echo "<th>PHONE NUMBER</th>";
        echo "<th>TIME AGO</th>";
        while($howmonths = mysqli_fetch_array($check_the_time)){
            $monthly = strtotime($howmonths[20]);
            if($monthly<time()){
                echo "<tr>";
                echo "<td>".$howmonths[2]."</td>";
                echo "<td>".$howmonths[1]."</td>";
                echo "<td>".$howmonths[3]."</td>";
                echo "<td>".$howmonths[12]."</td>";
                echo "<td>".ceil(($monthly-time())/60/60/24)."</td>";
                echo "</tr>";
            }
            
        }
        echo "</table>";

        $check_the_sixtime = mysqli_query($connect,"SELECT * FROM party");
        echo "<table style='width:100%;' border='1' cellspacing='0' cellpadding='0'>";
        echo "<caption style='font-size:20px;font-weight:bolder;'>Six Monthly Unpaid</catption>";
        echo "<th>NAME</th>";
        echo "<th>PLOT NUMBER</th>";
        echo "<th>REGISTER NUMBER</th>";
        echo "<th>PHONE NUMBER</th>";
        echo "<th>TIME AGO</th>";
        while($six = mysqli_fetch_array($check_the_sixtime)){
            $six_monthly = strtotime($six[21]);
            if($six_monthly<time()){
                echo "<tr>";
                echo "<td>".$six[2]."</td>";
                echo "<td>".$six[1]."</td>";
                echo "<td>".$six[3]."</td>";
                echo "<td>".$six[12]."</td>";
                echo "<td>".ceil(($six_monthly-time())/60/60/24)."</td>";
                echo "</tr>";
            }
            
        }
        echo "</table>";
}
?>
</body>
</html>