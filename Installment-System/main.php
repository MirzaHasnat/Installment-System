<?php 
    
    include "assets/php/database.php";

?>
</<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/samestyle.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="applicationname">
                Installment
            </div>
            <div class="menu">
                <a href="main.php" style="color:white;background:gray;">Home</a>
                <a href="register.php">Register Party</a>
                <a href="unpaid.php">No Payment Received ?</a>
                <a href="setting.php">Setting</a>
                <a href="security.php?logout=success">logout</a>
            </div>
        </div>
        <div class="dataforpost">
            <table>
                <tr>
                    <td>Installment Date</td>
                    <td>Installment Time</td>
                    <td>Party Name</td>
                    <td>Plot Number</td>
                    <td>Register Number</td>
                    <td>Installment Type</td>
                    <td>Amount Deposit</td>
                </tr>
                <tr>
                    <td><input type="text" id="installmentDate" value="<?php echo date("d-m-Y")?>"></td>
                    <td><input type="text" id="installmentTime" value="<?php echo date("h:i")?>"></td>
                    <td>
                        <select id="partyName" onchange="showPlots()" required>
                            <option value="null">--Select Party--</option>
                            <?php
                                $show = mysqli_query($connect,"SELECT DISTINCT party_name FROM party");
                                if(mysqli_num_rows($show)>0){
                                    while($party=mysqli_fetch_array($show)){
                                        echo "<option value='".$party[0]."'>".$party[0]."</option>";
                                    }
                                }else{
                                    echo "No Member Found";
                                }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select id="plotNumber" onchange="showRegister(); setInterval('checkAbility()',800);" required>
                        </select>
                    </td>
                    <td>
                        <select id="registerNumber">
                        </select>
                    </td>
                    <td>
                        <select id="installmentType" required onchange="setInterval('checkbymonths()',500)">
                                <option value="Null">--Select Value--</option>
                                <option value="monthly_due">monthly</option>
                                <option value="six_month_due">6 month</option>
                                <option value="yearly_due">yearly</option>
                        </select>
                    </td>
                    <td><input type="text" id="installmentAmountDeposited" onchange="checkAbility()" placeholder="Enter The Amount Deposited..." required></td>
                    <td><button onclick="insertMain()">Add</button></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="showdata">
            <table id="showParties" cellspacing="0" cellpadding="0" border="1">
            
            </table>
        </div>

    <div id="snackbar" onchange="popup()" onclick="popout()">Notifications</div>
    <script src="assets/js/allajax.js"></script>
    <script src="assets/js/snackbar.js"></script>
</body>
</html>