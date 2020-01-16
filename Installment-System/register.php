<?php 
    include "assets/php/database.php";
    include "assets/php/register/insertparty.php";

?>
</<!DOCTYPE html>
<html>
<head>
    <title>Page Title</title>
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/samestyle.css">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/registration.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="applicationname">
                Installment
            </div>
            <div class="menu">
                <a href="main.php" >Home</a>
                <a href="register.php" style="color:white;background:gray;">Register Party</a>
                <a href="unpaid.php">No Payment Received ?</a>
                <a href="setting.php">Setting</a>
                <a href="security.php?logout=success">logout</a>
            </div>
        </div>
    </div>
    <div class="partyregistration">
    <form method="post">
        <div class="row">
            <div class="column" style="width:13%;">Plot Number</div> 
            <div class="column"><input type="number" name="plotNumber" style="width:100px;"></div>
            <div class="column">Party Name</div>
            <div class="column"> <input type="text" name="partyName" style="width:300px;"></div>
            <div class="column">Register Number</div>
            <div class="column"> <input type="number" name="registerNumber" style="width:135px;"></div>
        </div>
        <div class="row">
            <div class="column" style="width:13%;">Dimension of Plot</div> 
            <div class="column"><input type="text" name="dimentionPlot" ></div>
            <div class="column">Rate</div>
            <div class="column"> <input type="number" name="rate" style="width:100px;"></div>
            <div class="column">Total Amount</div>
            <div class="column"> <input type="number" name="totalAmount" style="width:100px;"></div>
            <div class="column">Advance</div>
            <div class="column"> <input type="number" name="advance" style="width:140px;"></div>
        </div>
        <div class="row">
            <div class="column" style="width:13%;">Monthly Installment</div> 
            <div class="column"><input type="number" name="monthlyInstallment"></div>
            <div class="column">Yearly Installment</div>
            <div class="column"> <input type="number" name="yearlyInstallment"></div>
            <div class="column">Date of Booking </div>
            <div class="column"><input type="text" name="dateBooking" value="<?php echo date("d-m-Y")?>" style="width:200px;"></div>
        </div>
        <div class="row">
            <div class="column" style="width:13%;">6 Months Installment</div> 
            <div class="column"><input type="number"  name="importantInstallment"></div>
            <div class="column">Mobile Number </div>
            <div class="column"><input type="phone" name="mobileNumber"></div>
            <div class="column">Due Date of Sceme</div>
            <div class="column"> <input type="text" name="dueDate" style="width:194px;"></div>
        </div>
        <div class="row">
            <div class="column" style="width:13%;">Address of Party</div>
             <div class="column"><input type="text" name="partyAddress" style="width:790px;"></div>
        </div>
        <div class="row">
            <div class="column" style="width:13%;">NIC of Party </div>
            <div class="column"><input type="number" name="partyNIC" style="width:362px;"></div>
            <div class="column">Sign</div>
            <div class="column"> <input type="text" name="sign" style="width:362px;"></div>
        </div>
        <div class="row">
            <div class="column" style="width:13%;">Broker Name</div>
            <div class="column"> <input type="text" name="brokerName" style="width:326px;"></div>
            <div class="column">Commision</div>
            <div class="column"> <input type="text" name="commision" style="width:362px;"></div>
        </div>
        <div class="row">
            <div class="column" style="width:13%;">Discription</div>
            <div class="column"> <input type="text" name="discription" style="width:795px;"></div>
        </div>
        <div class="row">
            <div class="column" style="width:100%;"><button name="submit" style="width:95%;">Add Party</button></div>
        </div>
    </form>

    </div>
    <div id="snackbar" onchange="popup()" onclick="popout()">Notifications</div>
    <script src="assets/js/snackbar.js"></script>
</body>
</html>